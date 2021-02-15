<?php
session_start();
$id = $_POST['pid'];
if (array_search($id, $_SESSION["products"]["product"]) == NULL) {
    array_push($_SESSION["products"]["product"], $id);
    array_push($_SESSION["products"]["quantity"], 1);
} else {
    $index = array_search($id, $_SESSION["products"]["product"]);
    $quantity = $_SESSION["products"]["quantity"][$index];
    $_SESSION["products"]["quantity"][$index] = $quantity + 1;
}
