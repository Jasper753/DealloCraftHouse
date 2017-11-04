
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Deallo Craft House</a>
        <a class="navbar-brand" href="#">Deallo Craft House</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact Us</a>
            </li>
              <?php if(isset($_SESSION['SESS_USER_ID'])){ ?>
                <?php echo '<li class="nav-item"><a class="nav-link" href="#" style="text-decoration:none">'.$_SESSION['SESS_USER_NAME'].'</a>';?>
                <li class="nav-item"><a class=" nav-link" href="logout.php" style="text-decoration:none">Logout</a>
            <?php }else{ ?>
            	<li class="nav-item"><a class=" nav-link" href="signup.php" style="text-decoration:none">Sign up</a>
                <li class="nav-item"><a class="nav-link" href="login_.php" style="text-decoration:none">Login</a>
            <?php } ?>
            
          </ul>
        </div>
      </div>
    </nav>
