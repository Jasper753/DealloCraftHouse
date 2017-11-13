<?php
    require "login.php";
?>
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
              <h3>Update Details</h3>
              
              <form action="editdetails.php" method = "post">
                  
                  <div class="form-group">
                      <label for="">Location</label>
                      <input type="text" name="location" class="form-control" required/>
                  </div>
                  
                  <div class="form-group">
                      <label for="">Email address</label>
                      <input type="email" name="email" class="form-control" required/>
                  </div>
              
                  <div class="form-group">
                      <input type="submit" name="updatedetails" class="btn btn-primary" value="Update"/>
                  </div>
              </form>
          </div>          
      </div>
      </div>
      
<!-- Footer -->
    <?php
            include_once "./tag/footer.php"
        ?>
<script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
    
    
</html>