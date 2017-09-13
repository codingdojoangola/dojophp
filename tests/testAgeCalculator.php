<?php
require('AgeCalculator.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Coding Dojo Angola</title>

    <style type="text/css">

        * {
            padding: 0;
            margin: 0;
        }

        #header {

            width: 100%;
            margin: 0;
            height: 50px;
            padding: 5px 10px;
            font-family: 'Palatino Linotype';
            background-color: #000;
            color: #fff;
        }

        #content {

            margin: 0 auto;
            width: 960px;
            padding: 5px;
            font-family: "Trebuchet MS";

        }

        form p {

            margin-bottom: 10px;
        }


    </style>

</head>
<body>

<div id="header">

    <h1>Coding Dojo Angola</h1>
</div>

<div id="content">

    <h1>Calculo da idade</h1>

    <form action="index.php" method="post">

        <p>Insira o seu <b>ano de nascimento</b><input name="inputAge" type="number"/></p>

        <p>
            <input type="submit" name="submit" value="Submit"/>
        </p>
    </form>


    <?php
    $calculator;

    if (isset($_POST['submit'])) {


        $userAge = $_POST['inputAge'];

        $calculator = new AgeCalculator;
//new comment
        echo("Voce tem " . $calculator->getAge($userAge) . " ano(s) de idade");

    }


    ?>
</div>

</body>
</html>