<?php
include_once "./header.php";
require_once  "../model/ql_duan.php";
require_once  "../model/dm_khudat.php";
require_once  "../model/khachhang.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    header('location: ./404.php');
}
//Created new type of product
$ql_duan = new QLDuAn();
//Get all type 
$layTatCaDuan = $ql_duan->layTatCaDuan();

$khachhang = new KhachHang();
$layKhachHangTheoId = $khachhang->layKhachHangTheoId($id);

?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Chỉnh sửa khách hàng</h1>
                    <!-- <a href="./add_protype.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Chỉnh sửa dự án</a> -->
                </div>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="p-4 d-flex justify-content-start align-items-center">
                        <form action="action/edit_khachhang.php" method="post" enctype="multipart/form-data">
                            <input type="number" name="id_kh" value="<?=$id?>" hidden>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-12">
                                            <label for="ten_khachhang"><b>Tên khách hàng:</b></label>
                                            <input type="text" class="form-control" name="ten_khachhang" value="<?=$layKhachHangTheoId[0]['ten_kh']?>" required>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-12">
                                            <label for="">Số HĐ</label>
                                            <input type="number" name="so_hd" class="form-control" value="<?=$layKhachHangTheoId[0]['so_hd']?>">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="id_duan"><b>Tên dự án:</b></label>
                                            <select id="id_duan_kh" name="id_duan" class="form-control">
                                                <?php foreach($layTatCaDuan as $item){ ?>
                                                    <option class="duanDiv" value="<?=$item['id']?>"><?=$item['ten_duan']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="ten_nendat"><b>Tên nền đất:</b></label>
                                            <select id="id_lodat_kh" name="ten_nendat" class="form-control">
                                                <?php foreach($layTatCaNenDat as $item){ ?>
                                                    <option class="nendatDiv" value="<?=$item['nendat_id']?>"><?=$item['ten_nendat']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <label for="">Năm sinh:</label>
                                            <input type="date" name="namsinh" class="form-control" value="<?=$layKhachHangTheoId[0]['namsinh']?>" required>
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
                                            <input type="email" name="email" class="form-control" value="<?=$layKhachHangTheoId[0]['email']?>">
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <label for="">Điện thoại</label>
                                            <input type="text" name="phone" class="form-control" value="<?=$layKhachHangTheoId[0]['phone']?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">  
                                            <label for="">Địa chỉ thường trú:</label>
                                            <textarea name="diachi" class="form-control"><?=$layKhachHangTheoId[0]['diachi']?></textarea>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="">Địa chỉ liên lạc:</label>
                                            <textarea name="dc_lienlac" class="form-control"><?=$layKhachHangTheoId[0]['dc_lienlac']?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <label for="">Số CMND:</label>
                                            <input type="text" name="cmnd" class="form-control" value="<?=$layKhachHangTheoId[0]['cmnd']?>" required>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <label for="">Ngày cấp:</label>
                                            <input type="date" name="ngaycap" class="form-control" value="<?=$layKhachHangTheoId[0]['ngaycap']?>" required>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <label for="">Nơi cấp:</label>
                                            <input type="text" name="noicap" class="form-control" value="<?=$layKhachHangTheoId[0]['noicap']?>" required>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <label for="">Nghề nghiệp: </label>
                                            <input type="text" name="nghenghiep" value="<?=$layKhachHangTheoId[0]['nghenghiep']?>" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <label for="">Chức vụ:</label>
                                            <input type="text" name="chucvu" class="form-control" value="<?=$layKhachHangTheoId[0]['namsinh']?>">
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
                            <button type="submit" class="btn btn-primary">Lưu Trạng Thái</button>
                        </form>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<script>
    for (var i = 0; i < document.querySelectorAll('.duanDiv').length; i++) {
        if (document.querySelectorAll('.duanDiv')[i].value == '<?= $layKhachHangTheoId[0]['id_duan']; ?>') {
            document.querySelectorAll('.duanDiv')[i].selected = true;
            break;
        }
    }
    let ID_NENDAT = <?= $layKhachHangTheoId[0]['id_nendat']; ?>;
</script>
<?php
include_once './footer.php';
?>