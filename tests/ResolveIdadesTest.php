<?php

use DojoPHP\CalculadorasDeIdade\ResolveIdades;
use PHPUnit\Framework\TestCase;

class ResolveIdadesTest extends TestCase
{
    function testResolve()
    {
        $dataDeNascimento = '08/29/1989';
        $idadeEsperada = 28;

        $idade = (new ResolveIdades())->comData($dataDeNascimento);

        $this->assertEquals($idadeEsperada, $idade);
    }
}