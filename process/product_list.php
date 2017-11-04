
<?php
function list_product($list,$filter) {
    
    include_once "./process/des_filter.php";
    require "./process/db_conn.php";

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