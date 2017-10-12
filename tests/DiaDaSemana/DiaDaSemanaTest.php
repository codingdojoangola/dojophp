<?php

     use DojoPHP\DiasDaSemana\DiasDaSemanaAPI;
     use PHPUnit\Framework\TestCase;

     /**
      * @author: Acidiney Dias
      * @link: https://www.github.com/acidiney
      * @description: Classe de testes para o retorno do DiasDaSemanaAPI
      */
class DiaDaSemanaTest extends TestCase
{
    public $data;
    public $instancia;
    public $diaPorExtenso;

    public function testRetornaDoMetodo()
    {
        $this->data = '12/07/2017';

        $this->instancia = new DiasDaSemanaAPI($this->data);
        $this->diaPorExtenso = $this->instancia->RetornaDiaDaSemana();

        //Verificando se o retorno não é vazio(nulo) e se está retornando uma string --> PHPUnit
        $this->assertNotEmpty($this->diaPorExtenso);

        return $this->diaPorExtenso;
    }
}
