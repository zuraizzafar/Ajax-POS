<?php
    include 'conn.php';
    $pname = $_POST['pname'];
    $pquan = $_POST['pquan'];
    $pcat = $_POST['pcat'];
    $pscat = $_POST['pscat'];
    $price = $_POST['price'];

    try {
        $sql = "INSERT INTO products(`name`, `category`, `subcategory`, `quantity`, `disabled`, `price`) VALUES ('$pname','$pcat','$pscat','$pquan', 0, '$price')";
        mysqli_query($conn, $sql);
        // header('Location: ../../add-product/');
        $last_id = mysqli_insert_id($conn);
        echo $last_id;
    }
    catch(Exception $e) {
        echo $e;
    }
?>  