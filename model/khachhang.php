<?php
require_once "database.php";

class KhachHang extends Database{
    /**
     * insert new location
     */
    function insert($ten_khachhang,$namsinh,$gioitinh, $diachi ,$dc_lienlac,$email,$phone,$cmnd,$ngaycap,$noicap,$nghenghiep,$chucvu, $trangthai,$nguoi_thanhtoan){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $sql = parent::$connection->prepare("INSERT INTO `khachhang`( `ten_kh`, `ma_phuluc`, `namsinh`, `gioitinh`, `diachi`, `dc_lienlac`, `email`, `phone`, `cmnd`, `ngaycap`, `noicap`, `nghenghiep`, `chucvu`, `trangthai`, `nguoi_thanhtoan`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $time = date('d:m:Y:h:i');
        $str = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $time);
        $ma_phuluc = 'A' . $str;
        $sql->bind_param('sssssssssssssss', $ten_khachhang,$ma_phuluc,$namsinh,$gioitinh, $diachi ,$dc_lienlac,$email,$phone,$cmnd,$ngaycap,$noicap,$nghenghiep,$chucvu, $trangthai,$nguoi_thanhtoan);
        return $sql->execute();
    }
    /**
     * 
     */
    function layTatCaKhachHang(){
        $sql = parent::$connection->prepare("SELECT * FROM khachhang");
        return parent::select($sql);
    }
    /**
     * 
     */
    function layKhachHangTheoId($id){
        $sql = parent::$connection->prepare("SELECT * FROM khachhang WHERE id = ?");
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }
    /**
     * 
     */
    function update($id,$ten_khachhang,$namsinh,$gioitinh, $diachi ,$dc_lienlac,$email,$phone,$cmnd,$ngaycap,$noicap,$nghenghiep,$chucvu, $trangthai,$nguoi_thanhtoan){
        $sql = parent::$connection->prepare("UPDATE `khachhang` SET `ten_kh`=? ,`namsinh`=? ,`gioitinh`=? ,`diachi`=? ,`dc_lienlac`=? ,`email`=? ,`phone`=? ,`cmnd`=? ,`ngaycap`=?,`noicap`=?,`nghenghiep`=?,`chucvu`=?,`trangthai`=?,`nguoi_thanhtoan`=? WHERE id = ?");
        $sql->bind_param('ssssssssssssssi', $ten_khachhang,$namsinh,$gioitinh, $diachi ,$dc_lienlac,$email,$phone,$cmnd,$ngaycap,$noicap,$nghenghiep,$chucvu, $trangthai,$nguoi_thanhtoan, $id);
        return $sql->execute();
    }
    /**
     * 
     */
    function delete($id){
        $sql = parent::$connection->prepare("DELETE FROM `khachhang` WHERE `id` = ?");
        $sql->bind_param('i', $id);
        return $sql->execute();
    }
}