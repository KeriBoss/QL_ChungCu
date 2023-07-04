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
$layTatCaHDConNo = $thanhly->layTatCaHDConNo();

// $hopdong = new HopDong();
// $layHopDongTheoID = $hopdong->layHopDongTheoID($id_hd);

// $TOTAL_PAYMENT = 0;
// $TOTAL_THANHLY = 0;
// foreach($layTatCaHDThanhToanTheoHD as $items){
//     if($items['status'] == "Đã thanh toán")
//     $TOTAL_PAYMENT += $items['tien_thanhly'];
//     $TOTAL_THANHLY = $items['gia_hd'] * $items['dientich_hd'];
// }

?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Danh Sách Hợp Đồng Thanh Toán</h1>
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
                                            <th>Chức năng</th>
                                            <th>Số HĐ</th>
                                            <th>Tên dự án</th>
                                            <th>Tên khách hàng</th>
                                            <th>Giai đoạn</th>
                                            <th>Tên giai đoạn</th>
                                            <th>Tiền thanh toán</th>
                                            <th>Ngày trả tiền</th>
                                            <th>Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $count = 1;
                                            foreach($layTatCaHDConNo as $item){
                                                $today = date('Y-m-d');
                                                $date1 = new DateTime($today);
                                                $date2 = new DateTime($item['ngay_tratien']);
                                                
                                                $interval = $date1->diff($date2);
                                                
                                                $days = $interval->format("%r%a");
                                                $checkInfo = false;
                                                if($days <= 5){
                                                    $checkInfo = true;
                                                }
                                        ?>
                                            <tr>
                                                <td><?=$count++?></td>
                                                <td>
                                                    <a href="edit_hopdong_thanhtoan.php?id_hd=<?=$item['ID_hd']?>&id_thanhtoan=<?=$item['ID_thanhtoan']?>" class="icon edit"><i class='bx bx-edit'></i></a>
                                                    <a href="action/xoa_thanhtoan_hopdong.php?id_hd=<?=$item['ID_hd']?>&id_thanhtoan=<?=$item['ID_thanhtoan']?>" onclick="if(CheckForm() == false) return false;" class="icon delete"><i class='bx bxs-message-square-x' ></i></a>
                                                </td>
                                                <td><?=$item['so_hopdong']?></td>
                                                <td <?php echo $checkInfo == true ? "class='bg-danger text-white'" : ""  ?>><?=$item['ten_duan']?></td>
                                                <td><?=$item['ten_kh']?></td>
                                                <td><?=$item['giaidoan']?></td>
                                                <td><?=$item['ten_giaidoan']?></td>
                                                <td><?=number_format($item['tien_thanhly'])?></td>
                                                <td><?=$item['ngay_tratien']?></td>
                                                <td>
                                                <?php
                                                    $status = '';
                                                    $statusContent = "Chưa thanh toán";
                                                    
                                                    if ($item['status'] == "Đã thanh toán") {
                                                        $status = 'success';
                                                        $statusContent = "Đã thanh toán";
                                                        $urlSuccess = '&success=true';
                                                    }
                                                    ?>
                                                    <a class="btn btn-payment <?= $status ?>"><?= $statusContent ?></a>
                                                </td>
                                                
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                <!-- <b>Tổng số tiền đã thanh toán(VND): </b><?=number_format($TOTAL_PAYMENT)?>/<?=number_format($TOTAL_THANHLY)?> - Còn <b><?=number_format($TOTAL_THANHLY - $TOTAL_PAYMENT)?></b> -->
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                <!-- Modal -->
                
<?php
include "./footer.php";
?>  