<?php

namespace DojoPHP\UpdateFileJson;

class UpdateFileJsonAPI {

    public $source;
    public $data = [];

    public function __construct($dataInputs = [], $source){
        $this->source = $source;
        $this->data = $dataInputs;
    }

    public function UpdateFile(){

    }
}


