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
        <div class="col-md-2 col-md-10">

            <h4>Login</h4>
             
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control"/>
                </div>
 
                <div class="form-group">
                    <label for="pwd">Password</label>
                    <input type="password" name="password" class="form-control"/>
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary" value="Login"/>
                </div>
            </form>
        </div>
      </div>

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