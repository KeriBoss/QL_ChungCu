<?php
include "./header.php";
require_once '../model/hd_thanhly.php';
require_once '../model/hopdong.php';

if(isset($_GET['id_hd'])){
    $id_hd = $_GET['id_hd'];
}
if(isset($_GET['success'])){
    $success = $_GET['success'];
}
$thanhly = new HopDongThanhLy();
$layTatCaHDThanhToanTheoHD = $thanhly->layTatCaHDThanhToanTheoHD($id_hd);

$hopdong = new HopDong();
$layHopDongTheoID = $hopdong->layHopDongTheoID($id_hd);

$TOTAL_PAYMENT = 0;
$TOTAL_THANHLY = 0;
foreach($layTatCaHDThanhToanTheoHD as $items){
    $TOTAL_PAYMENT += $items['tien_thanhly'];
    $TOTAL_THANHLY = $items['gia_hd'] * $items['dientich_thucte'];
}

?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Danh Sách Hợp Đồng Thanh Toán</h1>
                        <?php if(!isset($success)){ ?>
                        <a id="myBtn" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Thêm phần thanh toán mới</a>
                        <?php } ?>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="./danhsach_hopdong.php">Quay lại</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered custom-table" id="dataTable1" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Số HĐ</th>
                                            <th>Tên khách hàng</th>
                                            <th>Giai đoạn</th>
                                            <th>Tên giai đoạn</th>
                                            <th>Tiền thanh toán</th>
                                            <th>Ngày trả tiền</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $count = 1;
                                            foreach($layTatCaHDThanhToanTheoHD as $item){
                                        ?>
                                            <tr>
                                                <td><?=$count++?></td>
                                                <td><?=$item['so_hopdong']?></td>
                                                <td><?=$item['ten_kh']?></td>
                                                <td><?=$item['giaidoan']?></td>
                                                <td><?=$item['ten_giaidoan']?></td>
                                                <td><?=number_format($item['tien_thanhly'])?></td>
                                                <td><?=$item['ngay_tratien']?></td>
                                                <td>
                                                    <a href="edit_hopdong_thanhtoan.php?id_hd=<?=$id_hd?>&id_thanhtoan=<?=$item['ID_thanhtoan']?>" class="icon edit"><i class='bx bx-edit'></i></a>
                                                    <a href="action/xoa_thanhtoan_hopdong.php?id_hd=<?=$id_hd?>&id_thanhtoan=<?=$item['ID_thanhtoan']?>" onclick="if(CheckForm() == false) return false;" class="icon delete"><i class='bx bxs-message-square-x' ></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                <b>Tổng số tiền đã thanh toán(VND): </b><?=number_format($TOTAL_PAYMENT)?>/<?=number_format($TOTAL_THANHLY)?> - Còn <b><?=number_format($TOTAL_THANHLY - $TOTAL_PAYMENT)?></b>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                <!-- Modal -->
                <div id="newModal" class="modal1" data-display="false">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <form action="action/them_hopdong_thanhtoan.php" method="post" enctype="multipart/form-data" id="form-hopdong">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Thêm khu đất mới</h5>
                                <button type="button" data-modal="close" class="close" >
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="number" name="id_hd" value="<?=$id_hd?>" hidden>
                                <div class="row mt-3 align-items-center">
                                    <div class="col-lg-3 col-md-12 col-12">
                                        Giai đoạn thứ:
                                    </div>
                                    <div class="col-lg-9 col-md-12 col-12">
                                        <div class="row col-lg-6 col-md-12 col-12">
                                            <input type="number" value="<?=count($layTatCaHDThanhToanTheoHD)+1?>" name="giaidoan" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3 align-items-center">
                                    <div class="col-lg-3 col-md-12 col-12">
                                        Tên giai đoạn:
                                    </div>
                                    <div class="col-lg-9 col-md-12 col-12">
                                        <textarea name="ten_giaidoan" class="form-control" placeholder="Nhập tên giai đoạn thanh toán..."></textarea>
                                    </div>
                                </div>
                                <div class="row mt-3 align-items-center">
                                    <div class="col-lg-3 col-md-12 col-12">
                                        Tiền thanh toán:
                                    </div>
                                    <div class="col-lg-5 col-md-7 col-7">
                                        <input type="number" class="form-control" name="tien_thanhly" min="1000000" placeholder="> 1.000.000">
                                    </div>
                                    <div class="col-lg-4 col-md-5 col-5">
                                        x 1000đ
                                    </div>
                                </div>
                                <div class="row mt-3 align-items-center">
                                    <div class="col-lg-3 col-md-12 col-12">
                                        Ngày trả tiền:
                                    </div>
                                    <div class="col-lg-9 col-md-12 col-12">
                                        <input type="date" class="form-control" name="ngay_tratien">
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