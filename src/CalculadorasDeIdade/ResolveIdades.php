<?php

namespace DojoPHP\CalculadorasDeIdade;

use DateTime;

/**
 * Class ResolveIdades
 *
 * Calcula idades
 *
 * Baseado em: http://www.phpit.com.br/artigos/descobrindo-a-idade-atraves-da-data-de-nascimento.phpit
 *
 * Eu não conhecia a função floor(),
 * mas sabia que a função ceil() arredondava números
 * decimais, então substitui o floor() do código
 * de origem pela ceil(), mas quando testei...
 *
 * Boom! Falhou... :)
 *
 * Interessante essa função floor()
 *
 * @see www.hackingwithphp.com/4/6/1/rounding
 *
 * @package DojoPHP
 */
class ResolveIdades
{
    /**
     * Calcula usando uma data
     *
     * @param $dataDeNascimento
     *
     * @return float
     */
    function comData($dataDeNascimento)
    {
        $tempoUnix = (new DateTime($dataDeNascimento))->getTimestamp();
        $tempoAgora = time();

        return floor(((((($tempoAgora - $tempoUnix) / 60) / 60) / 24) / 365.25));
    }
}