[![Build Status](https://travis-ci.org/codingdojoangola/dojophp.svg?branch=master)](https://travis-ci.org/codingdojoangola/dojophp)

# dojophp
Desafios e metas de estudo PHP

Os desafios propostos devem ser submetidos no directório **`/src/Nomedoexercicio.php`**
Que no caso Nomedoexercicio.php deve conter uma classe com o mesmo nome e suas funções dentro.

Exemplo:

```php
<?php

namespace DojoPHP\Desafios;

/**
 * @author: Teu Nome
 * Descrição da Classe aqui.
 */
class Nomedoexercicio
{
	/**
	 * nomedaFuncao *Aqui a descrição*
	 * @return "aqui o tipo de dado
	 * (exemplo: array, boolean, void)
	 */
	public function nomedaFuncao()
	{
		// Código da sua função aqui dentro da função
	}
}

```

De seguida crie igualmente uma classe de teste referente ao exercício anteriormente criado.

```php

namespace DojoPHP\Tests;

class NomedoexercicioTest
{
	/**
	 * testNomedafuncao *Aqui a descrição*
	 * @return "aqui o tipo de dado (exemplo: array, boolean, void)
	 */
	public function testNomedafuncao()
	{
		// O código da sua função de teste aqui.
	}
}

```

Os desafios são separados por tema/categoria:
  * Data (Dia, mês ano)
  * Tempo (__Data__, horas/minutos)
  * Variaveis
  * Condicionais(loops)
  * Classes, funções


Onde cada um dos tópicos acima são componentes de base e usado na criação de uma aplicação dinámica com PHP.
