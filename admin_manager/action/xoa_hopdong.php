<?php
session_start();
require_once  "../../model/config.php";
require_once "../../model/database.php";
require_once  "../../model/hopdong.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$hopdong = new HopDong();
try {
    $delete = $hopdong->delete($id);
    header('location: ../danhsach_hopdong.php');
} catch (Throwable $err) {
    $_SESSION['error'] = $err;
    header('location: ../404.php');
}