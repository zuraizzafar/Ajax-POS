<?php
    session_start();
    $id = $_POST['cid'];
    $key = array_search($id,$_SESSION['products']["product"]);
    if ($key !== false) {
        unset($_SESSION['products']["product"][$key]);
        unset($_SESSION['products']["quantity"][$key]);
    }
?>