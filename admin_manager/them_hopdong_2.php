<?php
include "./header.php";

?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Bản hợp đồng 2 với khách hàng</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Bạn hãy thêm một hợp đồng</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-report border-2">
                                <form>
                                    <div class="row">
                                        <div class="col-lg-8 col-md-12 col-12">
                                            <div class="form-group d-flex align-items-center">
                                                <label for="">Chọn khách hàng: </label>
                                                <select name="duan_baocao" class="form-control w-50 ml-3">
                                                    <option value="">khách hàng 1</option>
                                                    <option value="">khách hàng 2</option>
                                                    <option value="">khách hàng 3</option>
                                                </select>
                                            </div>
                                            <div class="card p-3">
                                                <h5>Thông tin khách hàng:</h5>
                                                <p>Tên: Nguyễn Văn A</p>
                                                <p>Địa chỉ: 123 Cm tháng 8, quận 10, tp Hồ Chí Minh</p>
                                                <p>Số điện thoại: 03123585</p>
                                                <p>Email: test@gmail.com</p>
                                            </div>
                                            <div class="row mt-3 align-items-center">
                                            <div class="col-lg-3 col-md-12 col-12">
                                                Người giới thiệu: 
                                            </div>
                                            <div class="col-lg-9 col-md-12 col-12">
                                                <select name="duan_baocao" class="form-control w-50 ml-3">
                                                    <option value="">Không có</option>
                                                    <option value="">khách hàng 1</option>
                                                    <option value="">khách hàng 2</option>
                                                    <option value="">khách hàng 3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-3 align-items-center">
                                            <div class="col-lg-3 col-md-12 col-12">
                                                Là người: 
                                            </div>
                                            <div class="col-lg-9 col-md-12 col-12">
                                                <div class="form-group mt-3">
                                                    <div class="group-flex">
                                                        <div>
                                                            <input type="radio" name="dinh_dang" id="dinh_dang1" checked>
                                                            <label for="dinh_dang1">Thanh toán</label>
                                                        </div>
                                                        <div>
                                                            <input type="radio" name="dinh_dang" id="dinh_dang2">
                                                            <label for="dinh_dang2">Không</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        
                                    </div>
                                    <button type="submit" class="btn btn-primary">Thêm hợp đồng</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                <!-- Modal -->
                <div id="newModal" class="modal1" data-display="false">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <form action="action/them_khudat.php" method="post" enctype="multipart/form-data"></form>
                    </div>
                </div>
<?php
include "./footer.php";
?>  