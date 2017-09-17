<?php

/**
 * User: Renato Martins
 * Date: 16/09/2017
 * Time: 20:13
 */
class GitHubAngola
{


    /**
     * Metodo usado para retornar a lista de utilizadores pela
     * localizacao indicada
     * @return mixed
     */
    function getGitHubUsersByLocation($location)
    {

        if (!isset($location)) {

            trigger_error("Falta o parametro localizacao", E_USER_ERROR);
        }


        $userAgent = $_SERVER['HTTP_USER_AGENT'];

        $ch = curl_init();
        $url = "https://api.github.com/search/users?q=location:" . $location;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);

        curl_close($ch);

        $gitReturn = json_decode($result, true);

        //var_dump($gitReturn);

        return $gitReturn;

    }



}