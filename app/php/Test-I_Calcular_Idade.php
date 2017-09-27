<?php
use DojoPHP\src\Calcular_Idade as Ver_Idade;
// use PHPUnit\Framework\TestCase as Dojo;
	/**
    * Nome       : Idade.
    * Descripção : Calcular a Idade baseado na data inserida.
    * Versão     : 0.0.1
    *
    * @Author    : Shir Hashirim
    */

class Saber_Idade {
    // class Saber_Idade extends Dojo {
 	/**
    * Retorna a Idade completa.
    *
    * @param string $data (opcional) *de nascimento
    *
    * @return false|string
    */
    public function obter_data(){

        // Inicialização das variáveis
        $bday = '30/07/1944';
        $idade_esperada = '28';

        echo $bday;
        $idade = Ver_Idade::calculo_idade( $bday, $idade_esperada );

        // Retornar a idade completa.
        print_r($idade);
        return ( $idade );

    }
 }
