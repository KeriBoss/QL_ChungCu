<?php
session_start();
require_once "../model/config.php";
require_once "../model/database.php";
require_once "../model/ql_duan.php";
require_once "../model/dm_nendat.php";

if(isset($_GET['id_duan'])){
    $id_duan = $_GET['id_duan'];

    $ql_duan = new QLDuAn();
    
    $layNenDatTheoDuan = $ql_duan->layNenDatTheoDuan($id_duan);
    
    echo json_encode($layNenDatTheoDuan);
}
