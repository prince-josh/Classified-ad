<?php
session_start();
include "../includes/connection.php";
if (!isset($_GET['id'])) {
    header("location: ../login.php");
}else{
    $img_id = $_GET['id'];
    $del = "delete from ads_images where image_id = '$img_id' ";
    $run_del = mysqli_query($con, $del);
    echo "<script> location.reload() </script>";
}