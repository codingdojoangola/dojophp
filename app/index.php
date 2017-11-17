<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dojo PHP -> Projects</title>
        <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <style>
        *{
            font-family: "Inconsolata";
            padding:6px;
        }
        p{
            width:100%;
            padding-top:6px !important;
            border-bottom:1px solid #eee;
        }
    </style>
</head>
<body class="container-fluid">
<h3>Lista diretórios <?php echo getcwd();?><br /></h3>
<p></p>
    <div class="container">
        <?php
            $path = "./";
            $diretorio = dir($path);
            while(($arquivo = $diretorio -> read()) !== false){
                if(is_dir($arquivo)){
                echo "<i class='fa fa-folder-o' aria-hidden='true'></i>
                <a href='".$path.$arquivo."'>".$arquivo.'</a><br />';
                }
            }
            $diretorio -> close();
        ?>
    </div>
    <p class="center-align">@acidiney_dias</p>
</body>
</html>