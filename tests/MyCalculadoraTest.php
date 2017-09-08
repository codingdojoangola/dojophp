<?php

/**
* 
*/
use PHPUnit\Framework\TestCase as PHPUnit;
use DojoPHP\MyCalculadora;

class MyCalculadoraTest extends PHPUnit
{
	
	public function testCalculo()
	{
		$obj = MyCalculadora::_getAno('29/08/1989');

		return $this->assertEquals( '28', $obj);
	}
}