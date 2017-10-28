<?php

namespace DojoPHP\ConvertJsonToArray;

/**
 *@author Acidiney Dias
 *@description touch data of a file in json and convert in Array.
 *@default codingdojo.json
 */
class ConvertJsonForArrayAPI
{
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
}