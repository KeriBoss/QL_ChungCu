<?php
include "./header.php";
require_once "../model/ql_duan.php";
require_once "../model/bophan.php";
require_once "../model/nhamoigioi.php";
require_once "../model/khachhang.php";

$duan = new QLDuAn;
$layTatCaDuan = $duan->layTatCaDuan();

$bophan = new BoPhan();
$layTatCaBoPhan = $bophan->layTatCaBoPhan();

$nhamoigioi = new NhaMoiGioi();
$layTatCaNMG = $nhamoigioi->layTatCaNMG();

//Create customer
$khachhang = new KhachHang();
$layTatCaKhachHang = $khachhang->layTatCaKhachHang();

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
                                <li class="active"><a class="active" data-toggle="tab" href="#home">Thông tin hợp đồng</a></li>
                                <li><a data-toggle="tab" href="#menu1">Thông tin khách hàng</a></li>
                                <!-- <li><a data-toggle="tab" href="#menu2">Thông tin 3</a></li> -->
                            </ul>
                            <form action="./action/them_hopdong_main.php" id="form-hopdong" method="post" novalidate>
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
                                                                <option value="1">Hợp đồng chính thức</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-3 col-md-4 col-12">
                                                        <label>Số hợp đồng:</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-12">
                                                        <input type="number" class="form-control" name="so_hd" placeholder="0..." required>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-3 col-md-4 col-12">
                                                            <label>Tên bộ phận:</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-12">
                                                            <select name="ten_bophan" class="form-control" required>
                                                                <?php foreach($layTatCaBoPhan as $item){ ?>
                                                                    <option value="<?=$item['id']?>"><?=$item['kyhieu']?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-3 col-md-4 col-12">
                                                            <label>Nhà môi giới:</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-12">
                                                            <select name="nha_moigioi" class="form-control" required>
                                                                <?php foreach($layTatCaNMG as $item){ ?>
                                                                    <option value="<?=$item['id']?>"><?=$item['ten_nmg']?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-3 col-md-4 col-12">
                                                            <label>Tiền môi giới:</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-12">
                                                            <input type="number" data-type="price" class="form-control" name="tien_moigioi" placeholder="0.00" required>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-3 col-md-4 col-12">
                                                        <label>Ngày lập:</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-12">
                                                        <input type="date" class="form-control" name="ngay_lap" required>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-3 col-md-4 col-12">
                                                        <label>Ngày giao đất:</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-12">
                                                        <input type="date" class="form-control" name="ngay_giaodat" required>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-3 col-md-4 col-12">
                                                        <label>Ngày giao sổ đỏ:</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-12">
                                                        <input type="date" class="form-control" name="ngay_giaoso" required>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-3 col-md-4 col-12">
                                                            <label>Ghi chú:</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-12">
                                                            <input type="text" class="form-control" name="ghi_chu">
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-3 col-md-4 col-12">
                                                            <label>Vay ngân hàng:</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-12">
                                                            <select name="vay_nganhang" class="form-control">
                                                                <option value="Không">Không</option>
                                                                <option value="Có">Có</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-3 col-md-4 col-12">
                                                            <label>Ký hiệu:</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-12">
                                                            <input type="text" class="form-control" name="ky_hieu" placeholder="Nếu có">
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-lg-3 col-md-4 col-12">
                                                            <label>Công chứng:</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-12">
                                                            <select name="cong_chung" class="form-control">
                                                                <option value="Có">Có</option>
                                                                <option value="Không" selected>Không</option>
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
                                                                <?php foreach($layTatCaDuan as $item){ ?>
                                                                    <option value="<?=$item['id']?>"><?=$item['ten_duan']?></option>
                                                                <?php } ?>
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
                                                            <input type="number" data-type="price" class="form-control" name="gia_dat" placeholder="0.00" required>
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
                                                            <input id="gia_hd" type="number" data-type="price" class="form-control" name="gia_hopdong" placeholder="0.00" required>
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
                                                            <input id="dientich_hd" type="number" class="form-control" name="dientich_hd" required>
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
                                                            <input id="giadat_usd" type="number" class="form-control" name="giadat_usd" placeholder="0.00">
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
                                                            <input id="trigia_hd" type="text" data-type="price" class="form-control" name="trigia_hd" disabled>
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
                                                            <input id="trigia_hd_usd" type="number" class="form-control" disabled>
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
                                                            <input id="gia_thucte" name="gia_thucte" type="number" data-type="price" class="form-control" placeholder="0.00" required>
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
                                                            <input type="number" id="dientich_thucte" name="dientich_thucte" placeholder="0.00" class="form-control">
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
                                                            <input id="trigia_thucte" type="number" class="form-control">
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
                                                            <input type="number" name="tien_thue" class="form-control" placeholder="0">
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-5"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button id="next-info" type="button" class="float-right btn btn-primary">Tiếp <i class='bx bx-right-arrow-alt'></i></button>
                                    </div>
                                    <!--Card hopdong 2-->
                                    <div id="menu1" class="tab-pane fade">
                                        <div class="form-report border-2">
                                            <div class="row">
                                                <div class="col-lg-10 col-md-12 col-12">
                                                    <div class="form-group d-flex align-items-center">
                                                        <label for="">Chọn khách hàng: </label>
                                                        <select id="id_khachhang" name="id_khachhang" class="form-control w-50 ml-3">
                                                            <?php foreach($layTatCaKhachHang as $item){ ?>
                                                                <option value="<?=$item['id']?>"><?=$item['ten_kh']?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="card info-customer p-3">
                                                        <!-- <h5>Thông tin khách hàng:</h5>
                                                        <p>Tên: Nguyễn Văn A</p>
                                                        <p>Địa chỉ: 123 Cm tháng 8, quận 10, tp Hồ Chí Minh</p>
                                                        <p>Số điện thoại: 03123585</p>
                                                        <p>Email: test@gmail.com</p> -->
                                                    </div>
                                                    <div class="row mt-3 align-items-center">
                                                    <div class="col-lg-3 col-md-12 col-12">
                                                        Người giới thiệu: 
                                                    </div>
                                                    <div class="col-lg-9 col-md-12 col-12">
                                                        <select name="nguoi_gioithieu" class="form-control w-50 ml-3">
                                                            <option value="Không có" selected>Không có</option>
                                                            <option value="Được giới thiệu">Được giới thiệu</option>
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
                                                                    <input type="radio" name="thanhtoan" id="dinh_dang1" value="Có" checked>
                                                                    <label for="dinh_dang1">Thanh toán</label>
                                                                </div>
                                                                <div>
                                                                    <input type="radio" name="thanhtoan" id="dinh_dang2" value="Không">
                                                                    <label for="dinh_dang2">Không</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Thêm hợp đồng</button>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                <!-- Modal -->
                <!-- <div id="newModal" class="modal1" data-display="false">
                    <div class="modal-content">
                        <form action="action/them_khudat.php" method="post" enctype="multipart/form-data"></form>
                    </div>
                </div> -->
<?php
include "./footer.php";
?>  