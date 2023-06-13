<?php
require_once "database.php";
class DoanhMucNenDat extends Database{
    /**
     * lấy tất cả doanh mục lo đất
     */
    function layTatCaNenDat(){
        $sql = parent::$connection->prepare("SELECT *,dm_nendat.image as image,dm_nendat.mo_ta as mo_ta,dm_nendat.dien_tich as dien_tich, ql_duan.id as duan_id, dm_nendat.id as nendat_id, dm_khudat.id as khudat_id, dm_lodat.id as lodat_id FROM dm_nendat INNER JOIN dm_khudat ON dm_nendat.id_khudat = dm_khudat.id INNER JOIN dm_lodat ON dm_nendat.id_lodat = dm_lodat.id INNER JOIN ql_duan ON dm_khudat.id_duan = ql_duan.id");
        return parent::select($sql);
    }
    /**
     * insert new lo dat
     */
    function insert($id_khudat, $id_lodat, $ten_nendat, $lo_gioi, $chieu_dai,$chieu_rong,$dien_tich,$dien_tich_xd,$gia,$so_tang,$mo_ta,$image,$hien_trang,$id_hd){
        $sql = parent::$connection->prepare("INSERT INTO `dm_nendat`(`id_khudat`, `id_lodat`, `ten_nendat`, `lo_gioi`, `chieu_dai`, `chieu_rong`, `dien_tich`, `dien_tich_xd`, `gia`, `so_tang`, `mo_ta`, `image`, `hien_trang`, `id_hd`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $sql->bind_param('iisiiiiiiisssi', $id_khudat, $id_lodat, $ten_nendat, $lo_gioi, $chieu_dai,$chieu_rong,$dien_tich,$dien_tich_xd,$gia,$so_tang,$mo_ta,$image,$hien_trang,$id_hd);
        return $sql->execute();
    }
    /**
     * Update lo dat by id
     */
    function update($id, $ten, $hinh, $dien_tich, $mo_ta, $id_khudat){
        $sql = parent::$connection->prepare("UPDATE `dm_nendat` SET `ten_lodat`= ? ,`image`= ? ,`dien_tich`= ? ,`mo_ta`= ? ,`id_khudat`= ?   WHERE id = ?");
        $sql->bind_param('ssisii', $ten, $hinh, $dien_tich, $mo_ta, $id_khudat, $id);
        return $sql->execute();
    }
    /**
     * Delete lo dat by Id
     */
    function delete($id){
        $sql = parent::$connection->prepare("DELETE FROM `dm_nendat` WHERE `id` = ?");
        $sql->bind_param('i', $id);
        return $sql->execute();
    }
    /**
     * get lo dat by id
     */
    function layLoDatTheoId($id){
        $sql = parent::$connection->prepare("SELECT * from dm_lodat where id = ?");
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }
    /**
     * Lay nen dat theo id
     */
    function layNenDatTheoId($id){
        $sql = parent::$connection->prepare("SELECT * from dm_nendat where id = ?");
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }
}