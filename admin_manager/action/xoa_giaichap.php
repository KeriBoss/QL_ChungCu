<?php
session_start();
require_once  "../../model/config.php";
require_once "../../model/database.php";
require_once  "../../model/hopdong.php";

if(isset($_GET['id_hd'])){
    $id_hd = $_GET['id_hd'];
}

try {
    $hopdong = new HopDong();
    $xoaGiaiChap = $hopdong->xoaGiaiChap($id_hd);
    header('location: ../danhsach_hopdong.php');
} catch (Throwable $err) {
    $_SESSION['error'] = $err;
    header('location: ../404.php');
}