<?php
include "Config.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM product WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result){
        mysqli_close($conn);
        header("location: Welcome.php");
    exit;
    } else {
        echo "<script>alert('Xóa thất bại');</script>";
    }
?>