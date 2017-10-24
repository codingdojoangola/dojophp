<!DOCTYPE html>
<html>
<head>
	<title>Dojo PHP - Aumentando a proficiência em desenvolvimento web</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Pacifico" rel="stylesheet"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"/>
	<style type="text/css">

body{
	font-family: 'Open Sans', sans-serif;

}

footer {
        position: relative;
        height: 90px;
        width: 100%;
        border-top: 1px dashed #000;
				margin-bottom: 20px;
    }

    p.copyright {
        position: absolute;
        width: 100%;
        color: #000;
        line-height: 40px;
        font-size: 0.7em;
        text-align: center;
        bottom:0;
    }



.avatar{

	height: 100px;
	width: 100px;
}
h1,h2,h3,h4,h5,h6{

	font-family: 'Pacifico', cursive;
	margin-bottom: 100px;
}

.thumbnail{

	margin-bottom: 20px;
}
	</style>
</head>
<body>
<div class="container">
	<h1 class="text-center">Coding Dojo Angola</h1>

	<div class="row">

<div class="col-xs-12">
<p>O desafio é pegar na lista de pessoas no ficheiro data/codingdojo.json, tornar num array e de seguida fazer a apresentação da mesma informação numa página web(html).</p>
</div>
	</div>
	<div class="row">
<?php

/*
Comando usado para obter o conteudo do ficheiro json numa variavel
*/
$my_file=file_get_contents("data/codingdojo.json");

/*

Transformar a variavel json em um array
*/
$json_info=json_decode($my_file,true);


//echo '<pre>'.print_r($json_info,true) .'</pre>';



//print_r ($json_info['membros']);

/*
Fazer a leitura de uma parte do array

*/
foreach ($json_info['membros'] as $key => $value) {
	# code...
  echo '<div class="col-sm-3 thumbnail">';
	echo '<img class="img-responsive  avatar" src="./img/ninja.png" alt="ninja logo"/>';
	echo '<br/>';
	echo '<span class="text-center">'.$value['nome'].'</span><br/>';
	echo '<span class="text-center">'.$value['cargo'].'</span><br/>';
	echo '</div>';

}
 ?>

 </div>
 <div class="col-xs-12">

 	<footer>
 	    <p class="copyright">© Coding Dojo Angola 2017</p>
 	</footer>
 </div>
 <!-- end of container -->
 </div>
</body>
</html>
