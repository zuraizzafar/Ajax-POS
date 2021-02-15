<?php
    $conn = mysqli_connect('localhost', 'root', '', 'd03022021');
    session_start();
    if(!isset($_SESSION["products"])){
        $products = array(
            "product"=>
            array(""),
            "quantity"=>
            array("")
        );
        $_SESSION["products"] = $products;
    }
?>