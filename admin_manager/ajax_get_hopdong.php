<?php
require_once '../model/config.php';
require_once '../model/database.php';
require_once '../model/khachhang.php';
require_once '../model/hopdong.php';

if(isset($_GET['id_hd'])){
    $id_hd = $_GET['id_hd'];

    $hopdong = new HopDong();
    $layAllInfoTheoId = $hopdong->layAllInfoTheoId($id_hd);

    echo json_encode($layAllInfoTheoId);
}