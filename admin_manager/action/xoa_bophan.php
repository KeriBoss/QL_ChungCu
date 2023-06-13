<?php
session_start();
require_once  "../../model/config.php";
require_once "../../model/database.php";
require_once  "../../model/bophan.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$bophan = new BoPhan();
try {
    $delete = $bophan->delete($id);
    header('location: ../danhsach_bophan.php');
} catch (Throwable $err) {
    $_SESSION['error'] = $err;
    header('location: ../404.php');
}