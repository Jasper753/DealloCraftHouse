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
        if(isset($_POST['update']))
        {
            $oldpassword =  $_POST['oldpassword'];
            $newpassword = $_POST['newpassword'];
            $newpasswordagain =  $_POST['newpasswordagain'];
            
            $connection = new PDO($dsn, $username, $password, $options);
            $msg = "";
            
            $query = $connection -> query("SELECT password FROM users WHERE id='$id'");
            $sth = $query->fetchColumn();
            
            $oldpasswordindb = $sth;
            
            if($oldpassword == $oldpasswordindb){
                if(($newpassword == $newpasswordagain) && !empty($newpassword)){
                    $querypwc=$connection->query("UPDATE users SET password='$newpassword' WHERE id = '$id'");
                    
                    die("YOUR PASSWORD HAS BEEN CHANGED!");
                } 
                else
                    die("NEW PASSWORD DOES NOT MATCH!");
            } 
            else 
            {
                die ("CURRENT PASSWORD DOES NOT MATCH!");
            }     
        }
    }
else {
    echo "PLEASE ";
    echo "<a href='login.html'>LOG IN</a>"; 
    echo " BEFORE CHANGING YOUR PASSWORD.";
}
?>
</body>
<?php
            include_once "./tag/footer.php"
        ?>
<script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</html>