
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  </head>
  <body class="container">
      <div class= "row">
          <div class = "col-md-5">
              <h3>Change password</h3>
              
              <form action="changepassword.php" method = "post">
                  
                  
                  <div class="form-group">
                      <label for="">Verify current password:</label> <input type='password' name='oldpassword'/>
                  </div>
                  
                  <div class="form-group">
                      <label for="">New password:</label> <input type='password' name='newpassword'/>
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

<script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>