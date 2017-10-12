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
        $cll = new ColecaoDeLuandansesNoGithub();

        $utilizadoresEncontrados = $cll->obter();

        $this->assertNotEmpty($utilizadoresEncontrados);
        $this->assertInternalType('array', $utilizadoresEncontrados);
        $this->assertArrayHasKey('items', $utilizadoresEncontrados);
        $this->assertCount(12, $utilizadoresEncontrados['items']);

        /**
         * Pegando alguns russos.
         *
         * Infelizmente não existe um `assertIsRussian()` kkk.
         */
        $utilizadoresEncontrados = $cll->obter('Russia,Moscow');

        $this->assertNotEmpty($utilizadoresEncontrados);
        $this->assertInternalType('array', $utilizadoresEncontrados);
        $this->assertArrayHasKey('items', $utilizadoresEncontrados);
        $this->assertCount(12, $utilizadoresEncontrados['items']);

        /**
         * Testando as variáveis `$pagina` e `$limite`.
         */

        $utilizadoresEncontrados = $cll->obter('Russia,Moscow', 1, 5);

        $this->assertNotEmpty($utilizadoresEncontrados);
        $this->assertInternalType('array', $utilizadoresEncontrados);
        $this->assertArrayHasKey('items', $utilizadoresEncontrados);
        $this->assertCount(5, $utilizadoresEncontrados['items']);
    }
}
