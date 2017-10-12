<?php


use DojoPHP\ReturnUsersGithub\GithubApi;
use PHPUnit\Framework\TestCase;

class GithubTest extends TestCase
{
    public $search;
    public $git1;

    public function testGithubUserAngola()
    {
        $this->search = 'Luanda';
        $this->git1 = new GithubApi($this->search);
        $this->assertNotEmpty($this->git1->get_users());
        $this->assertInternalType('array', $this->git1->get_users());
        $this->assertArrayHasKey('items', $this->git1->get_users());
    }
}
