<?php

namespace Application;


class AdminDataTable
{
	protected $arrModels;
	protected $arrFunctions;
	
	public function __construct(array $arrModels, array $arrFunctions)
	{
		$this->arrModels = $arrModels;
		$this->arrFunctions = $arrFunctions;
	}
}