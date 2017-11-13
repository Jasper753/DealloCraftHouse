
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
                    
                    echo "<script>
                alert('YOUR PASSWORD HAS BEEN CHANGED!');
                window.location.href='index.php';</script>";
                } 
                else
                     echo "<script>
                alert('NEW PASSWORD DOES NOT MATCH!');
                window.location.href='changepasswordform.php';</script>";
                    
            } 
            else 
            {
                echo "<script>
                alert('CURRENT PASSWORD DOES NOT MATCH!');
                window.location.href='changepasswordform.php';</script>";    
            }     
        }
    }

?>
