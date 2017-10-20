<?php

// Para invocar a classe GithubApi usando o "use" do autoload precisa
// fazer o require do ficheiro vendor/autoload.php
// Ass: JoséCage
require '../../vendor/autoload.php';

// Uma vez que já podemos usar o autoload aqui então invocamos a classe GithubApi
// Que está em /src/ReturnUsersGithub\GithubApi.php

use DojoPHP\ArrayDeInformacoes\ArrayInformationsAPI;

/*
 *@author: Acidiney Dias
 * @description: Esse controler faz a conexão entre a view e a AI
 *@post: cidade
 *@git: CodingDojo/dojophp
 *@return: json
 *@method: get
 */
 // Instaciando Classe ArrayInformationsAPI.
   $retorno['msg'] = '';
   $retorno['status'] = false;

if ($_POST['email'] !== '' && $_POST['name'] !== '' && $_POST['telephone'] !== '') {
    $new = new ArrayInformationsAPI($_POST['email'], $_POST['name'], $_POST['telephone']);

    $items = $new->CreateArrayWithInformation();

    if (is_array($items)) {
        foreach ($items as $key => $value) {
            $retorno['msg'] .= '<li>'.'<strong>'.$key.'</strong> - '.$value.'</li>';
            $retorno['status'] = true;
        }
    }
}

 echo json_encode($retorno);