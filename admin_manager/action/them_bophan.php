<?php
session_start();
require_once  "../../model/config.php";
require_once "../../model/database.php";
require_once  "../../model/bophan.php";


$bophan = new BoPhan();

if(isset($_POST['ten_bophan']) && isset($_POST['kyhieu']) && isset($_POST['phong']) && isset($_POST['ban'])){
    $ten_bophan = $_POST['ten_bophan'];
    $kyhieu = $_POST['kyhieu'];
    $phong = $_POST['phong'];
    $ban = $_POST['ban'];

    try{
        $insert = $bophan->insert($ten_bophan, $kyhieu, $phong, $ban);
        header('location: ../danhsach_bophan.php');
    } catch(Throwable $err){
        $_SESSION['error'] = $err;
        header('location: ../404.php');
    }
}