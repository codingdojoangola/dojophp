<?php

<<<<<<< HEAD
	  use DojoPHP\ConvertJsonToArray\ConvertJsonForArrayAPI;
	  use PHPUnit\Framework\TestCase;

	  /**
=======
      use DojoPHP\ConvertJsonToArray\ConvertJsonForArrayAPI;
      use PHPUnit\Framework\TestCase;

      /**
>>>>>>> 6f5974ba3bdf6b90be4d5f374a80f1ab78d833e2
 *@author Acidiney Dias
 *
 *@link https://www.github.com/acidiney
 *@description Test ConvertJsonForArrayAPI
 *@default http://localhost/dojophp/data/codingdojo.json
 */
class ConvertJsonForArrayTest extends TestCase
{
<<<<<<< HEAD
	 public $url;
	 public $instance;

	 public function testGetData()
	 {
		 $this->url = 'https://github.com/codingdojoangola/dojophp/raw/desafios/data/codingdojo.json';
		 $this->instance = new ConvertJsonForArrayAPI($this->url);

		 $data = $this->instance->Itera();

		 $this->assertNotEmpty($data);
		 $this->assertInternalType('array', $data);
		 $this->assertArrayHasKey('membros', $data);
	 }
}
=======
    public $url;
    public $instance;

    public function testGetData()
    {
        $this->url = 'https://github.com/codingdojoangola/dojophp/raw/desafios/data/codingdojo.json';
        $this->instance = new ConvertJsonForArrayAPI($this->url);

        $data = $this->instance->Itera();

        $this->assertNotEmpty($data);
        $this->assertInternalType('array', $data);
        $this->assertArrayHasKey('membros', $data);
    }
}
>>>>>>> 6f5974ba3bdf6b90be4d5f374a80f1ab78d833e2
