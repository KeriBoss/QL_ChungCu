<?php
require_once "database.php";
class QLDuAn extends Database{
    /**
     * Get all location
     */
    function layTatCaDuan(){
        $sql = parent::$connection->prepare("SELECT * from ql_duan order by id DESC");
        return parent::select($sql);
    }
    /**
     * insert new location
     */
    function insert($ten, $hinh, $mo_ta, $quy_dinh){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $sql = parent::$connection->prepare("INSERT INTO `ql_duan`(`ma_duan`, `ten_duan`, `image`, `mo_ta`, `quy_dinh`) VALUES (?,?,?,?,?)");
        $time = date('d:m:Y:h:i');
        $str = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $time);
        $ma_duan = 'keri' . $str;
        $sql->bind_param('sssss', $ma_duan ,$ten, $hinh, $mo_ta, $quy_dinh);
        return $sql->execute();
    }
    /**
     * Update location by id
     */
    function update($id, $ten, $hinh, $mo_ta, $quy_dinh){
        $sql = parent::$connection->prepare("UPDATE `ql_duan` SET `ten_duan`= ? ,`image`= ? ,`mo_ta`= ? ,`quy_dinh`= ?  WHERE id = ?");
        $sql->bind_param('ssssi', $ten, $hinh, $mo_ta, $quy_dinh, $id);
        return $sql->execute();
    }
    /**
     * Delete agency by Id
     */
    function delete($id){
        $sql = parent::$connection->prepare("DELETE FROM `ql_duan` WHERE `id` = ?");
        $sql->bind_param('i', $id);
        return $sql->execute();
    }
    /**
     * get location by id
     */
    function layDuanTheoId($id){
        $sql = parent::$connection->prepare("Select * from ql_duan where id = ?");
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }
    /**
     * 
     */
    function layNenDatTheoDuan($id_duan){
        $sql = parent::$connection->prepare("SELECT *, dm_nendat.id as `ID_nendat` FROM ql_duan INNER JOIN dm_khudat ON ql_duan.id = dm_khudat.id_duan INNER JOIN dm_nendat ON dm_nendat.id_khudat = dm_khudat.id WHERE ql_duan.id = ?");
        $sql->bind_param('i', $id_duan);
        return parent::select($sql);
    }
}