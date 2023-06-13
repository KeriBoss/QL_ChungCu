<?php
include "./header.php";
require_once "../model/dm_khudat.php";
require_once "../model/dm_lodat.php";

//Create object dm_khudat
$dm_khudat = new DoanhMucKhuDat();
$layTatCaKhuDat = $dm_khudat->layTatCaKhuDat();

//Create object ql_duan
$dm_lodat = new DoanhMucLoDat();
$layTatCaLoDat = $dm_lodat->layTatCaLoDat();

?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Quản lý lô đất</h1>
                        <a id="myBtn" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Thêm lô đất mới</a>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách các lô đất</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="5%">Mã lô đất</th>
                                            <th width="10%">Tên lô đất</th>
                                            <th width="15%">Hình minh họa</th>
                                            <th width="10%">Diện tích(m<sup>2</sup>)</th>
                                            <th width="25%">Mô tả</th>
                                            <th width="10%">Thuộc khu đất</th>
                                            <th width="5%"></th>
                                            <th width="5%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($layTatCaLoDat as $item){ ?>
                                            <tr>
                                                <td><?=$item['ma_lodat']?></td>
                                                <td><?=$item['ten_lodat']?></td>
                                                <td>
                                                    <img src="./public/img/lo_dat/<?=$item['image']?>" class="img-fluid" alt="<?=$item['image']?>">
                                                </td>
                                                <td><?=$item['dien_tich']?></td>
                                                <td><?=$item['mo_ta']?></td>
                                                <td><?=$item['ten_khudat']?></td>
                                                <td><a href="./edit_lodat.php?id=<?=$item['lodat_id']?>" class="icon edit"><i class='bx bx-edit'></i></a></td>
                                                <td><a onclick="if(CheckForm() == false) return false" href="./action/xoa_lodat.php?id=<?=$item['lodat_id']?>" class="icon delete"><i class='bx bxs-message-square-x' ></i></a></td>
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
                        <form action="action/them_lodat.php" method="post" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Thêm lô đất mới</h5>
                                <button type="button" data-modal="close" class="close" >
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="ten_khudat"><b>Tên lô đất:</b></label>
                                    <input type="text" class="form-control" name="ten_lodat" placeholder="Nhập ..." required>
                                </div>
                                <div class="form-group">
                                    <label for="image">Chọn hình minh họa:</label>
                                    <input type="file" name="image" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="dien_tich"><b>Diện tích(m<sup>2</sup>):</b></label>
                                    <input type="number" class="form-control" name="dien_tich" placeholder="Nhập ..." required>
                                </div>
                                <div class="form-group">
                                    <label for="mo_ta"><b>Mô tả:</b></label>
                                    <textarea name="mo_ta" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="id_khudat"><b>Thuộc lô đất:</b></label>
                                    <select name="id_khudat" class="form-control">
                                        <?php foreach($layTatCaKhuDat as $item){?>
                                            <option value="<?=$item['khudat_id']?>"><?=$item['ten_khudat']?></option>
                                        <?php } ?>
                                    </select>
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