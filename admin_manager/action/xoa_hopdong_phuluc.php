<?php
session_start();
require_once  "../../model/config.php";
require_once "../../model/database.php";
require_once  "../../model/hd_phuluc.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$hd_phuluc = new HopDongPhuLuc();
try {
    $delete = $hd_phuluc->delete($id);
    header('location: ../danhsach_hopdong_phuluc.php');
} catch (Throwable $err) {
    $_SESSION['error'] = $err;
    header('location: ../404.php');
}