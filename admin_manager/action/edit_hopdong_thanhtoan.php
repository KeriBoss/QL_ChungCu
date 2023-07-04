<?php
session_start();
require_once  "../../model/config.php";
require_once "../../model/database.php";
require_once  "../../model/hd_thanhly.php";


if(isset($_POST['id_hd']) && isset($_POST['id_thanhtoan']) && isset($_POST['giaidoan']) && isset($_POST['ten_giaidoan']) && isset($_POST['tien_thanhly']) && isset($_POST['ngay_tratien']) && isset($_POST['status'])){
    $id_hd = $_POST['id_hd'];
    $id_thanhtoan = $_POST['id_thanhtoan'];
    $giaidoan = $_POST['giaidoan'];
    $ten_giaidoan = $_POST['ten_giaidoan'];
    $tien_thanhly = $_POST['tien_thanhly'];
    $ngay_tratien = $_POST['ngay_tratien'];
    $status = $_POST['status'];

    // var_dump($id_thanhtoan,$id_hd, $giaidoan, $ten_giaidoan,$tien_thanhly,$ngay_tratien,$status);die();

    try{
        $hd_thanhly = new HopDongThanhLy();
        $update = $hd_thanhly->update($id_thanhtoan,$id_hd, $giaidoan, $ten_giaidoan,$tien_thanhly,$ngay_tratien,$status);
        header("location: ../danhsach_thanhtoan.php?id_hd=$id_hd");
    } catch(Throwable $err){
        $_SESSION['error'] = $err;
        header('location: ../404.php');
    }
}