<?php
require_once "database.php";

class HopDong extends Database{
    /**
     * insert new location
     */
    function insert($loai_hopdong,$so_hopdong,$id_bophan,$id_nhamoigioi,$tien_moigioi,$ngaylap,$ngay_giaodat,$ngaygiao_sodo,$ghichu,$vay_nganhang,$kyhieu,$congchung,$id_duan,$id_nendat,$giadat,$gia_hd,$dientich_hd,$giadat_usd,$gia_thucte,$dientich_thucte,$tienthue,$id_khachhang,$id_nguoigioithieu,$nguoi_thanhtoan){
        $sql = parent::$connection->prepare("INSERT INTO `hopdong`( `loai_hopdong`, `so_hopdong`, `id_bophan`, `id_nhamoigioi`, `tien_moigioi`, `ngaylap`, `ngay_giaodat`, `ngaygiao_sodo`, `ghichu`, `vay_nganhang`, `kyhieu`, `congchung`, `id_duan`, `id_nendat`, `giadat`, `gia_hd`, `dientich_hd`, `giadat_usd`, `gia_thucte`, `dientich_thucte`, `tienthue`, `id_khachhang`, `id_nguoigioithieu`, `nguoi_thanhtoan`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $sql->bind_param('iiiiisssssssiiiiiiiiiiis', $loai_hopdong,$so_hopdong,$id_bophan,$id_nhamoigioi,$tien_moigioi,$ngaylap,$ngay_giaodat,$ngaygiao_sodo,$ghichu,$vay_nganhang,$kyhieu,$congchung,$id_duan,$id_nendat,$giadat,$gia_hd,$dientich_hd,$giadat_usd,$gia_thucte,$dientich_thucte,$tienthue,$id_khachhang,$id_nguoigioithieu,$nguoi_thanhtoan);
        return $sql->execute();
    }
    /**
     * 
     */
    function layTatCaHopDong(){
        $sql = parent::$connection->prepare("SELECT *, hopdong.id as HD_id, hopdong.ghichu as HD_ghichu, hopdong.kyhieu as HD_kyhieu FROM hopdong INNER JOIN bophan ON hopdong.id_bophan = bophan.id INNER JOIN nhamoigioi ON nhamoigioi.id = hopdong.id_nhamoigioi INNER JOIN ql_duan ON ql_duan.id = hopdong.id_duan INNER JOIN dm_nendat ON dm_nendat.id = hopdong.id_nendat INNER JOIN khachhang ON khachhang.id = hopdong.id_khachhang INNER JOIN dm_khudat ON dm_khudat.id = dm_nendat.id_khudat INNER JOIN dm_lodat ON dm_lodat.id = dm_nendat.id_lodat");
        return parent::select($sql);
    }
    /**
     * 
     */
    function layHopDongTheoID($id){
        $sql = parent::$connection->prepare("SELECT * FROM hopdong WHERE id = ?");
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }
    /**
     * 
     */
    function update($id_hopdong,$loai_hopdong,$so_hopdong,$id_bophan,$id_nhamoigioi,$tien_moigioi,$ngaylap,$ngay_giaodat,$ngaygiao_sodo,$ghichu,$vay_nganhang,$kyhieu,$congchung,$id_duan,$id_nendat,$giadat,$gia_hd,$dientich_hd,$giadat_usd,$gia_thucte,$dientich_thucte,$tienthue,$id_khachhang,$id_nguoigioithieu,$nguoi_thanhtoan,$id_giaidoan,$ten_giaidoan,$tien_hd,$ngay_tratien){
        $sql = parent::$connection->prepare("UPDATE `hopdong` SET `loai_hopdong`= ? ,`so_hopdong`= ? ,`id_bophan`= ? ,`id_nhamoigioi`= ? ,`tien_moigioi`= ? ,`ngaylap`= ? ,`ngay_giaodat`= ? ,`ngaygiao_sodo`= ? ,`ghichu`= ? ,`vay_nganhang`= ? ,`kyhieu`= ? ,`congchung`= ? ,`id_duan`= ? ,`id_nendat`= ? ,`giadat`= ? ,`gia_hd`= ? ,`dientich_hd`= ? ,`giadat_usd`= ? ,`gia_thucte`= ? ,`dientich_thucte`= ? ,`tienthue`= ? ,`id_khachhang`= ? ,`id_nguoigioithieu`= ? ,`nguoi_thanhtoan`= ? ,`id_giaidoan`= ? ,`ten_giaidoan`= ? ,`tien_hd`= ? ,`ngay_tratien`= ?  WHERE id = ?");
        $sql->bind_param('iiiiisssssssiiiiiiiiiiisisisi', $loai_hopdong,$so_hopdong,$id_bophan,$id_nhamoigioi,$tien_moigioi,$ngaylap,$ngay_giaodat,$ngaygiao_sodo,$ghichu,$vay_nganhang,$kyhieu,$congchung,$id_duan,$id_nendat,$giadat,$gia_hd,$dientich_hd,$giadat_usd,$gia_thucte,$dientich_thucte,$tienthue,$id_khachhang,$id_nguoigioithieu,$nguoi_thanhtoan,$id_giaidoan,$ten_giaidoan,$tien_hd,$ngay_tratien,$id_hopdong);
        return $sql->execute();
    }
    //
    function delete($id){
        $sql = parent::$connection->prepare("DELETE FROM hopdong WHERE id = ?");
        $sql->bind_param('i',$id);
        return $sql->execute();
    }
}