<?php
	
	use DojoPHP\returnUsersGithub\githubApi;
	use PHPUnit\Framework\TestCase as PHPUnit;

class githubTest extends PHPUnit
{

	public $search;
	public $git1;

	public function test()
	{
		$this->search 	= "Luanda";
		$this->git1		= new githubApi($this->search);


		return $this->git1->get_users();
	}
}
