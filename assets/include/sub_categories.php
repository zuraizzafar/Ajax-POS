<?php
    include 'conn.php';
    $id = $_POST['id'];
    $sql = "SELECT `id`, `name` FROM sub_category WHERE category='$id'";
    $result = mysqli_query($conn, $sql);
    // $i=1;
    while ($row=mysqli_fetch_assoc($result)) {
        echo "<option value='".$row['id']."'>".$row['name']."</option>";
    }
    // echo json_encode($subcats);
?>