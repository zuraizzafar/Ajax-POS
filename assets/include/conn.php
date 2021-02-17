<?php
$conn = mysqli_connect('localhost', 'root', '', 'd03022021');
if (!isset($_COOKIE["cart_items"]))
    setcookie("cart_items", 0, time() + (86400 * 7), "/");
session_start();
if (!isset($_SESSION["products"])) {
    $products = array(
        "product" =>
        array(""),
        "quantity" =>
        array("")
    );
    // setcookie("products", $products, time()+(86400 * 7));
    $_SESSION["products"] = $products;
}
