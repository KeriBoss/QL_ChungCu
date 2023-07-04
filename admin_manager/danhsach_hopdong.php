<?php
include "./header.php";
require_once '../model/hopdong.php';
require_once '../model/hd_thanhly.php';
require_once '../model/khachhang.php';

$hopdong = new HopDong();
$layTatCaHopDong = $hopdong->layTatCaHopDong();

$thanhtoan = new HopDongThanhLy();

//Create customer
$khachhang = new KhachHang();
$layTatCaKhachHang = $khachhang->layTatCaKhachHang();
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Danh Sách Hợp Đồng</h1>
        <a href="./them_hopdong_1.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Thêm hợp đồng mới</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách hợp đồng với khách hàng</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <!-- display -->
                <table class="table table-bordered custom-table" id="dataTable1" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Chức <br> năng</th>
                            <th>Tình trạng</th>
                            <th>Số <br> HĐ</th>
                            <th>Số PLHĐ</th>
                            <th>Ngày ký</th>
                            <th>Tên KH</th>
                            <th>Khu</th>
                            <th>Lô</th>
                            <th>Nền</th>
                            <th>Đơn giá</th>
                            <th>Diện tích HĐ</th>
                            <th>Giá trị HĐ</th>
                            <th>Bộ phận</th>
                            <th>Giao nền</th>
                            <th>Vay ngân hàng</th>
                            <th>Đơn giá TT</th>
                            <th>Diện tích TT</th>
                            <th>Giá trị TT</th>
                            <th>Ghi chú</th>
                            <th>Ký hiệu</th>
                            <th>Công chứng</th>
                            <th>Ngày nhận sổ</th>
                            <th>Chuyển nhượng</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($layTatCaHopDong as $item) { ?>
                            <tr>
                                <td>
                                    <a href="edit_hopdong.php?id=<?= $item['HD_id'] ?>" class="icon edit"><i class='bx bx-edit'></i></a>
                                    <a href="action/xoa_hopdong.php?id=<?= $item['HD_id'] ?>" onclick="if(CheckForm() == false) return false;" class="icon delete"><i class='bx bxs-message-square-x'></i></a>
                                </td>
                                <td>
                                    <?php
                                    $status = '';
                                    $statusContent = "Đang tiến hành";
                                    $urlSuccess = '';
                                    $layTatCaHDThanhToanTheoHD = $thanhtoan->layTatCaHDThanhToanTheoHD($item['HD_id']);
                                    $TOTAL_PAYMENT = 0;
                                    foreach ($layTatCaHDThanhToanTheoHD as $data) {
                                        $TOTAL_PAYMENT += $data['tien_thanhly'];
                                    }
                                    if ($TOTAL_PAYMENT >= ($item['gia_hd'] * $item['dientich_thucte'])) {
                                        $status = 'success';
                                        $statusContent = "Đã thanh lý";
                                        $urlSuccess = '&success=true';
                                    }
                                    ?>
                                    <a href="danhsach_thanhtoan.php?id_hd=<?= $item['HD_id'] ?><?= $urlSuccess ?>" class="btn btn-payment <?= $status ?>"><?= $statusContent ?></a>
                                </td>
                                <td><?= $item['so_hopdong'] ?></td>
                                <td></td>
                                <td><?= $item['ngaylap'] ?></td>
                                <td><?= $item['ten_kh'] ?></td>
                                <td><?= $item['ten_khudat'] ?></td>
                                <td><?= $item['ten_lodat'] ?></td>
                                <td><?= $item['ten_nendat'] ?></td>
                                <td><?= number_format($item['gia_hd']) ?></td>
                                <td><?= $item['dientich_hd'] ?></td>
                                <td><?= number_format($item['gia_hd'] * $item['dientich_hd']) ?></td>
                                <td><?= $item['ten_bophan'] ?></td>
                                <td>
                                    <?php
                                    $currentDate = date('Y-m-d');
                                    if ($currentDate < $item['ngay_giaodat']) {
                                        echo "Chưa";
                                    } else {
                                        echo "Đã giao";
                                    }
                                    ?>
                                </td>
                                <td><?= $item['vay_nganhang'] ?></td>
                                <td><?= number_format($item['gia_thucte']) ?></td>
                                <td><?= $item['dientich_thucte'] ?></td>
                                <td><?= number_format($item['gia_thucte'] * $item['dientich_thucte']) ?></td>
                                <td><?= $item['HD_ghichu'] ?></td>
                                <td><?= $item['HD_kyhieu'] ?></td>
                                <td><?= $item['congchung'] ?></td>
                                <td><?= $item['ngaygiao_sodo'] ?></td>
                                <td>
                                    <?php
                                    if ($item['vay_nganhang'] === "Có") { ?>
                                        <a href="action/xoa_giaichap.php?id_hd=<?= $item['HD_id'] ?>" onclick="if(CheckContract() == false) return false;" class="btn btn-transfer success">Giải chấp</a>
                                    <?php } else { ?>
                                        <a href="edit_hopdong.php?id=<?= $item['HD_id'] ?>&transfer=true" class="btn btn-transfer">Chuyển nhượng</a>
                                    <?php }
                                    ?>
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
<div id="newModal" class="modal1 card transfer" data-display="false">
    <!-- Modal content -->
    
</div>
<?php
include "./footer.php";
?>

