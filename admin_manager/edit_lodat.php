<?php
include_once "./header.php";
require_once  "../model/dm_lodat.php";
require_once  "../model/dm_khudat.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    header('location: ./404.php');
}
//Created new type of product
$dm_lodat = new DoanhMucLoDat();
//Get all type 
$layLoDatTheoId = $dm_lodat->layLoDatTheoId($id );

$dm_khudat = new DoanhMucKhuDat();
$layTatCaKhuDat = $dm_khudat->layTatCaKhuDat();


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
                        <form action="action/edit_lodat.php" method="post" enctype="multipart/form-data">
                        <input type="number" name="lodat_id" value="<?=$id?>" hidden>
                            <div class="form-group">
                                <label for="ten_lodat"><b>Tên lô đất:</b></label>
                                <input type="text" class="form-control" name="ten_lodat" value="<?=$layLoDatTheoId[0]['ten_lodat']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Chọn hình ảnh</label>
                                <img src="./public/img/lo_dat/<?=$layLoDatTheoId[0]['image']?>" height="300px" id="img_thumbnail" alt="<?=$layLoDatTheoId[0]['image']?>">
                                <input id="change_img" type="file" name="image" class="form-control" value="<?=$layLoDatTheoId[0]['image']?>">
                                <input type="text" value="<?=$layLoDatTheoId[0]['image']?>" name="name_img_product" hidden>
                            </div>
                            <div class="form-group">
                                <label for="dien_tich"><b>Diện tích(m<sup>2</sup>):</b></label>
                                <input type="number" class="form-control" name="dien_tich" value="<?=$layLoDatTheoId[0]['dien_tich']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="mo_ta">Mô tả</label><br>
                                <textarea name="mo_ta" class="form-control"><?=$layLoDatTheoId[0]['mo_ta']?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="khudat_id"><b>Thuộc dự án:</b></label>
                                <select name="khudat_id" class="form-control">
                                    <?php foreach($layTatCaKhuDat as $item){
                                        if($item['khudat_id'] == $layLoDatTheoId[0]['id_khudat']){?>
                                        <option value="<?=$item['khudat_id']?>" selected><?=$item['ten_khudat']?></option>
                                    <?php }else{?>
                                        <option value="<?=$item['khudat_id']?>"><?=$item['ten_khudat']?></option>
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