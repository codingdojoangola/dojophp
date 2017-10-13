<?php

// Para invocar a classe GithubApi usando o "use" do autoload precisa
// fazer o require do ficheiro vendor/autoload.php
// Ass: JoséCage
require '../../vendor/autoload.php';

// Uma vez que já podemos usar o autoload aqui então invocamos a classe GithubApi
// Que está em /src/DiasDaSemana\DiasDaSemanaAPI.php

use DojoPHP\DiasDaSemana\DiasDaSemanaAPI;

/**
  * @author: Acidiney Dias
  * @description: Esse controler faz a conexão entre a view e a API
  * @post: cidade
  * @git: CodingDojo/dojophp
  * @return: json
  * @method: get
  */
 // Instaciando Classe DiasDaSemanaAPI
 $new = new DiasDaSemanaAPI($_POST['date']);
 $dia = $new->RetornaDiaDaSemana();
 $opt = $_POST['opt'];
 switch ($dia) {
   case 'Monday': $dia = 'Segunda-feira';
     break;
    case 'Tuesday': $dia = 'Terça-feira';
     break;
    case 'Wednesday': $dia = 'Quarta-feira';
     break;
    case 'Thursday': $dia = 'Quinta-feira';
     break;
    case 'Friday': $dia = 'Sexta-feira';
     break;
    case 'Saturday': $dia = 'Sábado';
     break;
    case 'Sunday': $dia = 'Domingo';
     break;
   default:
        $dia = 'Tente denovo';
     break;
 }
 // Esse metodo trara todos usuarios do github passados pelo metodo post
 if($opt != 1) {
    $elements = "<p> A data passada equivale a <b class='text-info'>".$dia.'</b></p>';
 } else {
    $elements = "<b class='text-info h3'>".$dia.'</b>';
 }

 echo json_encode($elements);
