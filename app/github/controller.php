<?php
use  DojoPHP\ReturnUsersGithub\GithubApi;
class Index 
{
	public function retorna($a)
	{
		$git = new GithubApi($a);
		$git->get_users();
	}
}
	$obj = new Index;
	$return = $obj->retorna($_POST['cidade']);
	echo json_encode($return);