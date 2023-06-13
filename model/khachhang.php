<?php
require_once "database.php";

class KhachHang extends Database{
    /**
     * insert new location
     */
    function insert($ten_khachhang,$so_hd,$ten_nendat,$id_duan,$namsinh,$gioitinh, $diachi ,$dc_lienlac,$email,$phone,$cmnd,$ngaycap,$noicap,$nghenghiep,$chucvu, $trangthai,$nguoi_thanhtoan){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $sql = parent::$connection->prepare("INSERT INTO `khachhang`( `ten_kh`, `so_hd`, `ma_phuluc`, `id_nendat`, `id_duan`, `namsinh`, `gioitinh`, `diachi`, `dc_lienlac`, `email`, `phone`, `cmnd`, `ngaycap`, `noicap`, `nghenghiep`, `chucvu`, `trangthai`, `nguoi_thanhtoan`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $time = date('d:m:Y:h:i');
        $str = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $time);
        $ma_phuluc = 'A' . $str;
        $sql->bind_param('sisiisssssssssssss', $ten_khachhang,$so_hd,$ma_phuluc, $ten_nendat ,$id_duan,$namsinh,$gioitinh, $diachi ,$dc_lienlac,$email,$phone,$cmnd,$ngaycap,$noicap,$nghenghiep,$chucvu, $trangthai,$nguoi_thanhtoan);
        return $sql->execute();
    }
    /**
     * 
     */
    function layTatCaKhachHang(){
        $sql = parent::$connection->prepare("SELECT *, khachhang.id as ID_kh FROM ql_duan INNER JOIN dm_khudat ON ql_duan.id = dm_khudat.id_duan INNER JOIN dm_nendat ON dm_nendat.id_khudat = dm_khudat.id INNER JOIN khachhang on khachhang.id_nendat = dm_nendat.id");
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
    function update($id,$ten_khachhang,$so_hd,$ten_nendat,$id_duan,$namsinh,$gioitinh, $diachi ,$dc_lienlac,$email,$phone,$cmnd,$ngaycap,$noicap,$nghenghiep,$chucvu, $trangthai,$nguoi_thanhtoan){
        $sql = parent::$connection->prepare("UPDATE `khachhang` SET `ten_kh`=? ,`so_hd`=? ,`id_nendat`=? ,`id_duan`=? ,`namsinh`=? ,`gioitinh`=? ,`diachi`=? ,`dc_lienlac`=? ,`email`=? ,`phone`=? ,`cmnd`=? ,`ngaycap`=?,`noicap`=?,`nghenghiep`=?,`chucvu`=?,`trangthai`=?,`nguoi_thanhtoan`=? WHERE id = ?");
        $sql->bind_param('siiisssssssssssssi', $ten_khachhang,$so_hd,$ten_nendat,$id_duan,$namsinh,$gioitinh, $diachi ,$dc_lienlac,$email,$phone,$cmnd,$ngaycap,$noicap,$nghenghiep,$chucvu, $trangthai,$nguoi_thanhtoan, $id);
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