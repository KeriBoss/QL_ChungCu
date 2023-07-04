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
    function layTatCaHDConNo(){
        $sql = parent::$connection->prepare("SELECT *,hd_thanhly.id as ID_thanhtoan, hopdong.id as ID_hd  FROM hd_thanhly inner join hopdong on hd_thanhly.id_hd = hopdong.id inner join khachhang on khachhang.id = hopdong.id_khachhang inner join ql_duan on ql_duan.id = hopdong.id_duan where hd_thanhly.status = 'Chưa thanh toán' or hd_thanhly.status = '' order by hd_thanhly.id desc");
        return parent::select($sql);
    }
    /**
     * lấy tất cả doanh mục lo đất
     */
    function layTatCaHDThanhToanTheoHD($id_hd){
        $sql = parent::$connection->prepare("SELECT *, hd_thanhly.id as ID_thanhtoan, hopdong.id as ID_hd FROM hd_thanhly inner join hopdong on hd_thanhly.id_hd = hopdong.id inner join khachhang on khachhang.id = hopdong.id_khachhang where hd_thanhly.id_hd = ? order by hd_thanhly.id desc");
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
    function insert($id_hd, $giaidoan, $ten_giaidoan, $tien_thanhly, $ngay_tratien, $status){
        $sql = parent::$connection->prepare("INSERT INTO `hd_thanhly`(`id_hd`, `giaidoan`, `ten_giaidoan`, `tien_thanhly`, `ngay_tratien`, `status`) VALUES (?,?,?,?,?,?)");
        $sql->bind_param('iisiss', $id_hd, $giaidoan, $ten_giaidoan, $tien_thanhly, $ngay_tratien, $status);
        return $sql->execute();
    }
    /**
     * Update lo dat by id
     */
    function update($id_thanhtoan, $id_hd, $giaidoan, $ten_giaidoan, $tien_thanhly, $ngay_tratien, $status){
        $sql = parent::$connection->prepare("UPDATE `hd_thanhly` SET `id_hd`= ? ,`giaidoan`= ? ,`ten_giaidoan`= ? ,`tien_thanhly`= ? ,`ngay_tratien`= ?, `status` = ? WHERE id = ?");
        $sql->bind_param('iisissi',$id_hd, $giaidoan, $ten_giaidoan, $tien_thanhly, $ngay_tratien, $status, $id_thanhtoan);
        return $sql->execute();
    }
    /**
     * Delete lo dat by Id
     */
    function delete($id){
        $sql = parent::$connection->prepare("DELETE FROM `hd_thanhly` WHERE `id` = ?");
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
    /**
     * 
     */
    function layTatCaCongNo(){
        $sql = parent::$connection->prepare("SELECT *, hopdong.id as HD_id, hopdong.ghichu as HD_ghichu, hopdong.kyhieu as HD_kyhieu FROM hopdong INNER JOIN bophan ON hopdong.id_bophan = bophan.id INNER JOIN nhamoigioi ON nhamoigioi.id = hopdong.id_nhamoigioi INNER JOIN ql_duan ON ql_duan.id = hopdong.id_duan INNER JOIN dm_nendat ON dm_nendat.id = hopdong.id_nendat INNER JOIN khachhang ON khachhang.id = hopdong.id_khachhang INNER JOIN dm_khudat ON dm_khudat.id = dm_nendat.id_khudat inner join dm_lodat on dm_lodat.id = dm_nendat.id_lodat order by hopdong.id desc");
        $tatCaHD = parent::select($sql);

        $ARR = [];
        foreach($tatCaHD as $item){
            $hdThanhToan = $this->layTatCaHDThanhToanTheoHD($item['HD_id']);
            $TOTAL_PAYMENT = 0;
            foreach ($hdThanhToan as $data) {
                $TOTAL_PAYMENT += $data['tien_thanhly'];
            }
            if ($TOTAL_PAYMENT < ($item['gia_hd'] * $item['dientich_thucte'])) {
                array_push($ARR, $item);
            }
        }

        return $ARR;
    }
    /**
     * 
     */
    function totalPayment($id_hd){
        $layTatCaHDThanhToanTheoHD = $this->layTatCaHDThanhToanTheoHD($id_hd);
        $TOTAL_PAYMENT = 0;
        foreach($layTatCaHDThanhToanTheoHD as $items){
            if($items['status'] == "Đã thanh toán"){
                $TOTAL_PAYMENT += $items['tien_thanhly'];

            }
        }
        return $TOTAL_PAYMENT;
    }
}