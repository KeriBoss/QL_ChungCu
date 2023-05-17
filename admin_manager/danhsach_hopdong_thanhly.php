<?php
include "./header.php";


?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Danh Sách Hợp Đồng Thanh Lý</h1>
                        <a id="myBtn" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Thêm khu đất mới</a>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="5%">Số HĐ</th>
                                            <th>Số PLHĐ</th>
                                            <th>Ngày ký</th>
                                            <th>Tên KH</th>
                                            <th>Khu</th>
                                            <th>Lô</th>
                                            <th>Nền</th>
                                            <th>Đơn giá</th>
                                            <th>Diện tích HĐ</th>
                                            <th>Giá trị HĐ</th>
                                            <th>Trạng thái</th>
                                            <th>Bộ phận</th>
                                            <th>Hợp đồng mua bán</th>
                                            <th>Giao nền</th>
                                            <th>Vay ngân hàng</th>
                                            <th>Đơn giá TT</th>
                                            <th>Diện tích TT</th>
                                            <th>Giá trị TT</th>
                                            <th>Ghi chú</th>
                                            <th>Ký hiệu</th>
                                            <th>Công chứng</th>
                                            <th>Ngày nhận sổ</th>
                                            <th width="5%"></th>
                                            <th width="5%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td></td>
                                            <td>22/9/2023</td>
                                            <td>Nguyễn Văn B</td>
                                            <td>06</td>
                                            <td>06</td>
                                            <td>601</td>
                                            <td>32.900,00</td>
                                            <td>123</td>
                                            <td>32.000.000,00</td>
                                            <td>HĐ</td>
                                            <td>PKD</td>
                                            <td></td>
                                            <td>Chưa</td>
                                            <td></td>
                                            <td>212300000</td>
                                            <td>142300</td>
                                            <td>212300000</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>22/9/2023</td>
                                            <td><a class="icon edit"><i class='bx bx-edit'></i></a></td>
                                            <td><a onclick="if(CheckForm() == false) return false"  class="icon delete"><i class='bx bxs-message-square-x' ></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td></td>
                                            <td>22/9/2023</td>
                                            <td>Nguyễn Văn A</td>
                                            <td>06</td>
                                            <td>06</td>
                                            <td>601</td>
                                            <td>32.900,00</td>
                                            <td>123</td>
                                            <td>32.000.000,00</td>
                                            <td>HĐ</td>
                                            <td>PKD</td>
                                            <td></td>
                                            <td>Chưa</td>
                                            <td></td>
                                            <td>212300000</td>
                                            <td>142300</td>
                                            <td>212300000</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>22/9/2023</td>
                                            <td><a class="icon edit"><i class='bx bx-edit'></i></a></td>
                                            <td><a onclick="if(CheckForm() == false) return false"  class="icon delete"><i class='bx bxs-message-square-x' ></i></a></td>
                                        </tr>
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
                                <h5 class="modal-title" id="exampleModalLongTitle">Thêm khu đất mới</h5>
                                <button type="button" data-modal="close" class="close" >
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="ten_khudat"><b>Tên khu đất:</b></label>
                                    <input type="text" class="form-control" name="ten_khudat" placeholder="Nhập ..." required>
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