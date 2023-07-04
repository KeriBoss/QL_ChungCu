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
        $sql = parent::$connection->prepare("SELECT *, hopdong.id as HD_id, hopdong.ghichu as HD_ghichu, hopdong.kyhieu as HD_kyhieu FROM hopdong INNER JOIN bophan ON hopdong.id_bophan = bophan.id INNER JOIN nhamoigioi ON nhamoigioi.id = hopdong.id_nhamoigioi INNER JOIN ql_duan ON ql_duan.id = hopdong.id_duan INNER JOIN dm_nendat ON dm_nendat.id = hopdong.id_nendat INNER JOIN khachhang ON khachhang.id = hopdong.id_khachhang INNER JOIN dm_khudat ON dm_khudat.id = dm_nendat.id_khudat inner join dm_lodat on dm_lodat.id = dm_nendat.id_lodat order by hopdong.id desc");
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
    function layAllInfoTheoId($id){
        $sql = parent::$connection->prepare("SELECT *, hopdong.id as HD_id, hopdong.ghichu as HD_ghichu, hopdong.kyhieu as HD_kyhieu FROM hopdong INNER JOIN bophan ON hopdong.id_bophan = bophan.id INNER JOIN nhamoigioi ON nhamoigioi.id = hopdong.id_nhamoigioi INNER JOIN ql_duan ON ql_duan.id = hopdong.id_duan INNER JOIN dm_nendat ON dm_nendat.id = hopdong.id_nendat INNER JOIN khachhang ON khachhang.id = hopdong.id_khachhang INNER JOIN dm_khudat ON dm_khudat.id = dm_nendat.id_khudat inner join dm_lodat on dm_lodat.id = dm_nendat.id_lodat WHERE hopdong.id = ?");
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }
    /**
     * 
     */
    function update($id_hopdong,$loai_hopdong,$so_hopdong,$id_bophan,$id_nhamoigioi,$tien_moigioi,$ngaylap,$ngay_giaodat,$ngaygiao_sodo,$ghichu,$vay_nganhang,$kyhieu,$congchung,$id_duan,$id_nendat,$giadat,$gia_hd,$dientich_hd,$giadat_usd,$gia_thucte,$dientich_thucte,$tienthue,$id_khachhang,$id_nguoigioithieu,$nguoi_thanhtoan){
        $sql = parent::$connection->prepare("UPDATE `hopdong` SET `loai_hopdong`= ? ,`so_hopdong`= ? ,`id_bophan`= ? ,`id_nhamoigioi`= ? ,`tien_moigioi`= ? ,`ngaylap`= ? ,`ngay_giaodat`= ? ,`ngaygiao_sodo`= ? ,`ghichu`= ? ,`vay_nganhang`= ? ,`kyhieu`= ? ,`congchung`= ? ,`id_duan`= ? ,`id_nendat`= ? ,`giadat`= ? ,`gia_hd`= ? ,`dientich_hd`= ? ,`giadat_usd`= ? ,`gia_thucte`= ? ,`dientich_thucte`= ? ,`tienthue`= ? ,`id_khachhang`= ? ,`id_nguoigioithieu`= ? ,`nguoi_thanhtoan`= ? WHERE id = ?");
        $sql->bind_param('iiiiisssssssiiiiiiiiiiisi', $loai_hopdong,$so_hopdong,$id_bophan,$id_nhamoigioi,$tien_moigioi,$ngaylap,$ngay_giaodat,$ngaygiao_sodo,$ghichu,$vay_nganhang,$kyhieu,$congchung,$id_duan,$id_nendat,$giadat,$gia_hd,$dientich_hd,$giadat_usd,$gia_thucte,$dientich_thucte,$tienthue,$id_khachhang,$id_nguoigioithieu,$nguoi_thanhtoan,$id_hopdong);
        return $sql->execute();
    }
    //
    function delete($id){
        $sql = parent::$connection->prepare("DELETE FROM hopdong WHERE id = ?");
        $sql->bind_param('i',$id);
        return $sql->execute();
    }
    /**
     * 
     */
    function layHopDongTheoDuanAndNendat($id_duan, $id_nendat){
        $sql = parent::$connection->prepare("SELECT *, dm_nendat.id as `ID_nendat` FROM hopdong inner join ql_duan on hopdong.id_duan = ql_duan.id inner join dm_nendat on hopdong.id_nendat = dm_nendat.id WHERE hopdong.id_duan = ? and hopdong.id_nendat = ?");
        $sql->bind_param('ii', $id_duan, $id_nendat);
        return parent::select($sql);
    }
    /**
     * 
     */
    function xoaGiaiChap($id_hd){
        $sql = parent::$connection->prepare("UPDATE `hopdong` SET `vay_nganhang`= 'Không' WHERE id = ?");
        $sql->bind_param('i', $id_hd);
        return $sql->execute();
    }
    /**
     * 
     */
    function layHopDongShowToggle($id,$id_duan){
        $sql = parent::$connection->prepare("SELECT *, dm_nendat.id as `ID_nendat` FROM ql_duan INNER JOIN dm_khudat ON ql_duan.id = dm_khudat.id_duan INNER JOIN dm_nendat ON dm_nendat.id_khudat = dm_khudat.id inner join hopdong on hopdong.id_nendat = dm_nendat.id WHERE hopdong.id = ? and ql_duan.id = ?");
        $sql->bind_param('ii', $id, $id_duan);
        return parent::select($sql);
    }
        /**
     * 
     */
    function layHopDongTheoKhachhang($id_kh){
        $sql = parent::$connection->prepare("SELECT *  FROM hopdong inner join ql_duan on hopdong.id_duan = ql_duan.id inner join dm_nendat on hopdong.id_nendat = dm_nendat.id WHERE id_khachhang = ?");
        $sql->bind_param('i', $id_kh);
        return parent::select($sql);
    }
}