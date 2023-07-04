<?php
session_start();
require_once  "../../model/config.php";
require_once "../../model/database.php";
require_once  "../../model/hopdong.php";
require_once  "../../model/hd_phuluc.php";

if(isset($_POST['vay_nganhang']) && isset($_POST['ghi_chu']) && isset($_POST['ky_hieu']) && isset($_POST['cong_chung']) && isset($_POST['tien_thue']) && isset($_POST['nguoi_gioithieu']) ){
    $vay_nganhang = $_POST['vay_nganhang'];
    $ghichu = $_POST['ghi_chu'];
    $kyhieu = $_POST['ky_hieu'];
    $congchung = $_POST['cong_chung'];
    $tienthue = $_POST['tien_thue'];
    $id_nguoigioithieu = $_POST['nguoi_gioithieu'];
}else{
    header('location: ../404.php');
}
if(isset($_POST['type_hopdong']) && isset($_POST['so_hd']) && isset($_POST['ten_bophan']) && isset($_POST['nha_moigioi']) && isset($_POST['tien_moigioi']) && isset($_POST['ngay_lap']) && isset($_POST['ngay_giaodat']) && isset($_POST['ngay_giaoso']) && isset($_POST['id_duan']) && isset($_POST['nendat_id']) && isset($_POST['gia_dat']) && isset($_POST['gia_hopdong']) && isset($_POST['dientich_hd']) && isset($_POST['giadat_usd']) && isset($_POST['gia_thucte']) && isset($_POST['dientich_thucte']) && isset($_POST['id_khachhang']) && isset($_POST['thanhtoan']) && isset($_POST['id_hopdong'])){
    $loai_hopdong = $_POST['type_hopdong'];
    $so_hopdong = $_POST['so_hd'];
    $id_bophan = $_POST['ten_bophan'];
    $id_nhamoigioi = $_POST['nha_moigioi'];
    $tien_moigioi = $_POST['tien_moigioi'];
    $ngaylap = $_POST['ngay_lap'];
    $ngay_giaodat = $_POST['ngay_giaodat'];
    $ngaygiao_sodo = $_POST['ngay_giaoso'];
    $id_duan = $_POST['id_duan'];
    $id_nendat = $_POST['nendat_id'];
    $giadat = $_POST['gia_dat'];
    $gia_hd = $_POST['gia_hopdong'];
    $dientich_hd = $_POST['dientich_hd'];
    $giadat_usd = $_POST['giadat_usd'];
    $gia_thucte = $_POST['gia_thucte'];
    $dientich_thucte = $_POST['dientich_thucte'];
    $id_khachhang = $_POST['id_khachhang'];
    $nguoi_thanhtoan = $_POST['thanhtoan'];
    $id_hopdong = $_POST['id_hopdong'];

    if(isset($_POST['transfer'])){
        $transfer = $_POST['transfer'];
    }

    try{
        $hopdong = new HopDong();

        if($transfer == true){
            $layHopDongTheoID = $hopdong->layHopDongTheoID($id_hopdong);
            $arr = $layHopDongTheoID[0];
            $phuluc = new HopDongPhuLuc();
            $insert = $phuluc->insert($arr['loai_hopdong'],$arr['so_hopdong'],$arr['id_bophan'],$arr['id_nhamoigioi'],$arr['tien_moigioi'],$arr['ngaylap'],$arr['ngay_giaodat'],$arr['ngaygiao_sodo'],$arr['ghichu'],$arr['vay_nganhang'],$arr['kyhieu'],$arr['congchung'],$arr['id_duan'],$arr['id_nendat'],$arr['giadat'],$arr['gia_hd'],$arr['dientich_hd'],$arr['giadat_usd'],$arr['gia_thucte'],$arr['dientich_thucte'],$arr['tienthue'],$arr['id_khachhang'],$arr['id_nguoigioithieu'],$arr['nguoi_thanhtoan']);
        }
        $update = $hopdong->update($id_hopdong,$loai_hopdong,$so_hopdong,$id_bophan,$id_nhamoigioi,$tien_moigioi,$ngaylap,$ngay_giaodat,$ngaygiao_sodo,$ghichu,$vay_nganhang,$kyhieu,$congchung,$id_duan,$id_nendat,$giadat,$gia_hd,$dientich_hd,$giadat_usd,$gia_thucte,$dientich_thucte,$tienthue,$id_khachhang,$id_nguoigioithieu,$nguoi_thanhtoan);

        header('location: ../danhsach_hopdong.php');
    }catch(Throwable $err){
        $_SESSION['error'] = $err;
        header('location: ../404.php');
    }
}