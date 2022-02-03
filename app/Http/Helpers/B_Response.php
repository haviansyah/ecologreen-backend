<?php

namespace App\Http\Helpers;

use App\Http\Helpers\B_Log;

class B_Response
{
	
	protected $log;

	function __construct(){
		$this->log = new B_Log;
	}

	public static function error($message="",$data=array(),$status=400){

		if(!is_array($data)){
			$data= json_decode($data,true);
		}

		$self = new self;
		$self->log->setErrorMessage($message);
		$self->log->setErrorCode($status);
		$self->log->send();

		$payload = array(
			"response"		=> false,
			"status"		=> $status,
			"error_code"	=> $status,
			"errors"		=> $data,
			"message"		=> $message
		);

		return response()->json($payload, $status);

	}

	public static function success($data=array(),$message="",$status=200,$beforeData=[]){

		if(!is_array($data)){
			$data= json_decode($data,true);
		}

		$self = new self;
		$self->log->send();

		$payload = array(
			"response"		=> true,
			"status"		=> $status,
			"message"		=> $message,
			"data"			=> $data,
		);

		$payload = array_merge($payload,$beforeData);
		return response()->json($payload, $status);

	}

	public static function toForceError($message="",$data=array(),$status=400){

		$status = $status == 0 ? 400 : $status;

		if(!is_array($data)){
			$data= json_decode($data,true);
		}

		$self = new self;
		$self->log->setErrorMessage($message);
		$self->log->setErrorCode($status);
		$self->log->send();

		$payload = array(
			"response"		=> false,
			"status"		=> $status,
			"error_code"	=> $status,
			"errors"		=> $data,
			"message"		=> $message,
		);

		header('Content-Type: application/json');
		http_response_code($status);

		echo json_encode($payload,JSON_PRETTY_PRINT);
		exit;

	}

}
