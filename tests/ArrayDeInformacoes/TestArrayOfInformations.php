<?php

use DojoPHP\ArrayDeInformacoes\ArrayInformationsAPI;
use PHPUnit\Framework\TestCase;

class TestArrayOfInformations extends TestCase
{
    public $instance;
    public $returnTest;

    public function testSetup()
    {
        $name = 'Acidiney Dias';
        $email = 'acidineydias@gmail.com';
        $telephone = 941056884;
        $this->instance = new ArrayInformationsAPI($email, $name, $telephone);
    }

    public function testArray()
    {
        $this->assertNotEmpty($this->instance->CreateArrayWithInformation());
        $this->assertEquals(2, $this->instance->CreateArrayWithInformation());
        $this->assertInternalType('array', $$this->instance->CreateArrayWithInformation());
    }
}
