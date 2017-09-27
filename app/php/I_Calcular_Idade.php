<?php

namespace DojoPHP\Desafios;

	/**
    * Nome       : Idade.
    * Descripção : Calcular a Idade baseado na data inserida.
    * Versão     : 0.0.1
    *
    * @Author    : Shir Hashirim
    */

class Calcular_Idade {
 	/**
    * Retorna a Idade completa.
    *
    * @param string $data (opcional) *de nascimento
    *
    * @return false|string
    */
    public function calculo_idade( $data = '1984-10-26', $idade_esperada = '' ) {
 
        // Verificar que o parametro de entrada é numerico.
        if( !empty( $data ) || ( strlen( $data ) == 4 ) || ( strlen( $data ) == 2 ) ){
            if ( !is_numeric( $data ) ) {
                user_error("Ano inserido não é inválida", E_USER_ERROR );
                return false;
            }
            // Para os da decada 1900
            if ( strlen($data) == 2 ) $data .= '19';
        }
        
        // Testar a data de nascimento inserida se é Data.
        if ( !(date('Y-m-d H:i:s', strtotime( $data ) ) == $data ) || 
            (( strlen( $data ) != 4 ) || ( strlen( $data ) != 2 )) ) {
            
                user_error( "Data inserida não é inválida.", E_USER_ERROR );
                return false;
         }

        // Diferencial da data de nascimento e da data atual 
        $idade = date_diff(date_create($data), date_create('now'));
        
        $serah->assertEquals( $idade_esperada, $idade->y );

        // Retornar a idade completa.
        return ( $idade->y . ' anos, ' . 
                $idade->m . ' mes(es) e ' . 
                $diff->d . ' dia(s)' . $serah ? ', era o esperado' : '' ); 
 
     }
 }