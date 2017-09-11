<?php

require 'src/Users.php';

$obj = new \DojoPHP\Users();
$array =  $obj->getAllUsers();


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User | GITHUB</title>
</head>
<body>

    <div>
    <?php 
foreach ($array as $key => $value) { ?>
   
<h1><?php echo $value->login; ?></h1><br>
<img src="<?php echo $value->avatar_url; ?>">
    		
    	<?php }
?>
	
    </div>

</body>
</html>