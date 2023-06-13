<?php
session_start();
require_once  "../../model/config.php";
require_once "../../model/database.php";
require_once  "../../model/nhamoigioi.php";


$nhamoigioi = new NhaMoiGioi();

if(isset($_POST['ten_nmg']) && isset($_POST['phone']) && isset($_POST['diachi']) && isset($_POST['email']) && isset($_POST['gioitinh']) && isset($_POST['chucvu'])){
    $ten_nmg = $_POST['ten_nmg'];
    $phone = $_POST['phone'];
    $diachi = $_POST['diachi'];
    $email = $_POST['email'];
    $gioitinh = $_POST['gioitinh'];
    $chucvu = $_POST['chucvu'];

    try{
        $insert = $nhamoigioi->insert($ten_nmg, $phone, $diachi, $email, $gioitinh, $chucvu);
        header('location: ../danhsach_nhamoigioi.php');
    } catch(Throwable $err){
        echo $err;
        header('location: ../404.php');
    }
}