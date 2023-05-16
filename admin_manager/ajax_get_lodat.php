<?php
session_start();
require_once "../model/config.php";
require_once "../model/database.php";
require_once "../model/dm_lodat.php";

if(isset($_GET['khudat_id'])){
    $khudat_id = $_GET['khudat_id'];
}

$dm_lodat = new DoanhMucLoDat();

$layLoDatTheoKhuDat = $dm_lodat->layLoDatTheoKhuDat($khudat_id);

echo json_encode($layLoDatTheoKhuDat);