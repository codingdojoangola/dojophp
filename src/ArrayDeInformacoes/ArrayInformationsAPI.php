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
        $this->data =
          [
            'E-mail'   => $this->email,
            'Name'     => $this->name,
            'Telefone' => $this->telephone,
         ];

        return $this->data;
    }
}
