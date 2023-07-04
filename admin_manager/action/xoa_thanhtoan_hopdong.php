<?php
session_start();
require_once  "../../model/config.php";
require_once "../../model/database.php";
require_once  "../../model/hd_thanhly.php";

if(isset($_GET['id_hd']) && isset($_GET['id_thanhtoan'])){
    $id_hd = $_GET['id_hd'];
    $id_thanhtoan = $_GET['id_thanhtoan'];

    $hd_thanhly = new HopDongThanhLy();
    try {
        $delete = $hd_thanhly->delete($id_thanhtoan);
        header("location: ../danhsach_thanhtoan.php?id_hd=$id_hd");
    } catch (Throwable $err) {
        $_SESSION['error'] = $err;
        header('location: ../404.php');
    }
}
