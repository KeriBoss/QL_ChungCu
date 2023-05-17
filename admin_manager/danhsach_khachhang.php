<?php
include "./header.php";


?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Danh Sách Các Khách Hàng</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách khách hàng</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="5%">STT</th>
                                            <th>Tên KH</th>
                                            <th>Số HĐ</th>
                                            <th>Mã phụ lục</th>
                                            <th>Nền</th>
                                            <th>Tên dự án</th>
                                            <th>Năm sinh</th>
                                            <th>Giới tính</th>
                                            <th>Địa chỉ thường trú</th>
                                            <th>ĐC liên lạc</th>
                                            <th>Email</th>
                                            <th>Điện thoại</th>
                                            <th>Số CMND</th>
                                            <th>Ngày cấp</th>
                                            <th>Nơi cấp</th>
                                            <th>Nghề nghiệp</th>
                                            <th>Chức vụ</th>
                                            <th>Trạng thái</th>
                                            <th>Người thanh toán</th>
                                            <th width="5%"></th>
                                            <th width="5%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Công ty cổ phần A</td>
                                            <td>1</td>
                                            <td>1A4234</td>
                                            <td>006</td>
                                            <td>Dự án chưng cư</td>
                                            <td>1998</td>
                                            <td>Nam</td>
                                            <td>HCM</td>
                                            <td>HCM</td>
                                            <td>A@gmail.com</td>
                                            <td>0125232342</td>
                                            <td>32132194</td>
                                            <td>11/2/2016</td>
                                            <td>HCM</td>
                                            <td>Nông</td>
                                            <td></td>
                                            <td>HĐ-PL</td>
                                            <td></td>
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