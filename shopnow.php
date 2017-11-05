<!DOCTYPE html>
<html>

<head>
        <title>Deallo Craft House</title>
        <?php
            include_once "./tag/header.php"
        ?>

<body>
  <!-- Navigation -->

		<?php
            include_once "./tag/Nbar.php"
        ?>
		
		
  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <h1 class="my-4">Deallo Craft House</h1>
          <div class="list-group">
            <a href="clothandAccesories.php" class="list-group-item">Cloth &amp; Accessories</a>
            <a href="#" class="list-group-item">Arts</a>
            <a href="#" class="list-group-item">Decoration</a>
			<a href="#" class="list-group-item">Jewelry</a>
			<a href="#" class="list-group-item">Handmade Craft</a>
			<a href="#" class="list-group-item">Home &amp; Living</a>
          </div>
      </div>
                    <div class="row list-group col-lg-9 col-md-9 col-sm-8 col-xs-12 well">
                        <?php
                            include_once "./process/product_list.php";
                            if (empty($_GET["filter"])){
                                list_product(0,0);
                            } else {
                                list_product(0,$_GET["filter"]);
                            }
                        ?>
                    </div>
      <!-- /.col-lg-9 -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
  
  <!-- Footer -->

		<?php
            include_once "./tag/footer.php"
        ?>
    <!-- /.container -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>