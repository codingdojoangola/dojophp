
<?php

/**
 * @author Renato Martins
 * Date: 09/09/2017
 * Time: 21:00
 */
class AgeCalculator
{

    /**
     * Funcao usada para calcular
     * a idade com base no ano de nascimento
     * @param $yearBirth
     * @return false|string
     */
    function getAge($yearBirth)
    {


        /*
         * Verificar que o parametro de entrada foi providenciado  não é igual a null
         */
        if (!$yearBirth) {

            trigger_error("Parametro de entrada \"Ano de nascimento \" nao foi inserido ", E_USER_ERROR);
            return null;
        }
        //verificar que o parametro de entrada é numerico.
        else if (!is_numeric($yearBirth)) {
            trigger_error("Parametro de entrada não é numérico", E_USER_ERROR);
            return null;
        }
        //verificar que o parametro de entrada tem 4 caracteres.
        else if(strlen($yearBirth)!=4){
            trigger_error("Parametro de entrada deve ter 4 digitos",E_USER_ERROR);
            return null;
        }
        else{

            /*
           * O format ("o") permite que a data retorne somente o ano da data actual.
             * http://php.net/manual/en/function.date.php
           */
            $thisYear = date("o");

            $esteAno=3;
            // a subtracao do ano de nascimento
            $toReturn = $thisYear - $yearBirth;

            return $toReturn;

        }





    }


}