<?php
include "./header.php";
require_once "../model/dm_khudat.php";
require_once "../model/dm_lodat.php";
require_once "../model/dm_nendat.php";
require_once "../model/ql_duan.php";

//Create object dm_khudat
$dm_nendat = new DoanhMucNenDat();
$layTatCaNenDat = $dm_nendat->layTatCaNenDat();

$dm_lodat = new DoanhMucLoDat();
$layTatCaLoDat = $dm_lodat->layTatCaLoDat();

$dm_khudat = new DoanhMucKhuDat();
$layTatCaKhuDat = $dm_khudat->layTatCaKhuDat();

$ql_duan = new QLDuAn();
$layTatCaDuan = $ql_duan->layTatCaDuan();

?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Quản lý nền đất</h1>
                        <a id="myBtn" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Thêm nền đất mới</a>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách các nền đất</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Khu đất</th>
                                            <th>Lô đất</th>
                                            <th>Lộ giới(m)</th>
                                            <th>Chiều dài(m)</th>
                                            <th>Chiều rộng(m)</th>
                                            <th>Diện tích(m<sup>2</sup>)</th>
                                            <th>Diện tích XD(m<sup>2</sup>)</th>
                                            <th>Giá(VND)</th>
                                            <th>Số tầng</th>
                                            <th>Mô tả</th>
                                            <th>Hình ảnh</th>
                                            <th>Hiện trạng</th>
                                            <th>Số HĐ</th>
                                            <th>Tên dự án</th>
                                            <th width="1%"></th>
                                            <th width="1%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $count = 1;
                                        foreach($layTatCaNenDat as $item){ ?>
                                            <tr>
                                                <td><?=$count++?></td>
                                                <td><?=$item['ten_khudat']?></td>
                                                <td><?=$item['ten_lodat']?></td>
                                                <td><?=$item['ten_nendat']?></td>
                                                <td><?=$item['chieu_dai']?></td>
                                                <td><?=$item['chieu_rong']?></td>
                                                <td><?=$item['dien_tich']?></td>
                                                <td><?=$item['dien_tich_xd']?></td>
                                                <td><?=$item['gia']?></td>
                                                <td><?=$item['so_tang']?></td>
                                                <td><?=$item['mo_ta']?></td>
                                                <td>
                                                    <img src="./public/img/nen_dat/<?=$item['image']?>" class="img-fluid" alt="<?=$item['image']?>">
                                                </td>
                                                <td><?=$item['hien_trang']?></td>
                                                <td><?=$item['id_hd']?></td>
                                                <td><?=$item['ten_duan']?></td>
                                                <td><a href="./edit_khudat.php?id=<?=$item['khudat_id']?>" class="icon edit"><i class='bx bx-edit'></i></a></td>
                                                <td><a onclick="if(CheckForm() == false) return false" href="./action/xoa_khudat.php?id=<?=$item['khudat_id']?>" class="icon delete"><i class='bx bxs-message-square-x' ></i></a></td>
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
                        <form action="action/them_khudat.php" method="post" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Thêm nền đất mới</h5>
                                <button type="button" data-modal="close" class="close" >
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="ten_khudat"><b>Tên khu đất:</b></label>
                                    <select id="khudat" name="ten_khudat" class="form-control">
                                        <?php foreach($layTatCaKhuDat as $item){ ?>
                                            <option value="<?=$item['khudat_id']?>"><?=$item['ten_khudat']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ten_khudat"><b>Tên lô đất:</b></label>
                                    <select id="lodat" name="ten_khudat" class="form-control">
                                        <?php foreach($layTatCaLoDat as $item){ ?>
                                            <option value="<?=$item['id']?>"><?=$item['ten_lodat']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="loai_nen"><b>Loại nền trong khu:</b></label>
                                    <input type="text" class="form-control" name="loai_nen" placeholder="Nhập ..." required>
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
                                    <label for="id_duan"><b>Thuộc dự án:</b></label>
                                    <select name="id_duan" class="form-control">
                                        <?php foreach($layTatCaDuan as $item){?>
                                            <option value="<?=$item['id']?>"><?=$item['ten_duan']?></option>
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