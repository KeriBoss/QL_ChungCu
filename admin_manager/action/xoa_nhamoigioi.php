<?php
session_start();
require_once  "../../model/config.php";
require_once "../../model/database.php";
require_once  "../../model/nhamoigioi.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$nhamoigioi = new NhaMoiGioi();
try {
    $delete = $nhamoigioi->delete($id);
    header('location: ../danhsach_nhamoigioi.php');
} catch (Throwable $err) {
    $_SESSION['error'] = $err;
    header('location: ../404.php');
}