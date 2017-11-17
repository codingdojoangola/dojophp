<?php

namespace DojoPHP\ConvertJsonToArray;

/**
 *@author Acidiney Dias
 *@description touch data of a file in json and convert in Array.
 *@default codingdojo.json
 */
class ConvertJsonForArrayAPI
{
<<<<<<< HEAD
	 public $source;
	 public $data;

	 public function __construct($source)
	 {
		 $this->source = $source;
	 }

	 public function Itera()
	 {
		 $this->data = file_get_contents($this->source);
		 return json_decode($this->data, true);
	 }
=======
    public $source;
    public $data;

    public function __construct($source)
    {
        $this->source = $source;
        $this->data = file_get_contents($source);
    }

    public function Itera()
    {
        return json_decode($this->data, true);
    }
>>>>>>> 6f5974ba3bdf6b90be4d5f374a80f1ab78d833e2
}
