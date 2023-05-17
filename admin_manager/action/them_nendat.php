<?php
session_start();
require_once  "../../model/config.php";
require_once "../../model/database.php";
require_once  "../../model/dm_nendat.php";


$target_dir =  "../public/img/nen_dat/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["image"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $image = basename($_FILES["image"]["name"]);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

if(isset($_POST['ten_khudat']) && isset($_POST['ten_lodat']) && isset($_POST['ten_nen']) && isset($_POST['gia']) && isset($_POST['lo_gioi']) && isset($_POST['so_tang']) && isset($_POST['hien_trang']) && isset($_POST['id_hd']) && isset($_POST['mo_ta']) && isset($_POST['chieu_dai']) && isset($_POST['chieu_rong']) && isset($_POST['dien_tich']) && isset($_POST['dien_tich_xd'])){
    $ten_khudat = $_POST['ten_khudat'];
    $ten_lodat = $_POST['ten_lodat'];
    $ten_nen = $_POST['ten_nen'];
    $lo_gioi = $_POST['lo_gioi'];
    $so_tang = $_POST['so_tang'];
    $hien_trang = $_POST['hien_trang'];
    $gia = $_POST['gia'];
    $id_hd = $_POST['id_hd'];
    $mo_ta = $_POST['mo_ta'];
    $chieu_dai = $_POST['chieu_dai'];
    $chieu_rong = $_POST['chieu_rong'];
    $dien_tich = $_POST['dien_tich'];
    $dien_tich_xd = $_POST['dien_tich_xd'];

    try{
        $dm_nendat = new DoanhMucNenDat();
        $insert = $dm_nendat->insert($ten_khudat,$ten_lodat,$ten_nen,$lo_gioi,$chieu_dai,$chieu_rong,$dien_tich,$dien_tich_xd,$gia,$so_tang,$mo_ta,$image,$hien_trang,$id_hd);

        header('location: ../danhsach_nendat.php');
    } catch(Throwable $err){
        echo $err;
    }
}