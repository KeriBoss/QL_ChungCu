<?php
session_start();
require_once  "../../model/config.php";
require_once "../../model/database.php";
require_once  "../../model/khachhang.php";

// var_dump($_POST['ten_nendat']);die();

if(isset($_POST['ten_khachhang']) && isset($_POST['id_kh']) && isset($_POST['namsinh']) && isset($_POST['gioitinh']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['diachi']) && isset($_POST['dc_lienlac']) && isset($_POST['cmnd']) && isset($_POST['ngaycap']) && isset($_POST['noicap']) && isset($_POST['nghenghiep']) && isset($_POST['chucvu']) && isset($_POST['trangthai']) && isset($_POST['nguoi_thanhtoan'])){
    $id_kh = $_POST['id_kh'];
    $ten_khachhang = $_POST['ten_khachhang'];
    $namsinh = $_POST['namsinh'];
    $gioitinh = $_POST['gioitinh'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $diachi = $_POST['diachi'];
    $dc_lienlac = $_POST['dc_lienlac'];
    $cmnd = $_POST['cmnd'];
    $ngaycap = $_POST['ngaycap'];
    $noicap = $_POST['noicap'];
    $nghenghiep = $_POST['nghenghiep'];
    $chucvu = $_POST['chucvu'];
    $trangthai = $_POST['trangthai'];
    $nguoi_thanhtoan = $_POST['nguoi_thanhtoan'];

    try{
        $khachhang = new KhachHang();
        $update = $khachhang->update($id_kh,$ten_khachhang,$namsinh,$gioitinh, $diachi ,$dc_lienlac,$email,$phone,$cmnd,$ngaycap,$noicap,$nghenghiep,$chucvu, $trangthai,$nguoi_thanhtoan);
    
        header("location: ../danhsach_khachhang.php");

    }catch(Throwable $err){
        $_SESSION['error'] = $err;
        header('location: ../404.php');
    }
}