<?php
require_once "database.php";

class HopDongPhuLuc extends Database{
    /**
     * insert new location
     */
    function insert($loai_hopdong,$so_hopdong,$id_bophan,$id_nhamoigioi,$tien_moigioi,$ngaylap,$ngay_giaodat,$ngaygiao_sodo,$ghichu,$vay_nganhang,$kyhieu,$congchung,$id_duan,$id_nendat,$giadat,$gia_hd,$dientich_hd,$giadat_usd,$gia_thucte,$dientich_thucte,$tienthue,$id_khachhang,$id_nguoigioithieu,$nguoi_thanhtoan){
        $sql = parent::$connection->prepare("INSERT INTO `hd_phuluc`( `loai_hd`, `so_hopdong`, `id_bophan`, `id_nhamoigioi`, `tien_moigioi`, `ngaylap`, `ngay_giaodat`, `ngaygiao_sodo`, `ghichu`, `vay_nganhang`, `kyhieu`, `congchung`, `id_duan`, `id_nendat`, `giadat`, `gia_hd`, `dientich_hd`, `giadat_usd`, `gia_thucte`, `dientich_thucte`, `tienthue`, `id_khachhang`, `id_nguoigioithieu`, `nguoi_thanhtoan`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $sql->bind_param('iiiiisssssssiiiiiiiiiiis', $loai_hopdong,$so_hopdong,$id_bophan,$id_nhamoigioi,$tien_moigioi,$ngaylap,$ngay_giaodat,$ngaygiao_sodo,$ghichu,$vay_nganhang,$kyhieu,$congchung,$id_duan,$id_nendat,$giadat,$gia_hd,$dientich_hd,$giadat_usd,$gia_thucte,$dientich_thucte,$tienthue,$id_khachhang,$id_nguoigioithieu,$nguoi_thanhtoan);
        return $sql->execute();
    }
    /**
     * 
     */
    function layTatCaHopDongPL(){
        $sql = parent::$connection->prepare("SELECT *, hd_phuluc.id as HD_id, hd_phuluc.ghichu as HD_ghichu, hd_phuluc.kyhieu as HD_kyhieu FROM hd_phuluc INNER JOIN bophan ON hd_phuluc.id_bophan = bophan.id INNER JOIN nhamoigioi ON nhamoigioi.id = hd_phuluc.id_nhamoigioi INNER JOIN ql_duan ON ql_duan.id = hd_phuluc.id_duan INNER JOIN dm_nendat ON dm_nendat.id = hd_phuluc.id_nendat INNER JOIN khachhang ON khachhang.id = hd_phuluc.id_khachhang INNER JOIN dm_khudat ON dm_khudat.id = dm_nendat.id_khudat inner join dm_lodat on dm_lodat.id = dm_nendat.id_lodat order by hd_phuluc.id desc");
        return parent::select($sql);
    }
    //
    function delete($id){
        $sql = parent::$connection->prepare("DELETE FROM hd_phuluc WHERE id = ?");
        $sql->bind_param('i',$id);
        return $sql->execute();
    }
    
}