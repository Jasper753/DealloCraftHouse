<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="framework/css/bootstrap.min.css" rel="stylesheet" media="screen">

  </head>
  <body class="container">
    <div class="row">
        <div class="col-md-10">

            <h4>Login</h4>
             
            <form action="" method="post">
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
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="framework/js/bootstrap.min.js"></script>
  </body>
</html>