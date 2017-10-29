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
        
        $firstname = $_POST['firstname'];
        $lastname  = $_POST['lastname'];
        $email    = $_POST['email'];
        $username  = $_POST['username'];
        $password  = $_POST['password'];
		$location  = $_POST['location'];
        
        if(empty($firstname) || empty($lastname) || empty($email) || empty($username) || empty($password) || empty($location)){
            if(empty($firstname)) {
                echo "<font color='red'>First name field is empty.</font><br/>";
            }
            
            if(empty($lastname)) {
                echo "<font color='red'>Last name field is empty.</font><br/>";
            }
        
            if(empty($email)) {
                 echo "<font color='red'>Email field is empty.</font><br/>";
            }
        
            if(empty($username)) {
                echo "<font color='red'>Username field is empty.</font><br/>";
            }
        
            if(empty($location)) {
                echo "<font color='red'>Location field is empty.</font><br/>";
            }
            
            //link to the previous page
            echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
        }
        
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