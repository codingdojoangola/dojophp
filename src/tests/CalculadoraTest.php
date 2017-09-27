<?php

use PHPUnit\Framework\TestCase as PHPUnit;

class CalculadoraTest extends PHPUnit
{
    public function testSetup()
    {
        $texto = 'Setup da classe de teste!';

        return $this->assertEquals('Setup da classe de teste!', $texto);
    }

    // Testar calculo da idade.
    /*
    public function testCalcularIdade()
    {
    }
    */
}
