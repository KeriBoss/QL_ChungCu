<?php
include_once "./header.php";
require_once  "../model/hopdong.php";
require_once  "../model/hd_thanhly.php";

if(isset($_GET['id_hd']) && isset($_GET['id_thanhtoan'])){
    $id_hd = $_GET['id_hd'];
    $id_thanhtoan = $_GET['id_thanhtoan'];

    $thanhtoan = new HopDongThanhLy();

    $layTatCaThanhToanTheoId = $thanhtoan->layTatCaThanhToanTheoId($id_hd, $id_thanhtoan);

}else{
    header('location: ./404.php');
}


?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Chỉnh sửa thông tin thanh toán</h1>
                    <!-- <a href="./add_protype.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Chỉnh sửa dự án</a> -->
                </div>

                <!-- DataTales Example -->
                <div class="card shadow row mb-4 pb-3">
                    <div class="col-lg-8 col-md-12 col-12">
                        <form action="action/edit_hopdong_thanhtoan.php" method="post" enctype="multipart/form-data">
                            <input type="number" name="id_thanhtoan" value="<?=$id_thanhtoan?>" hidden>
                            <input type="number" name="id_hd" value="<?=$id_hd?>" hidden>
                                <div class="row mt-3 align-items-center">
                                    <div class="col-lg-3 col-md-12 col-12">
                                        Giai đoạn thứ:
                                    </div>
                                    <div class="col-lg-9 col-md-12 col-12">
                                        <div class="row col-lg-6 col-md-12 col-12">
                                            <input type="number" value="<?=$layTatCaThanhToanTheoId[0]['giaidoan']?>" name="giaidoan" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3 align-items-center">
                                    <div class="col-lg-3 col-md-12 col-12">
                                        Tên giai đoạn:
                                    </div>
                                    <div class="col-lg-9 col-md-12 col-12">
                                        <textarea name="ten_giaidoan" class="form-control" placeholder="Nhập tên giai đoạn thanh toán..."><?=$layTatCaThanhToanTheoId[0]['ten_giaidoan']?></textarea>
                                    </div>
                                </div>
                                <div class="row mt-3 align-items-center">
                                    <div class="col-lg-3 col-md-12 col-12">
                                        Tiền thanh toán:
                                    </div>
                                    <div class="col-lg-5 col-md-7 col-7">
                                        <input type="number" class="form-control" value="<?=$layTatCaThanhToanTheoId[0]['tien_thanhly']?>" name="tien_thanhly" placeholder="0">
                                    </div>
                                    <div class="col-lg-4 col-md-5 col-5">
                                        x 1000đ
                                    </div>
                                </div>
                                <div class="row mt-3 align-items-center">
                                    <div class="col-lg-3 col-md-12 col-12">
                                        Ngày trả tiền:
                                    </div>
                                    <div class="col-lg-3 col-md-12 col-12">
                                        <input type="date" class="form-control" value="<?=$layTatCaThanhToanTheoId[0]['ngay_tratien']?>" name="ngay_tratien">
                                    </div>
                                </div>
                                <div class="row mt-3 align-items-center">
                                    <div class="col-lg-3 col-md-12 col-12">
                                        Tình trạng:
                                    </div>
                                    <div class="col-lg-5 col-md-12 col-12">
                                        <select name="status" class="form-control">
                                            <option class="statusDiv" value="Chưa thanh toán">Chưa thanh toán</option>
                                            <option class="statusDiv" value="Đã thanh toán">Đã thanh toán</option>
                                        </select>
                                    </div>
                                </div>
                            <button type="submit" class="btn btn-primary float-right">Lưu Trạng Thái</button>
                        </form>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<script>
    for (var i = 0; i < document.querySelectorAll('.statusDiv').length; i++) {
        if (document.querySelectorAll('.statusDiv')[i].value == '<?= $layTatCaThanhToanTheoId[0]['status']; ?>') {
            document.querySelectorAll('.statusDiv')[i].selected = true;
            break;
        }
    }
</script>
<?php
include_once './footer.php';
?>