<?php

/**
 * User: Renato Martins
 * Date: 12/09/2017
 * Time: 21:13
 */
class GitHubAngola
{


    /**
     * Função usada para ler o endpoint do gitHub
     * e obter todos utilizadores em Angola
     * =====AUTENTICACAO EM FALTA====
     * @return array
     */
    function getGitHubAngolanUsers()
    {

        $toReturn = array();
        $github_url = 'https://api.github.com/search/users?q=location:Luanda/Angola';
        $github_json = file_get_contents($github_url);
        $github_array = json_decode($github_json, true);
        

        if (!empty($github_array)) {

            foreach ($github_array['data'] as $names) {

                array_push($toReturn, ['total_count']['incomplete_results']['items']['login']);
            }

        }

        return $toReturn;
    }


    /**
     * Função usada para ler o endpoint do rest api do github
     * e devolver a lista de utilizadores na localizcao solicitada.
     * ==== AUTENTICACAO EM FALTA ====
     * @param $location
     * @return array
     */
    function getGitHubUserByLocation($location)
    {

        $toReturn = array();
        $github_url = 'https://api.github.com/search/users?q=location:' . $location;
        $github_json = file_get_contents($github_url);
        $github_array = json_decode($github_json, true);

        if (!empty($github_array)) {

            foreach ($github_array['data'] as $names) {

                array_push($toReturn, ['total_count']['incomplete_results']['items']['login']);
            }

        }

        return $toReturn;
    }

}