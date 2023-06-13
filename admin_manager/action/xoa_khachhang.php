<?php
session_start();
require_once  "../../model/config.php";
require_once "../../model/database.php";
require_once  "../../model/khachhang.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$khachhang = new KhachHang();
try {
    $delete = $khachhang->delete($id);
    header('location: ../danhsach_khachhang.php');
} catch (Throwable $err) {
    $_SESSION['error'] = $err;
    header('location: ../404.php');
}