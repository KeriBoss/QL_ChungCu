<?php
include "./header.php";
require_once "../model/ql_duan.php";
require_once "../model/bophan.php";
require_once "../model/nhamoigioi.php";
require_once "../model/khachhang.php";
require_once "../model/hopdong.php";

if(isset($_GET['id'])){
    $id_hd = $_GET['id'];
}

$duan = new QLDuAn;
$layTatCaDuan = $duan->layTatCaDuan();

$bophan = new BoPhan();
$layTatCaBoPhan = $bophan->layTatCaBoPhan();

$nhamoigioi = new NhaMoiGioi();
$layTatCaNMG = $nhamoigioi->layTatCaNMG();

//Create customer
$khachhang = new KhachHang();
$layTatCaKhachHang = $khachhang->layTatCaKhachHang();

$hopdong = new HopDong();
$layHopDongTheoID = $hopdong->layHopDongTheoID($id_hd);

?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Bản hợp đồng với khách hàng</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Bạn hãy thêm một hợp đồng bằng cách điền thông tin vào các trường yêu cầu bên dưới</h6>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs">
                                <li class="active"><a class="active" data-toggle="tab" href="#home">Thông tin 1</a></li>
                                <li><a data-toggle="tab" href="#menu1">Thông tin 2</a></li>
                                <li><a data-toggle="tab" href="#menu2">Thông tin 3</a></li>
                            </ul>
                            <form action="./action/edit_hopdong.php" method="post" id="form-hopdong" novalidate>
                                <input type="number" name="id_hopdong" value="<?=$id_hd?>" hidden>
                                <div class="tab-content">
                                <!--Card hopdong 1-->
                                    <div id="home" class="tab-pane fade in active show">
                                        <div class="form-report border-2">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-3 col-md-4 col-12">
                                                            <label>Loại hợp đồng:</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-12">
                                                            <select name="type_hopdong" class="form-control" required>
                                                                <option class="typeHD-div" value="1">Hợp đồng</option>
                                                                <option class="typeHD-div" value="2">Hợp đồng thanh lý</option>
                                                                <option class="typeHD-div" value="3">Hợp đồng phụ lục</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-3 col-md-4 col-12">
                                                        <label>Số hợp đồng:</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-12">
                                                        <input type="number" class="form-control" name="so_hd" value="<?=$layHopDongTheoID[0]['so_hopdong']?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-3 col-md-4 col-12">
                                                            <label>Tên bộ phận:</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-12">
                                                            <select name="ten_bophan" class="form-control" required>
                                                                <?php foreach($layTatCaBoPhan as $item){
                                                                    if($item['id'] == $layHopDongTheoID[0]['id_bophan']){
                                                                    ?>
                                                                    <option value="<?=$item['id']?>" selected><?=$item['kyhieu']?></option>
                                                                <?php }else{ ?>
                                                                    <option value="<?=$item['id']?>"><?=$item['kyhieu']?></option>
                                                                    <?php } } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-3 col-md-4 col-12">
                                                            <label>Nhà môi giới:</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-12">
                                                            <select name="nha_moigioi" class="form-control" required>
                                                                <?php foreach($layTatCaNMG as $item){
                                                                    if($item['id'] == $layHopDongTheoID[0]['id_nhamoigioi']){
                                                                    ?>
                                                                    <option value="<?=$item['id']?>" selected><?=$item['ten_nmg']?></option>
                                                                <?php }else{ ?>
                                                                    <option value="<?=$item['id']?>"><?=$item['ten_nmg']?></option>
                                                                <?php } } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-3 col-md-4 col-12">
                                                            <label>Tiền môi giới:</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-12">
                                                            <input type="number" class="form-control" name="tien_moigioi"  value="<?=$layHopDongTheoID[0]['tien_moigioi']?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-3 col-md-4 col-12">
                                                        <label>Ngày lập:</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-12">
                                                        <input type="date" class="form-control" name="ngay_lap" value="<?=$layHopDongTheoID[0]['ngaylap']?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-3 col-md-4 col-12">
                                                        <label>Ngày giao đất:</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-12">
                                                        <input type="date" class="form-control" name="ngay_giaodat" value="<?=$layHopDongTheoID[0]['ngay_giaodat']?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-3 col-md-4 col-12">
                                                        <label>Ngày giao sổ đỏ:</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-12">
                                                        <input type="date" class="form-control" name="ngay_giaoso" value="<?=$layHopDongTheoID[0]['ngaygiao_sodo']?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-3 col-md-4 col-12">
                                                            <label>Ghi chú:</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-12">
                                                            <input type="text" class="form-control" name="ghi_chu" value="<?=$layHopDongTheoID[0]['ghichu']?>">
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-3 col-md-4 col-12">
                                                            <label>Vay ngân hàng:</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-12">
                                                            <select name="vay_nganhang" class="form-control">
                                                                <option class="vayDiv" value="Không">Không</option>
                                                                <option class="vayDiv" value="Có">Có</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-3 col-md-4 col-12">
                                                            <label>Ký hiệu:</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-12">
                                                            <input type="text" class="form-control" name="ky_hieu"  value="<?=$layHopDongTheoID[0]['kyhieu']?>">
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-3 col-md-4 col-12">
                                                            <label>Công chứng:</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-12">
                                                            <select name="cong_chung" class="form-control">
                                                                <option class="congchungDiv" value="Có">Có</option>
                                                                <option class="congchungDiv" value="Không" selected>Không</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <div class="row mb-3 align-items-center">
                                                        <div class="col-lg-3 col-md-3 col-12">
                                                            <label>Dự án:</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-12">
                                                            <select id="change_duan" name="id_duan" class="form-control">
                                                                <?php foreach($layTatCaDuan as $item){
                                                                    if($item['id'] == $layHopDongTheoID[0]['id_duan']){
                                                                    ?>
                                                                    <option value="<?=$item['id']?>" selected><?=$item['ten_duan']?></option>
                                                                <?php }else{ ?>
                                                                    <option value="<?=$item['id']?>"><?=$item['ten_duan']?></option>
                                                                <?php }} ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-3 col-md-3 col-12">
                                                            <label>Nền đất:</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-12">
                                                            <select id="nendat_id" name="nendat_id" class="form-control">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3 align-items-center">
                                                        <div class="col-lg-3 col-md-3 col-12">
                                                            <label>Giá đất:</label>
                                                        </div>
                                                        <div class="col-lg-5 col-md-8 col-7">
                                                            <input type="number" class="form-control" name="gia_dat" value="<?=$layHopDongTheoID[0]['giadat']?>" placeholder="0.00" required>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-5">
                                                            x 1000đ/m <sup>2</sup>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-3 col-md-3 col-12">
                                                            <label>Giá hợp đồng:</label>
                                                        </div>
                                                        <div class="col-lg-5 col-md-5 col-7">
                                                            <input id="gia_hd" type="number" class="form-control" name="gia_hopdong" placeholder="0.00" value="<?=$layHopDongTheoID[0]['gia_hd']?>" required>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-5">
                                                            x 1000đ/m <sup>2</sup>(a)
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-3 col-md-3 col-12">
                                                            <label>Diện tích hợp đồng:</label>
                                                        </div>
                                                        <div class="col-lg-5 col-md-5 col-7">
                                                            <input id="dientich_hd" type="number" class="form-control" name="dientich_hd" value="<?=$layHopDongTheoID[0]['dientich_hd']?>" required>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-5">
                                                            m <sup>2</sup>(b)
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-3 col-md-3 col-12">
                                                            <label>Giá đất usd:</label>
                                                        </div>
                                                        <div class="col-lg-5 col-md-5 col-7">
                                                            <input id="giadat_usd" type="number" class="form-control" name="giadat_usd" value="<?=$layHopDongTheoID[0]['giadat_usd']?>" placeholder="0.00">
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-5">
                                                            (d)
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-3 col-md-3 col-12">
                                                            <label><b>Trị giá hợp đồng:</b></label>
                                                        </div>
                                                        <div class="col-lg-5 col-md-5 col-7">
                                                            <input id="trigia_hd" type="text" class="form-control" name="trigia_hd" value="<?=number_format($layHopDongTheoID[0]['gia_hd'] * $layHopDongTheoID[0]['dientich_hd'])?>" disabled>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-5">
                                                            <b> x 1000 VND (a*b)</b>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-3 col-md-3 col-12">
                                                            <label><b>Trị giá hợp đồng usd:</b></label>
                                                        </div>
                                                        <div class="col-lg-5 col-md-5 col-7">
                                                            <input id="trigia_hd_usd" type="text" class="form-control"  value="<?=number_format($layHopDongTheoID[0]['giadat_usd'] * $layHopDongTheoID[0]['dientich_hd'])?>" disabled>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-5">
                                                            <b> (d * b)</b>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-3 col-md-3 col-12">
                                                            <label>Giá thực tế:</label>
                                                        </div>
                                                        <div class="col-lg-5 col-md-5 col-7">
                                                            <input id="gia_thucte" name="gia_thucte" type="number" class="form-control" placeholder="0.00"  value="<?=$layHopDongTheoID[0]['gia_thucte']?>" required>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-5">
                                                            x 1000đ/m<sup>2</sup>(c)
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-3 col-md-3 col-12">
                                                            <label>Diện tích thực tế:</label>
                                                        </div>
                                                        <div class="col-lg-5 col-md-5 col-7">
                                                            <input type="number" id="dientich_thucte" name="dientich_thucte" placeholder="0.00" class="form-control" value="<?=$layHopDongTheoID[0]['dientich_thucte']?>">
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-5">
                                                            m<sup>2</sup>(d)
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-3 col-md-3 col-12">
                                                            <label><b>Trị giá thực tế:</b></label>
                                                        </div>
                                                        <div class="col-lg-5 col-md-5 col-7">
                                                            <input id="trigia_thucte" type="text" class="form-control" value="<?=number_format($layHopDongTheoID[0]['gia_thucte'] * $layHopDongTheoID[0]['dientich_thucte'])?>">
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-5">
                                                            x 1000 VND (c * d)
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-3 col-md-3 col-12">
                                                            <label>Tiền thuế (%):</label>
                                                        </div>
                                                        <div class="col-lg-5 col-md-5 col-7">
                                                            <input type="number" name="tien_thue" class="form-control" placeholder="0" value="<?=$layHopDongTheoID[0]['tienthue']?>">
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-5"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Card hopdong 2-->
                                    <div id="menu1" class="tab-pane fade">
                                        <div class="form-report border-2">
                                            <div class="row">
                                                <div class="col-lg-10 col-md-12 col-12">
                                                    <div class="form-group d-flex align-items-center">
                                                        <label for="">Chọn khách hàng: </label>
                                                        <select id="id_khachhang" name="id_khachhang" class="form-control w-50 ml-3">
                                                            <?php foreach($layTatCaKhachHang as $item){ 
                                                                if($item['id'] == $layHopDongTheoID[0]['id_khachhang']){
                                                                ?>
                                                                <option value="<?=$item['ID_kh']?>" selected><?=$item['ten_kh']?></option>
                                                                <?php }else{?>
                                                                <option value="<?=$item['ID_kh']?>"><?=$item['ten_kh']?></option>
                                                            <?php } }?>
                                                        </select>
                                                    </div>
                                                    <div class="card info-customer p-3">
                                                        <!--Content here-->
                                                    </div>
                                                    <div class="row mt-3 align-items-center">
                                                    <div class="col-lg-3 col-md-12 col-12">
                                                        Người giới thiệu: 
                                                    </div>
                                                    <div class="col-lg-9 col-md-12 col-12">
                                                        <select name="nguoi_gioithieu" class="form-control w-50 ml-3">
                                                            <option class="produce-div" value="Không có" selected>Không có</option>
                                                            <option class="produce-div" value="Được giới thiệu">Được giới thiệu</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mt-3 align-items-center">
                                                    <div class="col-lg-3 col-md-12 col-12">
                                                        Là người: 
                                                    </div>
                                                    <div class="col-lg-9 col-md-12 col-12">
                                                        <div class="form-group mt-3">
                                                            <div class="group-flex">
                                                                <div>
                                                                    <input type="radio" name="thanhtoan" id="dinh_dang1" value="Có" class="thanhtoan-div" checked>
                                                                    <label for="dinh_dang1">Thanh toán</label>
                                                                </div>
                                                                <div>
                                                                    <input type="radio" name="thanhtoan" id="dinh_dang2" value="Không" class="thanhtoan-div">
                                                                    <label for="dinh_dang2">Không</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!--Card hopdong 3-->
                                    <div id="menu2" class="tab-pane fade">
                                        <div class="form-report border-2">
                                            <div class="row mb-3">
                                                <div class="col-lg-8 col-md-12 col-12">
                                                    <div class="row mt-3 align-items-center">
                                                        <div class="col-lg-3 col-md-12 col-12">
                                                            Giai đoạn thứ:
                                                        </div>
                                                        <div class="col-lg-9 col-md-12 col-12">
                                                            <input type="text" name="id_giaidoan" value="<?=$layHopDongTheoID[0]['id_giaidoan']?>" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3 align-items-center">
                                                        <div class="col-lg-3 col-md-12 col-12">
                                                            Tên giai đoạn:
                                                        </div>
                                                        <div class="col-lg-9 col-md-12 col-12">
                                                            <textarea name="ten_giaidoan" class="form-control" placeholder="Nhập tên giai đọan..." required><?=$layHopDongTheoID[0]['ten_giaidoan']?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3 align-items-center">
                                                        <div class="col-lg-3 col-md-12 col-12">
                                                            Tiền thanh lý:
                                                        </div>
                                                        <div class="col-lg-5 col-md-7 col-7">
                                                            <input type="number" name="tien_hd" class="form-control" value="<?=$layHopDongTheoID[0]['tien_hd']?>" required>
                                                        </div>
                                                        <div class="col-lg-4 col-md-5 col-5">
                                                            x 1000đ
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3 align-items-center">
                                                        <div class="col-lg-3 col-md-12 col-12">
                                                            Ngày trả tiền:
                                                        </div>
                                                        <div class="col-lg-9 col-md-12 col-12">
                                                            <input type="date" name="ngay_tratien" class="form-control" value="<?=$layHopDongTheoID[0]['ngay_tratien']?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Lưu Chỉnh Sửa</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                <!-- Modal -->
                <div id="newModal" class="modal1" data-display="false">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <form action="action/them_khudat.php" method="post" enctype="multipart/form-data"></form>
                    </div>
                </div>
