<?php
include_once "./header.php";
require_once  "../model/ql_duan.php";
require_once  "../model/dm_khudat.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    header('location: ./404.php');
}
//Created new type of product
$ql_duan = new QLDuAn();
//Get all type 
$layTatCaDuan = $ql_duan->layTatCaDuan();

$dm_khudat = new DoanhMucKhuDat();
$laykhuDatTheoId = $dm_khudat->laykhuDatTheoId($id);


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
                        <form action="action/edit_khudat.php" method="post" class="w-75" enctype="multipart/form-data">
                        <input type="number" name="khudat_id" value="<?=$id?>" hidden>
                            <div class="form-group">
                                <label for="ten_khudat"><b>Tên khu đất:</b></label>
                                <input type="text" class="form-control" name="ten_khudat" value="<?=$laykhuDatTheoId[0]['ten_khudat']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="loai_nen"><b>Loại nền trong khu:</b></label>
                                <input type="text" class="form-control" name="loai_nen" value="<?=$laykhuDatTheoId[0]['loai_nen']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Chọn hình ảnh</label>
                                <img src="./public/img/khu_dat/<?=$laykhuDatTheoId[0]['image']?>" height="300px" id="img_thumbnail" alt="<?=$laykhuDatTheoId[0]['image']?>">
                                <input id="change_img" type="file" name="image" class="form-control" value="<?=$laykhuDatTheoId[0]['image']?>">
                                <input type="text" value="<?=$laykhuDatTheoId[0]['image']?>" name="name_img_product" hidden>
                            </div>
                            <div class="form-group">
                                <label for="dien_tich"><b>Diện tích(m<sup>2</sup>):</b></label>
                                <input type="number" class="form-control" name="dien_tich" value="<?=$laykhuDatTheoId[0]['dien_tich']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="mo_ta">Mô tả</label><br>
                                <textarea name="mo_ta" class="form-control"><?=$laykhuDatTheoId[0]['mo_ta']?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="id_duan"><b>Thuộc dự án:</b></label>
                                <select name="id_duan" class="form-control">
                                    <?php foreach($layTatCaDuan as $item){
                                        if($item['id'] == $laykhuDatTheoId[0]['id_duan']){?>
                                        <option value="<?=$item['id']?>" selected><?=$item['ten_duan']?></option>
                                    <?php }else{?>
                                        <option value="<?=$item['id']?>"><?=$item['ten_duan']?></option>
                                    <?php } }?>
                                </select>
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