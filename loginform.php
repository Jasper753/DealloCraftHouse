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
      
  <div class="container pad">
    <div class="row">
        <div class="col-md-5">

            <h4>Login</h4>
             
            <form action="loginform.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" required/>
                </div>
 
                <div class="form-group">
                    <label for="pwd">Password</label>
                    <input type="password" name="password" class="form-control" required/>
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary" value="Login" required/>
                </div>
            </form>
        </div>
      </div>

      <?php

    if(session_status() == PHP_SESSION_NONE){
     session_start();
    } 

    require "config.php";
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
// 	  echo $count;
        if($count == 1  && !empty($row)) {
     
        $_SESSION['SESS_USER_ID']   = $row['id'];
        $_SESSION['SESS_USER_NAME']= $row['username'];
        $_SESSION['SESS_EMAIL'] = $row['email'];
        header("Location: afterlogin.php");
        } else {
             echo "<script>alert('Invalid username and password!');</script>";
        }
    } catch (PDOException $e) {

    }
  } else {

  }
}
?>

    </div>
      <div class ="footer">
      <!-- Footer -->
    <?php
            include_once "./tag/footer.php"
        ?>
        </div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>