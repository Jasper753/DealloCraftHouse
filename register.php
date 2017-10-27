<?php

    
    if (isset($_POST['registerBtn']))
{
	
	require "config.php";

	try 
	{
		$connection = new PDO($dsn, $username, $password, $options);
		
		$new_user = array(
			"firstname" => $_POST['firstname'],
			"lastname"  => $_POST['lastname'],
			"email"     => $_POST['email'],
			"username"  => $_POST['username'],
            "password"  => $_POST['password'],
			"location"  => $_POST['location']
		);
		$sql = sprintf(
				"INSERT INTO %s (%s) values (%s)",
				"users",
				implode(", ", array_keys($new_user)),
				":" . implode(", :", array_keys($new_user))
		);
		
		$statement = $connection->prepare($sql);
		$statement->execute($new_user);
	}
	catch(PDOException $error) 
	{
		echo "<br>" . $error->getMessage();
	}
}

?>