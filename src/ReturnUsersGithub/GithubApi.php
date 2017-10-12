<?php

namespace DojoPHP\ReturnUsersGithub;
  
/**
  * @author: Acidiney Dias
  * @description: Return users residing in Angola
  * @param: $location
  * @git: CodingDojo/dojophp
  * @return: json
  * @method: get
  */
class GithubApi
{
    public $location;
    public $users_json;
    public $return_json;
    public $ch;
    public $url;
    public $userAgent;

    public function __construct($location)
    {
        $this->location = $location;
        $this->userAgent = 'User-Agent: PHP';
        $this->return_json = array();
        $this->url = 'https://api.github.com/search/users?q=location:';
        $this->ch = curl_init();
    }

    public function get_users()
    {
        try {

            /*Este bloco de codigo verifica se existe Angola no parametro, pra não haver redundância*/
            if (strpos($this->location, 'Angola')) :
                $this->url = $this->url.$this->location.'/Angola'; 
            else:
                    $this->url = $this->url.$this->location;
            endif;
  

            curl_setopt($this->ch, CURLOPT_URL, $this->url);
            curl_setopt($this->ch, CURLOPT_USERAGENT, $this->userAgent);
            curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
            $this->users_json = curl_exec($this->ch);
  

            return json_decode($this->users_json, true);
        } catch (Exception $e) {
            echo json_encode($e);
        }
        curl_close($this->ch);
    }
}
