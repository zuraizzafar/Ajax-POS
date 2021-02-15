<?php
session_start();
$id = $_POST['cid'];
$quantity = $_POST['quan'];
if (array_search($id, $_SESSION["products"]["product"]) == NULL); else {
    $index = array_search($id, $_SESSION["products"]["product"]);
    $_SESSION["products"]["quantity"][$index] = $quantity;
    // echo $quantity;
}
// echo 'Done';