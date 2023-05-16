<?php
session_start();
require_once "../model/config.php";
require_once "../model/database.php";
require_once "../model/dm_khudat.php";

if(isset($_GET['lodat_id'])){
    $lodat_id = $_GET['lodat_id'];
}

$dm_khudat = new DoanhMucKhuDat();

$layKhuDatTheoLoDat = $dm_khudat->layKhuDatTheoLoDat($lodat_id);

echo json_encode($layKhuDatTheoLoDat);