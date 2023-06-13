<?php
require_once "database.php";
class BoPhan extends Database{
    /**
     * Get all location
     */
    function layTatCaBoPhan(){
        $sql = parent::$connection->prepare("SELECT * from bophan order by id DESC");
        return parent::select($sql);
    }
    /**
     * insert new location
     */
    function insert($ten, $kyhieu, $phong, $ban){
        $sql = parent::$connection->prepare("INSERT INTO `bophan`(`ten_bophan`, `kyhieu`, `phong`, `ban`) VALUES (?,?,?,?)");
        $sql->bind_param('ssss', $ten, $kyhieu, $phong, $ban);
        return $sql->execute();
    }
    /**
     * Update location by id
     */
    function update($id, $ten, $kyhieu, $phong, $ban){
        $sql = parent::$connection->prepare("UPDATE `bophan` SET `ten_bophan`= ? ,`kyhieu`= ? ,`phong`= ? ,`ban`= ?  WHERE id = ?");
        $sql->bind_param('ssssi', $ten, $kyhieu, $phong, $ban, $id);
        return $sql->execute();
    }
    /**
     * Delete agency by Id
     */
    function delete($id){
        $sql = parent::$connection->prepare("DELETE FROM `bophan` WHERE `id` = ?");
        $sql->bind_param('i', $id);
        return $sql->execute();
    }
    /**
     * 
     */
    function layBoPhanTheoID($id){
        $sql = parent::$connection->prepare("SELECT * from bophan WHERE `id` = ?");
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }
}