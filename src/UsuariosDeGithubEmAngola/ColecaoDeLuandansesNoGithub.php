<?php

namespace DojoPHP\UsuariosDeGithubEmAngola;

/**
 * Class ColecaoDeLuandansesNoGithub.
 *
 * Coleção de utilizadores do github em Luanda, Angola.
 *
 * @author Eleandro Duzentos <eleandro@inbox.ru|github:e200>
 */
class ColecaoDeLuandansesNoGithub
{
    /**
     * Retorna uma lista contendo informações
     * sobre utilizadores do Github em Luanda, Angola.
     *
     * @param $pagina Grupo de usuário requisitado.
     * @param $limite Número de utilizadores que será retornado.
     *
     * @return array
     */
    public function obter($localizacao = 'Luanda,Angola', $pagina = 1, $limite = 12)
    {
        /*
         * Informações de cabeçalho para a requisição que
         * vamos fazer ao Github API.
         */
        $header = [
            'http' => [
                'method' => 'GET',
                'header' => [
                        'User-Agent: DojoPHP',
                    ],
                ],
            ];

        /*
         * O Github API precisa saber quem está a pedir as informações,
         * pelo menos o método de requisição e o user-agent. Por isso
         * estou a criar um stream de contexto para passar como parámetro
         * ao file_get_contents().
         *
         * Stream de contexto nada mais é que o header, faz básicamente
         * o mesmo que o header(), só que em streams.
         *
         * file_(get|put)_contents() usa streams para ler arquivos, mas
         * muita gente não sabe.
         */
        $context = stream_context_create($header);

        $githubUsers = file_get_contents(
            'https://api.github.com/search/users?q=location:'.$localizacao.'&page='.$pagina.'&per_page='.$limite,
            false,
            $context
        );

        /*
         * Por padrão, o json_decode() retorna um objecto do tipo sdtClass,
         * mas como é mais comum trabalhar-se com array, fiz a conversão.
         */
        return (array) json_decode($githubUsers);
    }
}
