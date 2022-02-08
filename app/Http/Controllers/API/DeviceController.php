<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use williamcruzme\FCM\Traits\ManageDevices;

class DeviceController extends Controller
{
    use ManageDevices;
    
    public function store(Request $request)
    {
        $request->validate($this->createRules(), $this->validationErrorMessages());

        /** @var User */
        $user = $this->guard()->user();

        $device = $user->devices()->whereToken($request->token)->first();

        if ($device) {
            $device->touch();
        } else {
            $device = $user->devices()->create($request->all());
        }

        $id = $device->id;
        DB::table('devices')
            ->where('id',$id)
            ->update(['device_data' => $request->get('device_data')]);
        return $this->sendResponse($id);
    }

    /**
     * Get the validation rules that apply to the create a device.
     *
     * @return array
     */

    protected function createRules()
    {
        return [
            'token' => ['required', 'string'],
        ];
    }

    /**
     * Get the validation rules that apply to the delete a device.
     *
     * @return array
     */
    protected function deleteRules()
    {
        return [
            'token' => ['required', 'string', 'exists:devices,token'],
        ];
    }

    /**
     * Get the device management validation error messages.
     *
     * @return array
     */
    protected function validationErrorMessages()
    {
        return [];
    }
}