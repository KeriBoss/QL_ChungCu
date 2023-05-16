<?php
include_once "./header.php";
require_once  "../model/ql_duan.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    header('location: ' . $url .'/404.php');
}
//Created new type of product
$ql_duan = new QLDuAn();
//Get all type 
$layDuanTheoId = $ql_duan->layDuanTheoId($id);

?>
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Quản lý dự án</h1>
                    <a href="./add_protype.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Chỉnh sửa dự án</a>
                </div>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="p-4 d-flex justify-content-start align-items-center">
                        <form action="action/edit_duan.php" method="post" class="w-75" enctype="multipart/form-data">
                        <input type="number" name="duan_id" value="<?=$id?>" hidden>
                            <div class="form-group w-75">
                                <label for="">Tên dự án:</label>
                                <input type="text" name="ten_duan" class="form-control" value="<?=$layDuanTheoId[0]['ten_duan']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Chọn hình ảnh</label>
                                <img src="./public/img/du_an/<?=$layDuanTheoId[0]['image']?>" height="300px" id="img_thumbnail" alt="<?=$layDuanTheoId[0]['image']?>">
                                <input id="change_img" type="file" name="image" class="form-control" value="<?=$layDuanTheoId[0]['image']?>">
                                <input type="text" value="<?=$layDuanTheoId[0]['image']?>" name="name_img_product" hidden>
                            </div>
                            <div class="form-group">
                                <label for="mo_ta">Mô tả:</label>
                                <textarea name="mo_ta" class="form-control"><?=$layDuanTheoId[0]['mo_ta']?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="quy_dinh">Mô tả</label><br>
                                <textarea name="quy_dinh" class="form-control"><?=$layDuanTheoId[0]['quy_dinh']?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Lưu Trạng Thái</button>
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