<?php
session_start();
require_once  "../../model/config.php";
require_once "../../model/database.php";
require_once  "../../model/dm_lodat.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$dm_lodat = new DoanhMucLoDat();
try {
    $delete = $dm_lodat->delete($id);
    header('location: ../danhsach_lodat.php');
} catch (Throwable $err) {
    echo $err;
}