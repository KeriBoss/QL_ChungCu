<?php
session_start();
require_once  "../../model/config.php";
require_once "../../model/database.php";
require_once  "../../model/dm_nendat.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$dm_nendat = new DoanhMucNenDat();
try {
    $delete = $dm_nendat->delete($id);
    header('location: ../danhsach_nendat.php');
} catch (Throwable $err) {
    $_SESSION['error'] = $err;
    header('location: ../404.php');
}