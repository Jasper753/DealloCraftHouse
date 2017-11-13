<?php
	include_once __DIR__."/../login.php"
?>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Deallo Craft House</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="shopnow.php">Shop Now</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact Us</a>
              </li>
              
              
              <?php
                if ( isset( $_SESSION['SESS_USER_NAME'] ) ) // user is logged in
                {
                ?>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" style="text-decoration:none"><b><?php echo $_SESSION['SESS_USER_NAME'];?> </b> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                               <li><a href="afterlogin.php">My Profile</a></li>
                               <li><a href="logout.php">Log Out</a></li>
                           </ul>
                        
                          
                </li>
                       

                <?php
                }
                else // not logged in
                {
                ?>
                   <!-- Login Form -->
                   <li class="nav-item"><a class=" nav-link" href="signupform.php" style="text-decoration:none">Sign up</a>
                   <li class="nav-item"><a class="nav-link" href="loginform.php" style="text-decoration:none">Login</a>
                   <!-- /.Login Form -->
                <?php
                }
                ?>
            
          </ul>
        </div>
      </div>
    </nav>
