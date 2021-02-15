<?php
include 'conn.php';
$id = $_POST['id'];
$name = $_POST['ecname'];
$status = $_POST['status'];

$sql = "UPDATE categories SET `name`='$name', `disabled`='$status' WHERE id='$id'";
mysqli_query($conn, $sql);
