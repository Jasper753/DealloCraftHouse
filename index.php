<!DOCTYPE html>
<html lang="en">

  <head>
        <title>Deallo Craft House</title>
        <?php
            include_once "./tag/header.php"
        ?>
    </head>

  <body>
  
      <!-- Navigation -->
		<?php
            include_once "./tag/Nbar.php"
        ?>

    <!-- Page Content -->
    <div class="container">

      <div class="row">
	  
     
		<?php
            include_once "./tag/catagories.php"
        ?>
		
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
				<div class="carousel-caption">
                                    <h3>Promotional Event 1</h3>
                                    <p>Promo Description 1</p>
                </div>
			  </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
              	<div class="carousel-caption">
                                    <h3>Promotional Event 2</h3>
                                    <p>Promo Description 2</p>
                </div>
			  </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
              	<div class="carousel-caption">
                                    <h3>Promotional Event 3</h3>
                                    <p>Promo Description 3</p>
                </div>			  
			  </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

		  <h1 class="page-header">Latest Item</h1>
          
		  <div class="row">
                    <?php
                        include_once "./process/product_list.php";
                        product_list(1,0);
                    ?>		  
		  </div>
		  
		  <h1 class="page-header">Editor's Pick</h1>
          
		  <div class="row">
                    <?php
                        include_once "./process/product_list.php";
                        product_list(2,0);
                    ?>		  
          </div>
		  
		  <h1 class="page-header">Recommendation</h1>
          
		  <div class="row">  
                    <?php
                        include_once "./process/product_list.php";
                        product_list(1,0);
                    ?>		  
		  </div>
		 <h1 class="page-header">Community Tastemakers</h1>
          <div class="row">
                    <?php
                        include_once "./process/product_list.php";
                        product_list(1,0);
                    ?>		  
		  </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
      </div>
    <!-- Footer -->
		<?php
            include_once "./tag/footer.php"
        ?>
<script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </body>

</html>
