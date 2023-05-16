<?php
include "./header.php";
require_once "../model/ql_duan.php";

$ql_duan = new QLDuAn();
$layTatCaDuan = $ql_duan->layTatCaDuan();

?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Quản lý dự án</h1>
                        <a id="myBtn" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Thêm dự án mới</a>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách các dự án</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="5%">Mã dự án</th>
                                            <th>Tên dự án</th>
                                            <th>Hình minh họa</th>
                                            <th width="35%">Mô tả</th>
                                            <th width="25%">Quy định xây dựng</th>
                                            <th width="5%"></th>
                                            <th width="5%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($layTatCaDuan as $item){ ?>
                                            <tr>
                                                <td><?=$item['ma_duan']?></td>
                                                <td><?=$item['ten_duan']?></td>
                                                <td>
                                                    <img src="./public/img/du_an/<?=$item['image']?>" class="img-fluid" alt="<?=$item['image']?>">
                                                </td>
                                                <td><?=$item['mo_ta']?></td>
                                                <td><?=$item['quy_dinh']?></td>
                                                <td><a href="./edit_duan.php?id=<?=$item['id']?>" class="icon edit"><i class='bx bx-edit'></i></a></td>
                                                <td><a onclick="if(CheckForm() == false) return false" href="./action/xoa_duan.php?id=<?=$item['id']?>" class="icon delete"><i class='bx bxs-message-square-x' ></i></a></td>
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
                <div id="newModal" class="modal1" data-display="false">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <form action="action/them_duan.php" method="post" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Thêm dự án mới</h5>
                                <button type="button" data-modal="close" class="close" >
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="ten_duan"><b>Tên dự án:</b></label>
                                    <input type="text" class="form-control" name="ten_duan" placeholder="Nhập địa điểm ..." required>
                                </div>
                                <div class="form-group">
                                    <label for="image">Chọn hình minh họa:</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="mo_ta"><b>Mô tả:</b></label>
                                    <textarea name="mo_ta" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="quy_dinh">Quy định xây dựng:</label>
                                    <textarea name="quy_dinh" class="form-control"></textarea>
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