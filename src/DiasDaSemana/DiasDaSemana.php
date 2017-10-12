<?php

namespace DojoPHP\DiasDaSemana;

/**
 * @author Eleandro Duzentos <eleandro@inbox.ru>
 *
 * Trata dos dias da semana.
 *
 * @link https://github.com/e200
 */
class DiasDaSemana
{
    /**
     * Retorna os dias da semana.
     *
     * @param $lingua Define a língua local a ser usada.
     *
     * @return array
     */
    public function obterTodos($lingua = null)
    {
        switch ($lingua) {
            case 'en':
                return [
                    1 => 'Sunday',
                    2 => 'Monday',
                    3 => 'Tuesday',
                    4 => 'Wednesday',
                    5 => 'Thursday',
                    6 => 'Friday',
                    7 => 'Saturday',
                ];
            default:
                return [
                    1 => 'Domingo',
                    2 => 'Segunda',
                    3 => 'Terça',
                    4 => 'Quarta',
                    5 => 'Quinta',
                    6 => 'Sexta',
                    7 => 'Sábado',
                ];
                break;
        }
    }

    /**
     * Retorna o nome de um `$dia` da semana.
     *
     * @param $dia O dia da semana de [0-7]
     * @param $lingua Define a língua local a ser usada.
     *
     * @return string
     */
    public function obterDia($dia, $lingua = null)
    {
        return $this->obterTodos($lingua)[$dia];
    }

    /**
     * Retorna o nome do dia da semana actual.
     *
     * @param $lingua Define a língua local a ser usada.
     *
     * @return string
     */
    public function obterDiaActual($lingua = null)
    {
        $tempoActual = time();

        return $this->obterDia(date('w', $tempoActual), $lingua);
    }
}
