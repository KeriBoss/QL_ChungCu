<?php
include_once "./header.php";
require_once  "../model/bophan.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    header('location: ./404.php');
}
//Created new type of product
$bophan = new BoPhan();
//Get all type 
$layBoPhanTheoID = $bophan->layBoPhanTheoID($id);

?>
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Quản lý các bộ phận</h1>
                    <a href="./add_protype.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Chỉnh sửa thông tin bộ phận</a>
                </div>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="p-4 d-flex justify-content-start align-items-center">
                        <form action="action/edit_bophan.php" method="post" enctype="multipart/form-data">
                            <input type="number" name="bophan_id" value="<?=$id?>" hidden>
                                <div class="form-group">
                                    <label for="ten_bophan"><b>Tên bộ phận:</b></label>
                                    <input type="text" class="form-control" name="ten_bophan" value="<?=$layBoPhanTheoID[0]['ten_bophan']?>" required>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="kyhieu"><b>Ký hiệu:</b></label>
                                                <input type="text" class="form-control" name="kyhieu" value="<?=$layBoPhanTheoID[0]['kyhieu']?>" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="phong"><b>Phòng:</b></label>
                                                <input type="text" class="form-control" name="phong" value="<?=$layBoPhanTheoID[0]['phong']?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="ban"><b>Ban:</b></label>
                                                <input type="text" class="form-control" name="ban" value="<?=$layBoPhanTheoID[0]['ban']?>">
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

<?php
include "./footer.php";
?>