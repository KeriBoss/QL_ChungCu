<?php
require_once "database.php";
class NhaMoiGioi extends Database{
    /**
     * Get all location
     */
    function layTatCaNMG(){
        $sql = parent::$connection->prepare("SELECT * from nhamoigioi order by id DESC");
        return parent::select($sql);
    }
    /**
     * insert new location
     */
    function insert($ten, $phone, $diachi, $email, $gioitinh, $chucvu){
        $sql = parent::$connection->prepare("INSERT INTO `nhamoigioi`(`ten_nmg`, `phone`, `diachi`, `email`, `gioitinh`, `chucvu`) VALUES (?,?,?,?,?,?)");
        $sql->bind_param('ssssss', $ten, $phone, $diachi, $email, $gioitinh, $chucvu);
        return $sql->execute();
    }
    /**
     * Update location by id
     */
    function update($id, $ten, $phone, $diachi, $email, $gioitinh, $chucvu){
        $sql = parent::$connection->prepare("UPDATE `nhamoigioi` SET `ten_nmg`= ? ,`phone`= ? ,`diachi`= ? ,`email`= ? ,`gioitinh`= ? ,`chucvu`= ?  WHERE id = ?");
        $sql->bind_param('ssssssi', $ten, $phone, $diachi, $email, $gioitinh, $chucvu, $id);
        return $sql->execute();
    }
    /**
     * Delete agency by Id
     */
    function delete($id){
        $sql = parent::$connection->prepare("DELETE FROM `nhamoigioi` WHERE `id` = ?");
        $sql->bind_param('i', $id);
        return $sql->execute();
    }
    /**
     * 
     */
    function layNMGTheoID($id){
        $sql = parent::$connection->prepare("SELECT * from nhamoigioi WHERE `id` = ?");
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }
}