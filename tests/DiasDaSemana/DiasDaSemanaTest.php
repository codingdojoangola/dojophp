<?php

use DojoPHP\DiasDaSemana\DiasDaSemana;
use PHPUnit\Framework\TestCase;

/**
 * @author Eleandro Duzentos <eleandro@inbox.ru>
 *
 * @link https://github.com/e200
 */
class DiasDaSemanaTest extends TestCase
{
    protected $diaDaSemana;

    public function setUp()
    {
        parent::setUp();

        $this->diaDaSemana = new DiasDaSemana();
    }

    public function testObterTodos()
    {
        $diasDaSemana = $this->diaDaSemana->obterTodos();

        /////////////////////////////////
        // Todas as semanas têm  dias. //
        /////////////////////////////////
        $this->assertCount(7, $diasDaSemana);

        ////////////////////////////////////////////////
        // Nenhum dia da semana é representado por 0. //
        ////////////////////////////////////////////////
        $this->assertArrayNotHasKey(0, $diasDaSemana);

        /////////////////////////////////////////////////////////////////////
        // Por padrão, essa classe retorna o primeiro dia da semana em pt. //
        /////////////////////////////////////////////////////////////////////
        $this->assertEquals($diasDaSemana[1], 'Domingo');

        //////////////////////////////////////////////////////
        // Para testar se retorna os nomes noutras línguas. //
        //////////////////////////////////////////////////////
        $diasDaSemana = $this->diaDaSemana->obterTodos('en');

        /////////////
        // d(-_-)b //
        /////////////
        $this->assertEquals($diasDaSemana[1], 'Sunday');
    }

    public function testObterDia()
    {
        $dia = $this->diaDaSemana->obterDia(1);
        $this->assertEquals('Domingo', $dia);

        /////////////////////////
        // Dia em outra língua //
        /////////////////////////
        $dia = $this->diaDaSemana->obterDia(1, 'en');
        $this->assertEquals('Sunday', $dia);
    }

    public function testObterDiaActual()
    {
        /**************************************************************
         * Só para automatizar o código de formas a que o teste passe *
         * em qualquer dia da semana                                  *
         **************************************************************/
        $diasDaSemanaEn = [
            1 => 'Sunday',
            2 => 'Monday',
            3 => 'Tuesday',
            4 => 'Wednesday',
            5 => 'Thursday',
            6 => 'Friday',
            7 => 'Saturday',
        ];

        $diaDaSemanaHoje = date('w', time());

        // Obtem o dia actual em Inglês
        $dia = $this->diaDaSemana->obterDiaActual('en');

        $this->assertEquals($diasDaSemanaEn[$diaDaSemanaHoje], $dia);
    }
}
