<?php

use DojoPHP\UsuariosDeGithubEmAngola\ColecaoDeLuandansesNoGithub;
use PHPUnit\Framework\TestCase;

/**
 * @author Eleandro Duzentos <eleandro@inbox.ru>
 *
 * @link https://github.com/e200
 */
class ColecaoDeLuandansesNoGithubTest extends TestCase
{
    public function testObter()
    {
        $utilizadoresEncontrados = (new ColecaoDeLuandansesNoGithub())->obter();

        $this->assertNotEmpty($utilizadoresEncontrados);
        $this->assertInternalType('array', $utilizadoresEncontrados);
        $this->assertArrayHasKey('items', $utilizadoresEncontrados);
    }
}
