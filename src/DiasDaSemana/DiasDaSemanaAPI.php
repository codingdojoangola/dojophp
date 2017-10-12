<?php

namespace DojoPHP\DiasDaSemana;

class DiasDaSemanaAPI
{
    /**
    *@author: Acidiney Dias
    *@link: https://www.github.com/acidiney
    *@description: Essa Classe Retorna o dia da semana conforme a data introduzida
    */
	 public $data;
	 public $diaDaSemana;
	 /*
	  *@params: $data
	  *@description: Essa será a data usade como base
	  */
	 public function __construct($data)
	 {
	 	$this->data = $data;
	 }

	 public function RetornaDiaDaSemana()
	 {
		 /*
		  *@description: Esse metodo retorna o dia se baseando na data introduzida
		  *@method: explode(simbolo,string) -> converte a string passada em um array se baseando num simbolo que separa os caracteres na string... no meu caso 
 		  *foi usado ele para converter a data de PT para EN; 
		  *@method: date(formato,timestamp) -> Essa função retorna a data usando como base o formato escolhido, o segundo parametro é opcional. Ver mais em: *@uses: https://php.net/date
		  *@method: strtotime(string) -> Essa função converte uma string usando um determinado formato em EN para time(). ver mais em: 
		  *@uses: https://php.net/time
		  */

		 $partes = explode('/',$this->data);
		 $this->data = $partes[2]."-".$partes[1]."-".$partes[0];
		 $this->diaDaSemana = date('l',strtotime($this->data));
		 return $this->diaDaSemana;
	}
}