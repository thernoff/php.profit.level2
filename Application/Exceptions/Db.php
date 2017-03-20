<?php

namespace Application\Exceptions;

use Application\Logger;

class Db 
	extends \Exception
{
	public function __construct($message = null, $code = null, $previous = null){
		parent::__construct($message, $code, $previous);
		$textError = date(DATE_RSS) . ' : ' . $this->message;
		Logger::addError($textError);
	}
}