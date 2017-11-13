<!DOCTYPE html>
<html>
  <head>

        <?php
            include_once "./tag/header.php"
        ?>

  </head>

  <body>
   	 	<script src="assets/js/form_validation.js"></script>

   <?php
            include_once "./tag/Nbar.php"
        ?>
      
      <div class="container pad">
          <div>
          
              <h3>Sign Up</h3>
              
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
            
//            //link to the previous page
//            echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
        }
        
		$sql = sprintf(
				"INSERT INTO %s (%s) values (%s)",
				"users",
				implode(", ", array_keys($new_user)),
				":" . implode(", :", array_keys($new_user))
		);
		
		$statement = $connection->prepare($sql);
		$statement->execute($new_user);
        echo "<script>alert('REGISTRATION SUCCESS!');
                window.location.href='index.php';</script>";
	}
	catch(PDOException $error) 
	{
        if($error->getCode() == 23000){
            echo "<font color='red'>USERNAME OR EMAIL ADDRESS HAS ALREADY BEEN USED!!</font><br>";
        }
	}
}

?>
          </div>
                <div class= "row">

              <div class = "col-md-5">
    <form action="signupform.php" method = "post">
                  
                  <div class = "form-group">
                      <label for="">First name</label>
                      <input type="text" name = "firstname" class="form-control" required/>
                  </div>
                  
                  <div class = "form-group">
                      <label for="">Last name</label>
                      <input type="text" name = "lastname" class="form-control" required/>
                  </div>
                  
                  <div class="form-group">
                      <label for="">Location</label>
                      <input type="text" name="location" class="form-control" required/>
                  </div>
                  
                  <div class="form-group">
                      <label for="">Email address</label>
                      <input type="email" name="email" class="form-control" required/>
                  </div>
                  
                  <div class="form-group">
                      <label for="">Username</label>
                      <input type="text" name="username" class="form-control" required/>
                  </div>
                  
                  <div class="form-group">
                      <label for="">Password</label>
                      <input type="password" name="password" class="form-control" required/>                   
                  </div>
              
                  <div class="form-group">
                      <input type="submit" name="registerBtn" class="btn btn-primary" value="Register" required/>
                  </div>
              </form>
          </div>          
      </div>
      </div>
      
<!-- Footer -->
    <?php
            include_once "./tag/footer.php"
        ?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
</html>