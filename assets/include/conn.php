<?php
    $conn = mysqli_connect('localhost', 'root', '', 'd03022021');
    setcookie("cart_items", 0, time()+(86400 * 7),"/");
    if(!isset($_COOKIE["username"])){
    session_start();
        $products = array(
            "product"=>
            array(""),
            "quantity"=>
            array("")
        );
        // setcookie("products", $products, time()+(86400 * 7));
        $_SESSION["products"] = $products;
    }
?>