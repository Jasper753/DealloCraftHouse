<?php

    if(session_status() == PHP_SESSION_NONE){
     session_start();
    } else {
header("Location: index.php");    }

    require "config.php";
    $connection = new PDO($dsn, $username, $password, $options);
    $msg = ""; 

    if(isset($_POST['submit'])) {
        if(isset($_SESSION['SESS_USER_ID'])){
            echo "<script>alert('You are already logged in!!!');
                window.location.href='index.php';</script>";
        
        }
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    if($username != "" && $password != "") {
    try {
      $query = "SELECT * FROM users where username=:username AND password=:password";
      $stmt = $connection->prepare($query);
      $stmt->bindParam('username', $username, PDO::PARAM_STR);
      $stmt->bindValue('password', $password, PDO::PARAM_STR);
      $stmt->execute();
      
      $count = $stmt->rowCount();
      $row   = $stmt->fetch(PDO::FETCH_ASSOC);
// 	  echo $count;
        if($count == 1  && !empty($row)) {
     
        $_SESSION['SESS_USER_ID']   = $row['id'];
        $_SESSION['SESS_USER_NAME']= $row['username'];
        $_SESSION['SESS_EMAIL'] = $row['email'];
        header("Location: afterlogin.php");
        } else {
            echo "<script>alert('Invalid username and password!');
                window.location.href='loginform.php';</script>";
        }
    } catch (PDOException $e) {
//      echo "Error : ".$e->getMessage();
    }
  } else {
//    $msg = "Both fields are required!";
  }
}
?>
