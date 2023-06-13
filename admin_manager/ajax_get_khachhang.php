<?php
require_once '../model/config.php';
require_once '../model/database.php';
require_once '../model/khachhang.php';

if(isset($_GET['id_kh'])){
    $id_kh = $_GET['id_kh'];

    try{
        $khachhang = new KhachHang();
        $layKhachHangTheoId = $khachhang->layKhachHangTheoId($id_kh);

        echo json_encode($layKhachHangTheoId[0]);
    }catch(Throwable $err){
        echo $err;
    }
}