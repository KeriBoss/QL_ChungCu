<?php
session_start();
require_once  "../../model/config.php";
require_once "../../model/database.php";
require_once  "../../model/ql_duan.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$ql_duan = new QLDuAn();
try {
    $delete = $ql_duan->delete($id);
    header('location: ../index.php');
} catch (Throwable $err) {
    echo $err;
}