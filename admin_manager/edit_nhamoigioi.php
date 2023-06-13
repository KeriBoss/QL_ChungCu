<?php
include_once "./header.php";
require_once  "../model/nhamoigioi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('location: ./404.php');
}
//Created new type of product
$nhamoigioi = new NhaMoiGioi();
//Get all type 
$layNMGTheoID = $nhamoigioi->layNMGTheoID($id);

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quản lý thông tin các nhà môi giới</h1>
        <a href="./add_protype.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Chỉnh sửa thông tin nhà môi giới</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="p-4 d-flex justify-content-start align-items-center" style="width: 75%;">
        <form action="action/edit_nhamoigioi.php" method="post" style="width: 75%;" enctype="multipart/form-data">
                <input type="number" name="id_nmg" value="<?= $id ?>" hidden>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-12">
                            <label for="ten_bophan"><b>Tên nhà môi giới:</b></label>
                            <input type="text" class="form-control" name="ten_nmg" value="<?=$layNMGTheoID[0]['ten_nmg']?>" required>
                        </div>
                        <div class="col-lg-6 col-md-12 col-12">
                            <label for="ten_bophan"><b>Số điện thoại:</b></label>
                            <input type="text" class="form-control" name="phone" value="<?=$layNMGTheoID[0]['phone']?>" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <textarea name="diachi" class="form-control" placeholder="Nhập địa chỉ ..."><?=$layNMGTheoID[0]['diachi']?></textarea>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <label for="kyhieu"><b>Email:</b></label>
                                <input type="email" class="form-control" name="email" value="<?=$layNMGTheoID[0]['email']?>" required>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <label for="phong"><b>Giới tính:</b></label>
                                <select name="gioitinh" class="form-control">
                                    <option class="optionDiv" value="Nam" selected>Nam</option>
                                    <option class="optionDiv" value="Nữ">Nữ</option>
                                    <option class="optionDiv" value="Khác">Khác</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <label for="chucvu"><b>Chức vụ:</b></label>
                                <input type="text" class="form-control" name="chucvu" value="<?=$layNMGTheoID[0]['chucvu']?>">
                            </div>
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
    for (var i = 0; i < document.querySelectorAll('.optionDiv').length; i++) {
        if (document.querySelectorAll('.optionDiv')[i].value == '<?= $layNMGTheoID[0]['gioitinh']; ?>') {
            document.querySelectorAll('.optionDiv')[i].selected = true;
            break;
        }
    }
</script>
<?php
include "./footer.php";
?>