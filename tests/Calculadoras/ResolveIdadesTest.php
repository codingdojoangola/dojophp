<?php

use DojoPHP\CalculadorasDeIdade\ResolveIdades;
use PHPUnit\Framework\TestCase;

/**
 * @author Eleandro Duzentos <eleandro@inbox.ru>
 *
 * @link https://github.com/e200
 */
class ResolveIdadesTest extends TestCase
{
    public function testResolve()
    {
        $dataDeNascimento = '08/29/1989';
        $idadeEsperada = 28;

        $idade = (new ResolveIdades())->comData($dataDeNascimento);

        $this->assertEquals($idadeEsperada, $idade);
    }
}
