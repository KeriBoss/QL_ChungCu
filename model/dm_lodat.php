<?php
require_once __DIR__."./database.php";
class DoanhMucLoDat extends Database{
    /**
     * lấy tất cả doanh mục lo đất
     */
    function layTatCaLoDat(){
        $sql = parent::$connection->prepare("SELECT *, dm_khudat.id as khudat_id, dm_lodat.id as lodat_id, dm_lodat.mo_ta as mo_ta,  dm_lodat.image as image from dm_khudat,dm_lodat WHERE dm_lodat.id_khudat = dm_khudat.id");
        return parent::select($sql);
    }
    /**
     * insert new lo dat
     */
    function insert($ten, $hinh, $dien_tich, $mo_ta, $id_khudat){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $sql = parent::$connection->prepare("INSERT INTO `dm_lodat`(`ma_lodat`, `ten_lodat`, `image`, `dien_tich`, `mo_ta`, `id_khudat`) VALUES (?,?,?,?,?,?)");
        $time = date('d:m:Y:h:i');
        $str = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $time);
        $ma_khudat = 'lodat' . $str;
        $sql->bind_param('sssisi', $ma_khudat, $ten, $hinh, $dien_tich, $mo_ta, $id_khudat);
        return $sql->execute();
    }
    /**
     * Update lo dat by id
     */
    function update($id, $ten, $hinh, $dien_tich, $mo_ta, $id_khudat){
        $sql = parent::$connection->prepare("UPDATE `dm_lodat` SET `ten_lodat`= ? ,`image`= ? ,`dien_tich`= ? ,`mo_ta`= ? ,`id_khudat`= ?   WHERE id = ?");
        $sql->bind_param('ssisii', $ten, $hinh, $dien_tich, $mo_ta, $id_khudat, $id);
        return $sql->execute();
    }
    /**
     * Delete lo dat by Id
     */
    function delete($id){
        $sql = parent::$connection->prepare("DELETE FROM `dm_lodat` WHERE `id` = ?");
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
     * Get lodat by khudat id
     */
    function layLoDatTheoKhuDat($id){
        $sql = parent::$connection->prepare("SELECT * from dm_lodat where id_khudat = ?");
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }

}