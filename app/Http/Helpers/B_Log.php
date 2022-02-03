<?php

namespace App\Http\Helpers;

use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class B_Log
{

	protected $log;
	
	public function start(){
		$self = new self;
		return $self;
	}

	public function setErrorMessage($errorMessage){
		$this->log['error_message'] = $errorMessage;
		return $this;
	}

	public function setErrorCode($errorCode){
		$this->log['error_code'] = $errorCode;
		return $this;
	}

    public function send(){

		$this->log['subject']	= Route::currentRouteAction();
		$this->log['url']		= Request::fullUrl();
		$this->log['method']	= Request::method();
		$this->log['ip']		= Request::ip();
		$this->log['agent']		= Request::header('user-agent');
		$this->log['user_id']	= auth()->check() ? auth()->user()->id : null;

    	return Log::create($this->log);
    }
	

	public function getErrorMessage(){
		return $this->errorMessage;
	}
}
