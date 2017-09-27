<?php
use DojoPHP\scr\Usuarios_Git as Usuarios_Git;
// use PHPUnit\Framework\TestCase as Dojo;
	/**
    * Nome       : Buscar Usuários GitHub  por Localização.
    * Descripção : Lista de Usuários no GitHub Baseado na Localização.
    * Versão     : 0.0.1
    *
    * @Author    : Shir Hashirim
    */

class Usuarios_Git_porLocalizacao_Test {
	/**
    * Returna uma Lista de Usuários.
    *
    * @param string $nada (optional)
    *
    * @return mixed
    */
	public function pegar_usuarios_git ( $de_onde = 'Luanda,Angola' )	{

        // Inicialização das variáveis
        $onde = 'Luanda,Angola';

        // simples forma em pegar os utilizadores pelo Github API
        $usuarios = Usuarios_Git::pegar_usuarios_git( $onde );

        // tentar um simples print perceptivel
        print_r($usuarios);

	}
}


