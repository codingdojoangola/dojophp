<!DOCTYPE html>
<html>
<head>
	<title>Dojo PHP - Aumentando a proficiência em desenvolvimento web</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Pacifico" rel="stylesheet"/>
	<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<style type="text/css">

body{
	font-family: 'Open Sans', sans-serif;
	background-color: #EFEFEF;

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
	display: inline-block;
}

.main_title{

	color: #CAEBF2;
}

.avatar_desc{

vertical-align: top;
display: inline;

}
h1,h2,h3,h4,h5,h6{

	font-family: 'Pacifico', cursive;
	margin-bottom: 100px;
	color: #A9A9A9;

}

.thumbnail{

	margin-bottom: 20px;
}
	</style>
</head>
<body>
	<?php

    //Comando usado para obter o conteudo do ficheiro json numa variavel

    $my_file = file_get_contents('data/codingdojo.json');

    /// Transformar a variavel json em um array

    $json_info = json_decode($my_file,true);
  
//echo '<pre>'.print_r($json_info,true) .'</pre>';
    ?>
<div class="container">
	<h1 class="text-center">Coding Dojo Angola</h1>

	<div class="row">
		<div class="col-xs-6">
		<p>O desafio é pegar na lista de pessoas no ficheiro data/codingdojo.json, tornar num array e de seguida fazer a apresentação da mesma informação numa página web(html).</p>
		</div>
<div class="col-xs-6">

	<button class="btn btn-default" data-toggle="collapse" data-target="#demo">Ver o ficheiro json em Array</button>

	<div id="demo" class="collapse">
	<?php echo '<pre>'.print_r($json_info, true).'</pre>'; ?>
</div>
</div>


	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<h2 class="text-center">Eis o resultado</h2>
		</div>
	</div>
	<div class="row">

		<?php

foreach ($json_info['membros'] as $key => $value) {
  
    echo '<div class="col-sm-3 thumbnail">';
    echo '<img class="img-responsive  avatar" src="./img/ninja.png" alt="ninja logo"/>';
    echo '<br/>';
    echo '<span class="avatar_desc">'.$value['nome'].'</span><br/>';
    echo '<span class="text-center avatar_desc">'.$value['cargo'].'</span><br/>';
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
