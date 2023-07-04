<?php
session_start();
require_once  "../../model/config.php";
require_once "../../model/database.php";
require_once  "../../model/bophan.php";


if(isset($_POST['bophan_id']) && isset($_POST['ten_bophan']) && isset($_POST['kyhieu']) && isset($_POST['phong']) && isset($_POST['ban'])){
    $bophan_id = $_POST['bophan_id'];
    $ten_bophan = $_POST['ten_bophan'];
    $kyhieu = $_POST['kyhieu'];
    $phong = $_POST['phong'];
    $ban = $_POST['ban'];

    try{
        $bophan = new BoPhan();
        $update = $bophan->update($bophan_id,$ten_bophan, $kyhieu, $phong,$ban);
        header('location: ../danhsach_bophan.php');
    } catch(Throwable $err){
        $_SESSION['error'] = $err;
        header('location: ../404.php');
    }
}