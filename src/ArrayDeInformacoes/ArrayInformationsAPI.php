<?php

namespace DojoPHP\ArrayDeInformacoes;

/**
 *@author: Acidiney Dias
 *
 *@return array
 *@description Converte as informacoes dadas em um array e retorna
 *@date 20-10-2017
 */
class ArrayInformationsAPI
{
    public $email;
    public $name;
    public $telephone;
    public $data = [];

    public function __construct($email, $name, $telephone)
    {
        $this->email = $email;
        $this->name = $name;
        $this->telephone = $telephone;
    }

    public function CreateArrayWithInformation()
    {
<<<<<<< HEAD
        $this->data =
          [
<<<<<<< HEAD
            'E-mail'    => $this->email,
            'Name'      => $this->name,
            'Telefone'  => $this->telephone,
          ];
=======
            'E-mail'   => $this->email,
            'Name'     => $this->name,
            'Telefone' => $this->telephone,
         ];
>>>>>>> 6f5974ba3bdf6b90be4d5f374a80f1ab78d833e2
=======
        $this->data = 
          [
            'E-mail' => $this->email,
            'Name' => $this->name,
            'Telefone' => $this->telephone, 
         ];
>>>>>>> 121482478c788d821744c6ff358ef8c988eef12c

        return $this->data;
    }
}
