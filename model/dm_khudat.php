<?php
require_once __DIR__."./database.php";
class DoanhMucKhuDat extends Database{
    /**
     * lấy tất cả doanh mục khu đất
     */
    function layTatCaKhuDat(){
        $sql = parent::$connection->prepare("SELECT *, ql_duan.id as duan_id, dm_khudat.id as khudat_id, dm_khudat.mo_ta as mo_ta,  dm_khudat.image as image from dm_khudat,ql_duan WHERE dm_khudat.id_duan = ql_duan.id");
        return parent::select($sql);
    }
    /**
     * insert new khu dat
     */
    function insert($ten, $loai_nen, $hinh, $dien_tich, $mo_ta, $id_duan){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $sql = parent::$connection->prepare("INSERT INTO `dm_khudat`(`ma_khudat`, `ten_khudat`, `loai_nen`, `image`, `dien_tich`, `mo_ta`, `id_duan`) VALUES (?,?,?,?,?,?,?)");
        $time = date('d:m:Y:h:i');
        $str = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $time);
        $ma_khudat = 'khudat' . $str;
        $sql->bind_param('ssssisi', $ma_khudat, $ten, $loai_nen, $hinh, $dien_tich, $mo_ta, $id_duan);
        return $sql->execute();
    }
    /**
     * Update khu dat by id
     */
    function update($id, $ten, $loai_nen, $hinh, $dien_tich, $mo_ta, $id_duan){
        $sql = parent::$connection->prepare("UPDATE `dm_khudat` SET `ten_khudat`= ? ,`loai_nen`= ? ,`image`= ? ,`dien_tich`= ? ,`mo_ta`= ? ,`id_duan`= ?   WHERE id = ?");
        $sql->bind_param('sssisii', $ten, $loai_nen, $hinh, $dien_tich, $mo_ta, $id_duan, $id);
        return $sql->execute();
    }
    /**
     * Delete khu dat by Id
     */
    function delete($id){
        $sql = parent::$connection->prepare("DELETE FROM `dm_khudat` WHERE `id` = ?");
        $sql->bind_param('i', $id);
        return $sql->execute();
    }
    /**
     * get khu dat by id
     */
    function laykhuDatTheoId($id){
        $sql = parent::$connection->prepare("SELECT * from dm_khudat where id = ?");
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }
    /**
     * 
     */
    function layKhuDatTheoLoDat($id){
        $sql = parent::$connection->prepare("SELECT *,dm_khudat.id as khudat_id, dm_lodat.id as lodat_id from dm_khudat INNER JOIN dm_lodat ON dm_lodat.id_khudat = dm_khudat.id INNER JOIN ql_duan ON ql_duan.id = dm_khudat.id_duan WHERE dm_lodat.id = ?");
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }
}