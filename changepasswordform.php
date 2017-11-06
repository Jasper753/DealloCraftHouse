
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
              <h3>Change password</h3>
              
              <form action="changepassword_.php" method = "post">
                  
                  <div class="form-group">
                      <label for="">Verify current password:</label> <input type='password' name='oldpassword'/>
                  </div>
                  
                  <div class="form-group">
                      <label for="">New password:</label> <br><input type='password' name='newpassword'/>
                  </div>
                  
                  <div class="form-group">
                      <label for="">Repeat new password: </label><input type='password' name='newpasswordagain'>
                  </div>
                                
                  <div class="form-group">
                      <input type="submit" name="update" class="btn btn-primary" value="Update"/>
                  </div>
              </form>
          </div>          
      </div>
      </div>
      </body>
    <div class="footer">
<?php
            include_once "./tag/footer.php"
        ?>
    </div>
<script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</html>