<?php

// Para invocar a classe GithubApi usando o "use" do autoload precisa
// fazer o require do ficheiro vendor/autoload.php
// Ass: JoséCage
require '../../vendor/autoload.php';

// Uma vez que já podemos usar o autoload aqui então invocamos a classe GithubApi
// Que está em /src/ReturnUsersGithub\GithubApi.php

use DojoPHP\ReturnUsersGithub\GithubApi;

/**
  * @author: Acidiney Dias
  * @description: Esse controler faz a conexão entre a view e a API
  * @post: cidade
  * @git: CodingDojo/dojophp
  * @return: json
  * @method: get
  */
 // Instaciando Classe GithubAPI
 $new = new GithubApi($_POST['cidade']);
 // Esse metodo trara todos usuarios do github passados pelo metodo post
 $items = $new->get_users();
 $elements = $items['items'];
 /*
    A principio estava com o problema  de fazer o foreach nos elementos que foram tragos pela API,
    ai surge a necessidade da criação da variavel elements, Por Padrão o GitHub não retorna um Array... O que o Github retorna é uma matriz[][] por isso tive que dizer ao php que eu quero todos elementos do primeiro array ou seja os elementos que estão dentro do array items.Só depois de fazer isso consegui realmente o que é o objectivo... Conforme mostra o resto do codigo
 */

 $user = '';

foreach ($elements as $key) {
    $user .= '<div class="user-card">
                <div class="card-image">
                    <figure class="image is4by3">
                           <a href="'.$key['html_url'].'" class="" title="Abrir o perfil de  '.$key['login'].'">
                           <img src="'.$key['avatar_url'].'" alt="'.$key['login'].'" class="center-block img-circle">
                            </a>
                    </figure>
                </div>
                    <div class="card-content">
                        <h1 class="title is-4">
                       <a href="'.$key['html_url'].'">'.$key['login'].'</a>
                        </h1>
                    </div>
            </div>';
}
 echo json_encode($user);
