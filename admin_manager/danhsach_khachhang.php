<?php
include "./header.php";
require_once "../model/ql_duan.php";
require_once "../model/dm_nendat.php";
require_once "../model/khachhang.php";
require_once "../model/hopdong.php";

$ql_duan = new QLDuAn();
$layTatCaDuan = $ql_duan->layTatCaDuan();

$nendat = new DoanhMucNenDat();
$layTatCaNenDat = $nendat->layTatCaNenDat();

$khachhang = new KhachHang();
$layTatCaKhachHang = $khachhang->layTatCaKhachHang();

$hopdong = new HopDong();
$layTatCaHopDong = $hopdong->layTatCaHopDong();

?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Danh Sách Các Khách Hàng</h1>
                        <a id="myBtn" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Thêm khách hàng mới</a>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách khách hàng</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered custom-table" id="dataTable1" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="5%">STT</th>
                                            <th>Tên KH</th>
                                            <th>Số HĐ</th>
                                            <th>Mã phụ lục</th>
                                            <th>Nền</th>
                                            <th>Tên dự án</th>
                                            <th>Năm sinh</th>
                                            <th>Giới tính</th>
                                            <th>Địa chỉ thường trú</th>
                                            <th>ĐC liên lạc</th>
                                            <th>Email</th>
                                            <th>Điện thoại</th>
                                            <th>Số CMND</th>
                                            <th>Ngày cấp</th>
                                            <th>Nơi cấp</th>
                                            <th>Nghề nghiệp</th>
                                            <th>Chức vụ</th>
                                            <th>Trạng thái</th>
                                            <th>Người thanh toán</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $count = 1;
                                        foreach($layTatCaKhachHang as $item){
                                            $layHopDongTheoKhachhang = $hopdong->layHopDongTheoKhachhang($item['id']);
                                            ?>
                                        <tr>
                                            <td><?=$count++?></td>
                                            <td><?=$item['ten_kh']?></td>
                                            <td>
                                                <?php 
                                                if(count($layHopDongTheoKhachhang) > 0){
                                                    echo $layHopDongTheoKhachhang[0]['so_hopdong'];
                                                }else{
                                                    echo "Trống";
                                                }
                                                ?>
                                            </td>
                                            <td><?=$item['ma_phuluc']?></td>
                                            <td>
                                                <?php
                                                    if(count($layHopDongTheoKhachhang) > 0){
                                                        echo $layHopDongTheoKhachhang[0]['ten_nendat'];
                                                    }else{
                                                        echo "Trống";
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if(count($layHopDongTheoKhachhang) > 0){
                                                        echo $layHopDongTheoKhachhang[0]['ten_duan'];
                                                    }else{
                                                        echo "Trống";
                                                    }
                                                ?>
                                            </td>
                                            <td><?=$item['namsinh']?></td>
                                            <td><?=$item['gioitinh']?></td>
                                            <td><?=$item['diachi']?></td>
                                            <td><?=$item['dc_lienlac']?></td>
                                            <td><?=$item['email']?></td>
                                            <td><?=$item['phone']?></td>
                                            <td><?=$item['cmnd']?></td>
                                            <td><?=$item['ngaycap']?></td>
                                            <td><?=$item['noicap']?></td>
                                            <td><?=$item['nghenghiep']?></td>
                                            <td><?=$item['chucvu']?></td>
                                            <td><?=$item['trangthai']?></td>
                                            <td><?=$item['nguoi_thanhtoan']?></td>
                                            <td>
                                                <a href="edit_khachhang?id=<?=$item['id']?>" class="icon edit"><i class='bx bx-edit'></i></a>
                                                <a href="action/xoa_khachhang.php?id=<?=$item['id']?>" onclick="if(CheckForm() == false) return false"  class="icon delete"><i class='bx bxs-message-square-x' ></i></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                <!-- Modal -->
                <div id="newModal" class="modal1" data-display="false">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <form action="action/them_khachhang.php" method="post" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Thêm khách hàng mới</h5>
                                <button type="button" data-modal="close" class="close" >
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <label for="ten_khachhang"><b>Tên khách hàng:</b></label>
                                            <input type="text" class="form-control" name="ten_khachhang" placeholder="Nhập tên cty, khách hàng..." required>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <label for="">Năm sinh:</label>
                                            <input type="date" name="namsinh" class="form-control" placeholder="dd/mm/yyyy" required>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-12">
                                                <label for="">Giới tính:</label>
                                                <select name="gioitinh" id="" class="form-control">
                                                    <option value="Nam">Nam</option>
                                                    <option value="Nữ">Nữ</option>
                                                    <option value="Khác">Khác</option>
                                                </select>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <label for="">Email</label>
                                            <input type="email" name="email" class="form-control" placeholder="Email...">
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <label for="">Điện thoại</label>
                                            <input type="text" name="phone" pattern="[0-9]{10,11}" class="form-control" placeholder="Phone ..." required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">  
                                            <label for="">Địa chỉ thường trú:</label>
                                            <textarea name="diachi" class="form-control" placeholder="Nhập địa chỉ thường trú..."></textarea>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="">Địa chỉ liên lạc:</label>
                                            <textarea name="dc_lienlac" class="form-control" placeholder="Nhập địa chỉ liên lạc..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <label for="">Số CMND:</label>
                                            <input type="text" name="cmnd" class="form-control" pattern="[0-9]{9,11}" placeholder="Nhập CMND..." required>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <label for="">Ngày cấp:</label>
                                            <input type="date" name="ngaycap" class="form-control" required>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <label for="">Nơi cấp:</label>
                                            <input type="text" name="noicap" class="form-control" required>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <label for="">Nghề nghiệp: </label>
                                            <input type="text" name="nghenghiep" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <label for="">Chức vụ:</label>
                                            <input type="text" name="chucvu" class="form-control" placeholder="Nếu có...">
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <label for="">Trạng thái:</label>
                                            <input type="text" name="trangthai" class="form-control">
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <label for="">Người thanh toán:</label>
                                            <select name="nguoi_thanhtoan" class="form-control">
                                                <option value="Có">Có</option>
                                                <option value="Không" selected>Không</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button id="btnAddVehicle" type="submit" class="btn btn-primary">Thêm mới</button>
                            </div>
                        </form>
                    </div>
                </div>
<?php
include "./footer.php";
?>  