<script>
    for (var i = 0; i < document.querySelectorAll('.typeHD-div').length; i++) {
        if (document.querySelectorAll('.typeHD-div')[i].value == '<?= $layHopDongTheoID[0]['loai_hopdong']; ?>') {
            document.querySelectorAll('.typeHD-div')[i].selected = true;
            break;
        }
    }
    for (var i = 0; i < document.querySelectorAll('.vayDiv').length; i++) {
        if (document.querySelectorAll('.vayDiv')[i].value == '<?= $layHopDongTheoID[0]['vay_nganhang']; ?>') {
            document.querySelectorAll('.vayDiv')[i].selected = true;
            break;
        }
    }
    for (var i = 0; i < document.querySelectorAll('.congchungDiv').length; i++) {
        if (document.querySelectorAll('.congchungDiv')[i].value == '<?= $layHopDongTheoID[0]['congchung']; ?>') {
            document.querySelectorAll('.congchungDiv')[i].selected = true;
            break;
        }
    }
    for (var i = 0; i < document.querySelectorAll('.typeHD-div').length; i++) {
        if (document.querySelectorAll('.typeHD-div')[i].value == '<?= $layHopDongTheoID[0]['loai_hopdong']; ?>') {
            document.querySelectorAll('.typeHD-div')[i].selected = true;
            break;
        }
    }
    for (var i = 0; i < document.querySelectorAll('.thanhtoan-div').length; i++) {
        if (document.querySelectorAll('.thanhtoan-div')[i].value == '<?= $layHopDongTheoID[0]['nguoi_thanhtoan']; ?>') {
            document.querySelectorAll('.thanhtoan-div')[i].checked = true;
            break;
        }
    }
</script>
<?php
include "./footer.php";
?>  