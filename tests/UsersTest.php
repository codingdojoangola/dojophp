<?php
use DojoPHP\API;
use DojoPHP\interfaceApi;
use PHPUnit\Framework\TestCase as PHPUnit;

/**
 * Created by PhpStorm.
 * User: artphotografie
 * Date: 09/09/17
 * Time: 06:09
 */
class UsersTest extends PHPUnit
{

    public function testCase() {

        $obj = new API();

        $this->assertInstanceOf(interfaceApi::class, $obj);
    }

}