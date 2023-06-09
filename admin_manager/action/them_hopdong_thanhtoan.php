<?php
session_start();
require_once  "../../model/config.php";
require_once "../../model/database.php";
require_once  "../../model/hd_thanhly.php";

if(isset($_POST['id_hd']) && isset($_POST['giaidoan']) && isset($_POST['ten_giaidoan']) && isset($_POST['tien_thanhly']) && isset($_POST['ngay_tratien']) && isset($_POST['status'])){
    $id_hd = $_POST['id_hd'];
    $giaidoan = $_POST['giaidoan'];
    $ten_giaidoan = $_POST['ten_giaidoan'];
    $tien_thanhly = $_POST['tien_thanhly'];
    $ngay_tratien = $_POST['ngay_tratien'];
    $status = $_POST['status'];

    // var_dump($ten_khachhang, $ten_nendat ,$id_duan,$namsinh,$gioitinh, $diachi ,$dc_lienlac,$email,$phone,$cmnd,$ngaycap,$noicap,$nghenghiep,$chucvu, $trangthai,$nguoi_thanhtoan);

    $hd_thanhtoan = new HopDongThanhLy();
    try{
        $insert = $hd_thanhtoan->insert($id_hd, $giaidoan, $ten_giaidoan, $tien_thanhly, $ngay_tratien, $status);
        header("location: ../danhsach_thanhtoan.php?id_hd=$id_hd");
    } catch(Throwable $err){
        $_SESSION['error'] = $err;
        header('location: ../404.php');
    }
}