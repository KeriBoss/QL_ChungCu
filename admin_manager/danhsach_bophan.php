<?php
include "./header.php";
require_once "../model/bophan.php";

//Create object dm_khudat
$bophan = new BoPhan();
$layTatCaBoPhan = $bophan->layTatCaBoPhan();

?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Quản lý bộ phận</h1>
                        <a id="myBtn" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Thêm bộ phận mới mới</a>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách các bộ phận</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered custom-table" id="dataTable1" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th >Tên bộ phận</th>
                                            <th >Ký hiệu</th>
                                            <th >Phòng</th>
                                            <th>Ban</th>
                                            <th >Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $count = 1;
                                        foreach($layTatCaBoPhan as $item){ ?>
                                            <tr>
                                                <td><?=$count++?></td>
                                                <td><?=$item['ten_bophan']?></td>
                                                <td><?=$item['kyhieu']?></td>
                                                <td><?=$item['phong']?></td>
                                                <td><?=$item['ban']?></td>
                                                <td>
                                                    <a href="./edit_bophan.php?id=<?=$item['id']?>" class="icon edit"><i class='bx bx-edit'></i></a>
                                                    <a onclick="if(CheckForm() == false) return false" href="./action/xoa_bophan.php?id=<?=$item['id']?>" class="icon delete"><i class='bx bxs-message-square-x' ></i></a>
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
                        <form action="action/them_bophan.php" method="post" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Thêm bộ phận mới</h5>
                                <button type="button" data-modal="close" class="close" >
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="ten_bophan"><b>Tên bộ phận:</b></label>
                                    <input type="text" class="form-control" name="ten_bophan" placeholder="Nhập ..." required>
                                </div>
                                
                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="kyhieu"><b>Ký hiệu:</b></label>
                                                <input type="text" class="form-control" name="kyhieu" placeholder="Nhập ..." required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="phong"><b>Phòng:</b></label>
                                                <input type="text" class="form-control" name="phong" placeholder="Nhập ...">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="ban"><b>Ban:</b></label>
                                                <input type="text" class="form-control" name="ban" placeholder="Nhập ...">
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