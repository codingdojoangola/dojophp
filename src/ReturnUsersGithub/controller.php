<?php
namespace DojoPHP\ReturnUsersGithub;
require("GithubApi.php");
$new = new GithubApi($_POST['cidade']);
$items = $new->get_users();
$elements = $items['items'];
$user = '';

foreach ($elements as $key) {
	$user .= '<div class="user-card">
				<div class="card-image">
					<figure class="image is4by3">
							<a href="'.$key["html_url"].'" class="" title="Abrir o perfil de  '.$key["login"].'">
							<img src="'.$key["avatar_url"].'" alt="'.$key["login"].'" class="center-block img-circle">
							</a>
					</figure>
				</div> 
					<div class="card-content">
						<h1 class="title is-4">
						<a href="'.$key["html_url"].'">'.$key["login"].'</a>
						</h1>
					</div>
			</div>';
}

echo json_encode($user);
