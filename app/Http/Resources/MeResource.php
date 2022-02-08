<?php

namespace App\Http\Resources;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class MeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var User $user */
        $user = $this;
        /** @var Profile $profile */
        $profile = $user->profile;
        $success = [];
        $success['id'] =  $user->id;
        $success['role'] = $user->role->name;
        $success['role_id'] = $user->role->id;
        $success['name'] = $user->name;
        $success['email'] = $user->email;
        $success["gender"] = $profile->gender;
        $success["phone_number"] = $profile->phone_number;
        $success["birthday"] = $profile->birthday?->format('Y-m-d');
        $success["address"] = $profile->address;
        $success["picture_url"] = $profile->picture?->file_address;
        return $success;
    }
}
