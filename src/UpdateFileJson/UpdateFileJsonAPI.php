<?php

namespace DojoPHP\UpdateFileJson;

/**
 * @author Acidiney Dias
 * @desc this class expected three parameters [$dataInput(is Array), $source and a $key]
 * @return json with a message with status the return
 */
class UpdateFileJsonAPI
{

    public $source;
    public $data = [];
    public $openFile;
    public $alterFile;
    public $key;

    public function __construct($dataInputs = [], $source, $key)
    {
        $this->source = $source;
        $this->data = $dataInputs;
        $this->key = $key;
    }

    public function UpdateFile()
    {

       // var_dump($this->data); echo "<br />";
        // I'm  open file Json passed
        $this->openFile = file_get_contents($this->source);

        // Transform "temporary" he in array for php understand
        $this->alterFile = json_decode($this->openFile, true);

        // Now I'm used a method the PHP for add the new data in my collection data,
        //using array push

        array_push($this->alterFile["$this->key"], $this->data);

        // So I'm encode again the file for json formatter
        $this->alterFile = json_encode($this->alterFile);

        // In the end, I'm add the new data in my file original
        if(file_put_contents($this->source, $this->alterFile)):
            return json_encode(["message" => "File updated with success!"], 201); else:
            return json_encode(["message" => "File not was updated!"], 400);            
        endif;
    }
}
