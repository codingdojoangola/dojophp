<?php
namespace DojoPHP\ReturnUsersGithub;
require("GithubApi.php");
$new = new GithubApi($_POST['cidade']);
//$new = new GithubApi('Luanda');
$u = $new->get_users();

echo json_encode($u);