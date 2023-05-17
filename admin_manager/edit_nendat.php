<?php
include_once "./header.php";
require_once  "../model/dm_lodat.php";
require_once  "../model/dm_khudat.php";
require_once  "../model/dm_nendat.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    header('location: ./404.php');
}
//Created new type of product
$dm_lodat = new DoanhMucLoDat();
$layLoDatTheoId = $dm_lodat->layLoDatTheoId($id );

$dm_khudat = new DoanhMucKhuDat();
$layTatCaKhuDat = $dm_khudat->layTatCaKhuDat();

$dm_nendat = new DoanhMucNenDat();
$layNenDatTheoId = $dm_nendat->layNenDatTheoId($id);
?>
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Chỉnh sửa nền đất</h1>
                </div>

                <!-- DataTales Example -->
                <div class="card shadow mb-4 w-75 m-auto">
                    <div class="p-4 d-flex justify-content-center align-items-center">
                        <form action="action/them_nendat.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="ten_khudat"><b>Tên khu đất:</b></label>
                                    <select id="khudat" name="ten_khudat" class="form-control">
                                        <?php foreach($layTatCaKhuDat as $item){ ?>
                                            <option value="<?=$item['khudat_id']?>"><?=$item['ten_khudat']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="ten_lodat"><b>Tên lô đất:</b></label>
                                    <select id="lodat" name="ten_lodat" class="form-control">
                                        <?php foreach($layTatCaLoDat as $item){ ?>
                                            <option value="<?=$item['id']?>"><?=$item['ten_lodat']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="loai_nen"><b>Tên nền đất:</b></label>
                                    <input type="text" class="form-control" name="ten_nen" placeholder="Nhập ..." required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="loai_nen"><b>Lộ giới(m):</b></label>
                                    <input type="number" class="form-control" name="lo_gioi" value="0" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-6">
                                    <label for=""><b>Chiều dài:</b> </label>
                                    <div class="input-group mb-3">
                                        <input type="number" name="chieu_dai" class="form-control" value="0" aria-label="chieu_dai" aria-describedby="chieu_dai">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="chieu_dai">m</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-6">
                                    <label for=""><b> Chiều rộng:</b></label>
                                    <div class="input-group mb-3">
                                        <input type="number" name="chieu_rong" class="form-control"  value="0" aria-label="chieu_rong" aria-describedby="chieu_rong">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="chieu_rong">m</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-6">
                                    <label for=""><b>Diện tích:</b> </label>
                                    <div class="input-group mb-3">
                                        <input type="number" name="dien_tich" class="form-control" value="0" aria-label="dien_tich" aria-describedby="dien_tich">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="dien_tich">m <sup>2</sup></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-6">
                                    <label for=""><b> Diện tích XD:</b></label>
                                    <div class="input-group mb-3">
                                        <input type="number" name="dien_tich_xd" class="form-control"  value="0" aria-label="dien_tich_xd" aria-describedby="dien_tich_xd">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="dien_tich_xd">m <sup>2</sup></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-12">
                                    <label for="loai_nen"><b>Giá(VND):</b></label>
                                    <input type="number" class="form-control" name="gia" value="0" required>
                                </div>
                                <div class="col-lg-3 col-md-6 col-12">
                                    <label for="loai_nen"><b>Số tầng:</b></label>
                                    <input type="number" class="form-control" name="so_tang" value="0" required>
                                </div>
                                <div class="col-lg-3 col-md-6 col-12">
                                    <label for="loai_nen"><b>Hiện trạng:</b></label>
                                    <select name="hien_trang" class="form-control">
                                        <option value="Đã bán">Đã bán</option>
                                        <option value="Chưa bán">Chưa bán</option>
                                        <option value="Đang giao dịch">Đang giao dịch</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-6 col-12">
                                    <label for="loai_nen"><b>Số HĐ:</b></label>
                                    <input type="number" class="form-control" name="id_hd" value="0" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image">Chọn hình minh họa:</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="mo_ta"><b>Mô tả:</b></label>
                            <textarea name="mo_ta" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="text" id="name_duan" disabled>
                        </div>
                        <div class="modal-footer">
                            <button id="btnAddVehicle" type="submit" class="btn btn-primary">Thêm mới</button>
                        </div>
                    </form>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

    <script>
        var reader;
        let change_img = document.querySelector("#change_img");
        let img_thumbnail = document.querySelector("#img_thumbnail");
        change_img.onchange = e => {
            files = e.target.files;
                reader = new FileReader();
                reader.onload = function() {
                    document.querySelector("#img_thumbnail").src = reader.result;
                    document.querySelector('#img_thumbnail').style = 'width: 300px;';
                    document.querySelector('#img_thumbnail').style = 'height: 300px;';
                }
                reader.readAsDataURL(files[0]);
        }
    </script>
<?php
include "./footer.php";
?>