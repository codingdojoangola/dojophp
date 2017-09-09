<?php

/**
* 
*/
use DojoPHP\CalculadorasDeIdade\MyCalculadora;
use PHPUnit\Framework\TestCase as PHPUnit;

class MyCalculadoraTest extends PHPUnit
{
	
	public function testCalculo()
	{
		$obj = MyCalculadora::_getAno('29/08/1989');

		return $this->assertEquals( '28', $obj);
	}
}