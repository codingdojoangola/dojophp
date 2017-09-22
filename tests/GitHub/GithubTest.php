<?php
	
use DojoPHP\ReturnUsersGithub\GithubApi;
use PHPUnit\Framework\TestCase as PHPUnit;

class GithubTest extends PHPUnit
{

	public $search;
	public $git1;

	public function testGithubUserAngola()
	{
		$this->search 	= "Luanda";
		$this->git1	= new GithubApi($this->search);
		return $this->git1->get_users();
	}
}
