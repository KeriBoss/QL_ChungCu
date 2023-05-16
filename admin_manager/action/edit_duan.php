<?php
session_start();
require_once  "../../model/config.php";
require_once "../../model/database.php";
require_once  "../../model/ql_duan.php";


$target_dir =  "../public/img/du_an/";
$target_name_file = basename($_FILES["image"]["name"]);

if($target_name_file == ''){
    $target_name_file = $_POST['name_img_product'];
}
$target_file = $target_dir . $target_name_file;


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
        $image = $target_name_file;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    $image = $target_name_file;
}

if(isset($_POST['ten_duan']) && isset($_POST['mo_ta']) && isset($_POST['quy_dinh']) && isset($_POST['duan_id'])){
    $ten_duan = $_POST['ten_duan'];
    $mo_ta = $_POST['mo_ta'];
    $quy_dinh = $_POST['quy_dinh'];
    $duan_id = $_POST['duan_id'];

    try{
        $ql_duan = new QLDuAn();
        $update = $ql_duan->update($duan_id, $ten_duan, $image, $mo_ta, $quy_dinh);
        header('location: ../index.php');
    } catch(Throwable $err){
        echo $err;
    }
}