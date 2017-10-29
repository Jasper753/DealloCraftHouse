<?php
 session_start();

    require "config.php";
    require "../testing/common.php";
    $connection = new PDO($dsn, $username, $password, $options);
    $msg = ""; 

if(isset($_POST['submit'])) {
    if(isset($_SESSION['SESS_USER_ID'])){
        print("You are already logged in!!");
        exit;
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
  echo $count;
        if($count == 1  && !empty($row)) {
     
        $_SESSION['SESS_USER_ID']   = $row['id'];
        $_SESSION['SESS_USER_NAME']= $row['username'];
        $_SESSION['SESS_EMAIL'] = $row['email'];
        print("YOU HAVE SUCCESSFULLY LOGGED IN!");
        echo "<br>";
        echo "<a href='editdetails.html'>Update details  |  </a>"; 
        echo "<a href='changepassword.html'>Change password</a>"; 
      } else {
        $msg = "Invalid username and password!";
            print("$msg");
      }
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  } else {
    $msg = "Both fields are required!";
  }
}
?>
