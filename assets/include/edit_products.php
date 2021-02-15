<?php
include 'conn.php';
$id = $_POST['id'];
$pname = $_POST['epname'];
$pquan = $_POST['epquan'];
$pcat = $_POST['epcat'];
$pscat = $_POST['epscat'];
$status = $_POST['status'];
$price = $_POST['eprice'];
$sql = "UPDATE products SET `name`='$pname', `category`='$pcat', `subcategory`='$pscat', `quantity`= '$pquan', `disabled`=$status, `price`='$price' WHERE id='$id'";
mysqli_query($conn, $sql);
