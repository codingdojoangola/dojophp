<?php

namespace DojoPHP\desafios;

	/**
    * Nome       : Buscar Usuários GitHub  por Localização.
    * Descripção : Lista de Usuários no GitHub Baseado na Localização.
    * Versão     : 0.0.1
    *
    * @Author    : Shir Hashirim
    */

class Usuarios_Git_porLocalizacao {
	/**
    * Returna uma Lista de Usuários.
    *
    * @param string $nada (optional)
    *
    * @return mixed
    */
	public function pegar_usuarios_git ( $de_onde = 'Luanda,Angola' )	{

        if ( !empty( $de_onde ) )
            user_error("Falta a localizacao da busca.", E_USER_ERROR);

        // simples forma em pegar os utilizadores pelo Github API
        $usuarios = file_get_contents(
            'https://api.github.com/search/users?q=location:' . $de_onde );

        // passar pra um json
        $usuarios = json_decode($usuarios);
        // tentar um simples print perceptivel
        print_r($usuarios);

        return ($usuarios);
	}
}

