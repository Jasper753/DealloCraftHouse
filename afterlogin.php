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
     <div class="profile well">
         <h3>Would you like to edit your details?</h3>
         <br>
         
        <input type="button" class="btn btn-info" value="Update Details" onclick="location.href = 'editdetails_.php';">
        
        <input type="button" class="btn btn-info" value="Change Password" onclick="location.href = 'changepassword.php';">
     </div>
    </body>
    
    <div class = "footer">
    <?php
            include_once "./tag/footer.php"
        ?>
    </div>
<script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</html>