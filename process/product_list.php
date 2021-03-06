<?php
function product_list($list,$filter) {
    include_once "des_filter.php";
    require "db_link.php";

    if ($filter != 0) {
        $offset = 0;
        $products = mysqli_query($conn, "SELECT * FROM products WHERE product_category = $filter LIMIT $offset, 12");
        $divstyle = "item product col-lg-4 col-md-4 col-sm-6 col-xs-12";
    } else {
        if ($list == 1) {
            // sort by new products
            $products = mysqli_query($conn, "SELECT * FROM products ORDER BY product_date_created DESC LIMIT 4");
            $divstyle = "item product col-lg-3 col-md-3 col-sm-5 col-xs-8";
        } else if ($list == 2) {
            // sort by editor's pick
            $products = mysqli_query($conn, "SELECT * FROM products ORDER BY product_quantity_sold DESC LIMIT 4");
            $divstyle = "item product col-lg-3 col-md-3 col-sm-5 col-xs-8";
        } else {
            $offset = 0;
            $products = mysqli_query($conn, "SELECT * FROM products LIMIT $offset, 12");
            $divstyle = "item product col-lg-4 col-md-4 col-sm-6 col-xs-12";
        }
    }
    
    if (!empty($products)) {
        foreach($products as $products) { 
?>
            <div class="<?php echo $divstyle ?>">
                <div class="list-productpicture">
                    <a href="product_details.php?id=<?php echo $products["product_id"]; ?>">
                        
                            <img class="list-group-image productimg" src="./assets/imgs/products/<?php echo $products["product_id"]; ?>" alt="Picture of <?php echo $products["product_name"]; ?>" />
                        
                        <img class="list-group-image productimg" src="

                    </a>
                </div>
                <div class="list-productdetails">
                    <a href="product_details.php?id=<?php echo $products["product_id"]; ?>">
                        <h4 class="list-group-item-heading"><?php echo substrwords($products["product_name"],30); ?></h4>
                    </a>

                    <!--
                        <p class="list-group-item-text">
						<?php echo substrwords($products["product_desc"],100); ?></p>
                    -->

                    <div class="row">
                        <div class="item product col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <h4>$<?php echo $products["product_price"]; ?></h4>
                        </div>
                        <div class="item product col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <a class="btn btn-primary" href="product_details.php?id=<?php echo $products["product_id"]; ?>"><span class="glyphicon glyphicon-info-sign"></span> View</a>
                        </div>
                    </div>
                </div>
            </div>
    <?php 
        }
    } else {
        echo "<p>No Product at the moment, will update it later :) Please Subcribe </p>";
    }
}
?>