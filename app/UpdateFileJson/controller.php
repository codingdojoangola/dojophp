<?php
require '../../vendor/autoload.php';
use DojoPHP\UpdateFileJson\UpdateFileJsonAPI;

// Preenchendo dados padrão

$data = [
    "nome" => addslashes($_POST['name']),
    "cargo" => addslashes($_POST['function']),
    "avatar" => ""
];
$source = "../../data/codingdojo.json";
$key = "membros";

// Instaciando Classe UpdateFileJsonAPI
$new = new UpdateFileJsonAPI($data, $source, $key);
$msg = $new->UpdateFile();
echo json_encode($msg);