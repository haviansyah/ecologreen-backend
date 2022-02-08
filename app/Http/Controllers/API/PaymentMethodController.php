<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\PaymentMethodResource;
use App\Models\PaymentMethod;

use const App\Http\Helpers\STATUS_PUBLISH;

class PaymentMethodController extends BaseController
{
     /**
     * 
     * @method index() Get All Payment Method
     * GET api/payment-method
     * AUTH
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $paymentMethods = PaymentMethod::whereStatus(STATUS_PUBLISH)->get();
        $response = PaymentMethodResource::collection($paymentMethods);
        return $this->sendResponse($response);
    }

}
