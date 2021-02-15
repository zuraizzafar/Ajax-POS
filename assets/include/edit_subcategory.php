<?php
include 'conn.php';
$id = $_POST['id'];
$name = $_POST['escname'];
$pcat = $_POST['epscat'];
$status = $_POST['status'];

$sql = "UPDATE sub_category SET `name`='$name', `category`='$pcat', `disabled`='$status' WHERE id='$id'";
mysqli_query($conn, $sql);
