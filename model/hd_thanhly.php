<?php
require_once "database.php";
class HopDongThanhLy extends Database{
    /**
     * lấy tất cả doanh mục lo đất
     */
    function layTatCaHDThanhToan(){
        $sql = parent::$connection->prepare("SELECT * FROM hd_thanhly inner join hopdong on hd_thanhly.id_hd = hopdong.id inner join khachhang on khachhang.id = hopdong.id_khachhang order by hd_thanhly.id desc");
        return parent::select($sql);
    }
    /**
     * lấy tất cả doanh mục lo đất
     */
    function layTatCaHDThanhToanTheoHD($id_hd){
        $sql = parent::$connection->prepare("SELECT * FROM hd_thanhly inner join hopdong on hd_thanhly.id_hd = hopdong.id inner join khachhang on khachhang.id = hopdong.id_khachhang where hd_thanhly.id_hd = ? order by hd_thanhly.id desc");
        $sql->bind_param('i', $id_hd);
        return parent::select($sql);
    }
    /**
     * lấy tất cả doanh mục lo đất
     */
    function layTatCaThanhToanTheoId($id_hd, $id_thanhtoan){
        $sql = parent::$connection->prepare("SELECT * FROM hd_thanhly inner join hopdong on hd_thanhly.id_hd = hopdong.id inner join khachhang on khachhang.id = hopdong.id_khachhang where hd_thanhly.id_hd = ? AND hd_thanhly.id = ? order by hd_thanhly.id desc");
        $sql->bind_param('ii', $id_hd, $id_thanhtoan);
        return parent::select($sql);
    }
    /**
     * insert new lo dat
     */
    function insert($id_hd, $giaidoan, $ten_giaidoan, $tien_thanhly, $ngay_tratien){
        $sql = parent::$connection->prepare("INSERT INTO `hd_thanhly`(`id_hd`, `giaidoan`, `ten_giaidoan`, `tien_thanhly`, `ngay_tratien`) VALUES (?,?,?,?,?)");
        $sql->bind_param('iisis', $id_hd, $giaidoan, $ten_giaidoan, $tien_thanhly, $ngay_tratien);
        return $sql->execute();
    }
    /**
     * Update lo dat by id
     */
    function update($id, $id_hd, $giaidoan, $ten_giaidoan, $tien_thanhly, $ngay_tratien){
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