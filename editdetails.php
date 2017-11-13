<?php

    require "config.php";
    require "login.php";   

    if(isset($_SESSION['SESS_USER_ID']))
    {
        $id = $_SESSION['SESS_USER_ID'];
        if(isset($_POST['updatedetails']))
        {
           
            $email  = $_POST['email'];
            $location = $_POST['location'];
            
            $connection = new PDO($dsn, $username, $password, $options);
            $msg = "";
            
            $query = $connection -> query("SELECT email FROM users WHERE id='$id'");
            $query_ = $connection -> query("SELECT location FROM users WHERE id='$id'");
            $sth = $query->fetchColumn();
            $stment = $query_->fetchColumn();
            
            if(!empty($location) && !empty($email)){
                $querydetail = $connection ->query("UPDATE users SET email = '$email' , location ='$location' WHERE id = '$id'");
                echo "<script>
                alert('YOU HAVE SUCCESSFULLY UPDATED YOUR DETAILS!');
                window.location.href='index.php';</script>";    
            }
            
    }
    }
    
?>
