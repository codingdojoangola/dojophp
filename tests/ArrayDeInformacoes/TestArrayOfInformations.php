<?php
 
use DojoPHP\ArrayDeInformacoes\ArrayInformationsAPI;
use PHPUnit\Framework\TestCase;

class TestArrayOfInformations extends TestCase
{
    public $instance;
    public $returnTest;

    public function setup()
    {
        $name = 'Acidiney Dias';
        $email= 'acidineydias@gmail.com';
        $telephone = 941056884;
        $this->instance = new ArrayInformationsAPI($email, $name, $telephone);
    }

    public function Array()
    {
        $this->assertNotEmpty($this->instance->CreateArrayWithInformation());
        $this->assertEquals(2, $this->instance->CreateArrayWithInformation());
        $this->assertInternalType('array', $$this->instance->CreateArrayWithInformation());
    }
}
