<?php
    session_start();
    // $pids = $_SESSION["products"]["product"];
    // asort($pids);
    // $id = "105";
    // if (array_search($id, $_SESSION["products"]["product"]) !== NULL) {
    //     $index = array_search($id, $pids);
    //     $quantity = $_SESSION["products"]["quantity"][$index];
    //     $_SESSION["products"]["quantity"][$index] = $quantity + 1;
    // } else {
    //     array_push($_SESSION["products"]["product"], $id);
    //     array_push($_SESSION["products"]["quantity"], 1);
    // }
    
$id = "106";
if (array_search($id, $_SESSION["products"]["product"]) == NULL) {
    array_push($_SESSION["products"]["product"], $id);
    array_push($_SESSION["products"]["quantity"], 1);
} else {
    $index = array_search($id, $_SESSION["products"]["product"]);
    $quantity = $_SESSION["products"]["quantity"][$index];
    $_SESSION["products"]["quantity"][$index] = $quantity + 1;
}

    print_r($_SESSION["products"]);
?>