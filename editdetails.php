<!DOCTYPE html>
<html>
  <head>

        <?php
            include_once "./tag/header.php"
        ?>

  </head>

  <body>

   <?php
            include_once "./tag/Nbar.php"
        ?>
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
                
                die("YOUR DETAILS HAS BEEN CHANGED!");
            }    
        }
    }

    else {
        echo "PLEASE ";
        echo "<a href='login.html'>LOG IN</a>"; 
        echo " BEFORE CHANGING YOUR DETAILS.";
    }
?>
</body>
<?php
            include_once "./tag/footer.php"
        ?>
<script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</html>
