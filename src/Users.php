<?php

namespace DojoPHP;

class Users {

    private $data;
    private $obj;

    /*
    /* get all Users
    * return array
    */
    public function getAllUsers(){
       $obj  = new API();
        $this->obj = $obj->get("https://api.github.com/search/users?q=location:Angola");
                foreach ($this->obj as $key => $value) {
                   $this->data = $value;
                }
                return $this->data;
    }

}
