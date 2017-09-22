<?php
	
use DojoPHP\EeturnUsersGithub\GithubApi;
use PHPUnit\Framework\TestCase as PHPUnit;

class GithubTest extends PHPUnit
{

	public $search;
	public $git1;

	public function testGithubUserAngola()
	{
		$this->search 	= "Luanda";
		$this->git1	= GithubApi::get_users($this->search);
		return $this->git1;
	}
}
