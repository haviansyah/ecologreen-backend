<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use Illuminate\Http\Request;

class ConfigurationController extends BaseController
{
     /**
     * Get All Confiuration Data
     * GET \api\config
     * @return \Illuminate\Http\Response
     */
    public function get_config(){
        $data = Configuration::get_multiple_config([
            Configuration::APP_VERSION,
            Configuration::APP_VERSION_NUMBER,
        ]);
        return $this->sendResponse($data);
    }
}
