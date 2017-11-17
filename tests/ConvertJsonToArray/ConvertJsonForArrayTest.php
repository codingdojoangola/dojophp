<?php

	  use DojoPHP\ConvertJsonToArray\ConvertJsonForArrayAPI;
	  use PHPUnit\Framework\TestCase;

	  /**

 *@author Acidiney Dias
 *
 *@link https://www.github.com/acidiney
 *@description Test ConvertJsonForArrayAPI
 *@default http://localhost/dojophp/data/codingdojo.json
 */
class ConvertJsonForArrayTest extends TestCase
{
	 public $url;
	 public $instance;

	 public function testGetData()
	 {
		 $this->url = './data/codingdojo.json';
		 $this->instance = new ConvertJsonForArrayAPI($this->url);

		 $data = $this->instance->Itera();

		 $this->assertNotEmpty($data);
		 $this->assertInternalType('array', $data);
		 $this->assertArrayHasKey('membros', $data);
	 }
}
