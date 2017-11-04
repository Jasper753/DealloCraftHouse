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
      <div class= "row">
          <div class = "col-md-5">
              <h3>Sign Up</h3>
              
              <form action="register.php" method = "post">
                  
                  <div class = "form-group">
                      <label for="">First name</label>
                      <input type="text" name = "firstname" class="form-control"/>
                  </div>
                  
                  <div class = "form-group">
                      <label for="">Last name</label>
                      <input type="text" name = "lastname" class="form-control"/>
                  </div>
                  
                  <div class="form-group">
                      <label for="">Location</label>
                      <input type="text" name="location" class="form-control"/>
                  </div>
                  
                  <div class="form-group">
                      <label for="">Email address</label>
                      <input type="email" name="email" class="form-control"/>
                  </div>
                  
                  <div class="form-group">
                      <label for="">Username</label>
                      <input type="text" name="username" class="form-control"/>
                  </div>
                  
                  <div class="form-group">
                      <label for="">Password</label>
                      <input type="password" name="password" class="form-control"/>                   
                  </div>
              
                  <div class="form-group">
                      <input type="submit" name="registerBtn" class="btn btn-primary" value="Register"/>
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