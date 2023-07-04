<?php
include "./header.php";
require_once "../model/nhamoigioi.php";

//Create object dm_khudat
$nhamoigioi = new NhaMoiGioi();
$layTatCaNMG = $nhamoigioi->layTatCaNMG();

?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Quản lý thông tin các nhà môi giới</h1>
                        <a id="myBtn" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Thêm bộ phận mới mới</a>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách các nhà môi giới</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered custom-table" id="dataTable1" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th >Tên nhà môi giới</th>
                                            <th >Sđt</th>
                                            <th >Giới tính</th>
                                            <th>Địa chỉ</th>
                                            <th >Email</th>
                                            <th >Chức vụ</th>
                                            <th >Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $count = 1;
                                        foreach($layTatCaNMG as $item){ ?>
                                            <tr>
                                                <td><?=$count++?></td>
                                                <td><?=$item['ten_nmg']?></td>
                                                <td><?=$item['phone']?></td>
                                                <td><?=$item['gioitinh']?></td>
                                                <td><?=$item['diachi']?></td>
                                                <td><?=$item['email']?></td>
                                                <td><?=$item['chucvu']?></td>
                                                <td>
                                                    <a href="./edit_nhamoigioi.php?id=<?=$item['id']?>" class="icon edit"><i class='bx bx-edit'></i></a>
                                                    <a onclick="if(CheckForm() == false) return false" href="./action/xoa_nhamoigioi.php?id=<?=$item['id']?>" class="icon delete"><i class='bx bxs-message-square-x' ></i></a>
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
                <div id="newModal" class="modal1" data-display="false">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <form action="action/them_nhamoigioi.php" method="post" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Thêm nhà môi giới mới</h5>
                                <button type="button" data-modal="close" class="close" >
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-12">
                                            <label for="ten_bophan"><b>Tên nhà môi giới:</b></label>
                                            <input type="text" class="form-control" name="ten_nmg" placeholder="Nhập ..." required>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-12">
                                        <label for="ten_bophan"><b>Số điện thoại:</b></label>
                                            <input type="text" class="form-control" pattern="[0-9]{10,11}" name="phone" placeholder="Nhập ..." required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Địa chỉ</label>
                                    <textarea name="diachi" class="form-control" placeholder="Nhập địa chỉ ..."></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="kyhieu"><b>Email:</b></label>
                                                <input type="email" class="form-control" name="email" placeholder="Nhập ..." required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="phong"><b>Giới tính:</b></label>
                                                <select name="gioitinh" class="form-control">
                                                    <option value="Nam" selected>Nam</option>
                                                    <option value="Nữ">Nữ</option>
                                                    <option value="Khác">Khác</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="chucvu"><b>Chức vụ:</b></label>
                                                <input type="text" class="form-control" name="chucvu" placeholder="Nhập ...">
                                            </div>
                                        </div>
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