<?php

// Suas função e métodos devem sempre estar comentados para facilitar o entendimento

define (meu_nome, "AjA", false);
$dia_nascimento = 29;
$mes_nascimento = "Setembro";
$ano_nascimento = 1980;
$ano_actual = 2017;

function idade_usuario() {
    global $ano_actual;
    global $ano_nascimento;

    echo $ano_actual - $ano_nascimento;
}

idade_usuario();
echo meu_nome;



?>
