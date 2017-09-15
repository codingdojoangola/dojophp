<?php

/**
 * User: Renato Martins
 * Date: 12/09/2017
 * Time: 21:13
 */
class GitHubAngola
{



    function getCurlVal(){

        $curl_init=curl_init();
        $url="curl -u guimar86:540bdd5a9a1d676d7e4ca4b082aaf62d12fcc8ee https://api.github.com/search/users?q=location:Luanda/Angola";
        curl_setopt($curl_init,CURLOPT_URL,$url);
        curl_setopt($curl_init,CURLOPT_RETURNTRANSFER,$url);

        $result=curl_exec($curl_init);


    }
    /**
     * Função usada para ler o endpoint do gitHub
     * e obter todos utilizadores em Angola
     * =====AUTENTICACAO EM FALTA====
     * @return array
     */
    function getGitHubAngolanUsers()
    {

        $toReturn = array();
        //$github_url=curl -u guimar86:540bdd5a9a1d676d7e4ca4b082aaf62d12fcc8ee https://api.github.com/search/users?q=location:Luanda/Angola
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