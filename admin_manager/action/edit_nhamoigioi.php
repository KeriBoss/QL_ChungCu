<?php
session_start();
require_once  "../../model/config.php";
require_once "../../model/database.php";
require_once  "../../model/nhamoigioi.php";


if(isset($_POST['id_nmg']) && isset($_POST['ten_nmg']) && isset($_POST['phone']) && isset($_POST['diachi']) && isset($_POST['email']) && isset($_POST['gioitinh']) && isset($_POST['chucvu'])){
    $id_nmg = $_POST['id_nmg'];
    $ten_nmg = $_POST['ten_nmg'];
    $phone = $_POST['phone'];
    $diachi = $_POST['diachi'];
    $email = $_POST['email'];
    $gioitinh = $_POST['gioitinh'];
    $chucvu = $_POST['chucvu'];

    try{
        $nhamoigioi = new NhaMoiGioi();
        $update = $nhamoigioi->update($id_nmg,$ten_nmg, $phone, $diachi,$email,$gioitinh,$chucvu);
        header('location: ../danhsach_nhamoigioi.php');
    } catch(Throwable $err){
        $_SESSION['error'] = $err;
        header('location: ../404.php');
    }
}