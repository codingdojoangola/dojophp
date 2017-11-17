<?php

require '../../vendor/autoload.php';

use DojoPHP\ConvertJsonToArray\ConvertJsonForArrayAPI;

/**
  * @author: Acidiney Dias
  * @description: Esse controler faz a conexão entre a view e a API
  * @post: cidade
  * @git: CodingDojo/dojophp
  * @return: json
  * @method: get
  */

 // Instaciando Classe ConvertJsonForArrayAPI passando o Caminho do arquivo codingdojo.json
 $new = new ConvertJsonForArrayAPI('../../data/codingdojo.json');
 /*
  Este aquivo é um arquivo que possui  dois array, ou seja, um dentro de outro então a iteração só será no segundo pois no inicial são somentes as informações do Dojo.
  A chave do segundo array é membros.
 */
  $base = $new->Itera();

  $membros = $base['membros'];

  // Criando elementos que serão exibidos(Base)
  $elements['app'] = "<table class='table'>
    <thead cell-spacing=3>
      <tr><td> Dados do Aplicativo</td></tr>
    </thead>
    <tbody>
    <tr><td>Nome</td><td>E-mail</td><td>Site</td></tr>
      <tr>
        <td>".$base['app'].'</td>
        <td>'.$base['email'].'</td>
        <td><a target="_blank" href='.$base['url'].'>Open Site</a></td>

      </tr>
    </tbody>
  </table>';

  $elements['list'] = "<ul class='list-inline'>";
  // Criando elementos que serão exibidos(Membros)
   foreach ($membros as $membro) {

       $img = $membro['avatar'] ? $membro['avatar'] : 'atomix_user31.png';
       $elements['list'] .= '<li><div class="header">
        <img src='.$img.' title='.$membro['cargo'].'/>
      </div>
      <div class="footer">
      <h3>'.$membro['nome'].'</h4>
      </div></li>';
   }
  $elements['list'] .= '</ul>';
 echo json_encode($elements);
