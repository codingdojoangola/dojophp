<?php
    
use DojoPHP\UpdateFileJson\UpdateFileJsonAPI;
use PHPUnit\Framework\TestCase;

/**
 *@author Acidiney Dias
 *@link https://www.github.com/acidiney
 *@desc Test ConvertJsonForArrayAPI
 *@default http://localhost/dojophp/data/codingdojo.json
 */

 class UpdateFileJsonTest extends TestCase{

    public $source;
    public $data = [];
    public $key;

    public function testUpdate(){

        // Create a data test
        $this->source = "./data/codingdojo.json";
        $this->key = "membros";
        $this->data = [
            "nome" => "Test Unit",
            "cargo" => "Test Function",
            "avatar" => ""
        ];
        // New instance the API
        $UFJA = new UpdateFileJsonAPI($this->data, $this->source, $this->key);
        $result = json_decode($UFJA->UpdateFile(), true);
        // Testing result
        $this->assertNotEmpty($result);
        $this->assertInternalType('array', $result);
        $this->assertArrayHasKey('message', $result);
    }
 }