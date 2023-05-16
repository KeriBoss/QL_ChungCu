<?php
session_start();
require_once  "../../model/config.php";
require_once "../../model/database.php";
require_once  "../../model/dm_khudat.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$dm_khudat = new DoanhMucKhuDat();
try {
    $delete = $dm_khudat->delete($id);
    header('location: ../danhsach_khudat.php');
} catch (Throwable $err) {
    echo $err;
}