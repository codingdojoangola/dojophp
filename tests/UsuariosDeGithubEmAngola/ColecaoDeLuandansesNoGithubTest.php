<?php

use PHPUnit\Framework\TestCase;
use DojoPHP\UsuariosDeGithubEmAngola\ColecaoDeLuandansesNoGithub;

/**
 * @author Eleandro Duzentos <eleandro@inbox.ru>
 *
 * @link https://github.com/e200
 */
class ColecaoDeLuandansesNoGithubTest extends TestCase
{
    function testObter()
    {
        $utilizadoresEncontrados = (new ColecaoDeLuandansesNoGithub)->obter();

        $this->assertNotEmpty($utilizadoresEncontrados);
        $this->assertInternalType('array', $utilizadoresEncontrados);
        $this->assertArrayHasKey('items', $utilizadoresEncontrados);
    }
}
