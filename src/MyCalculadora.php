<?php

namespace DojoPHP;

class MyCalculadora
{
    private static function getDataAtual()
    {
        $dataAtual = mktime(0, 0, 0, date('m'), date('d'), date('Y'));

        return $dataAtual;
    }

    public static function _getAno($data)
    {
        list($dia, $mes, $ano) = explode('/', $data);
        $nascimento = mktime(0, 0, 0, $mes, $dia, $ano);
        $idade = floor(((((self::getDataAtual() - $nascimento) / 60) / 60) / 24) / 365.25);

        return $idade;
    }
}
