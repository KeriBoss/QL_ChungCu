<?php
include "./header.php";

?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Bản hợp đồng với khách hàng</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Bạn hãy thêm một hợp đồng</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-report border-2">
                                <form action="">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-12">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-3 col-md-4 col-12">
                                                    <label>Loại hợp đồng:</label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-12">
                                                    <select name="duan_baocao" class="form-control">
                                                        <option value="">Dự án 1</option>
                                                        <option value="">Dự án 2</option>
                                                        <option value="">Dự án 3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-3 col-md-4 col-12">
                                                <label>Số hợp đồng:</label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-12">
                                                <input type="number" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-3 col-md-4 col-12">
                                                <label>Tên bộ phận:</label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-12">
                                                <select name="duan_baocao" class="form-control">
                                                    <option value="">Bộ phận 1</option>
                                                    <option value="">Bộ phận 2</option>
                                                    <option value="">Bộ phận 3</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-3 col-md-4 col-12">
                                                <label>Nhà môi giới:</label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-12">
                                                <select name="duan_baocao" class="form-control">
                                                    <option value="">Nhà môi giới 1</option>
                                                    <option value="">Nhà môi giới 2</option>
                                                    <option value="">Nhà môi giới 3</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-3 col-md-4 col-12">
                                                <label>Tiền môi giới:</label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-12">
                                                <input type="number" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-3 col-md-4 col-12">
                                                <label>Ngày lập:</label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-12">
                                                <input type="date" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-3 col-md-4 col-12">
                                                <label>Ngày giao đất:</label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-12">
                                                <input type="date" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-3 col-md-4 col-12">
                                                <label>Ngày giao sổ đỏ:</label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-12">
                                                <input type="date" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-3 col-md-4 col-12">
                                                <label>Ghi chú:</label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-12">
                                                <input type="number" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-12">
                                            <div class="row mb-3 align-items-center">
                                                <div class="col-lg-3 col-md-3 col-12">
                                                    <label>Dự án:</label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-12">
                                                    <select name="duan_baocao" class="form-control">
                                                        <option value="">Dự án 1</option>
                                                        <option value="">Dự án 2</option>
                                                        <option value="">Dự án 3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-3 col-md-3 col-12">
                                                    <label>Nền đất:</label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-12">
                                                    <input type="number" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3 align-items-center">
                                                <div class="col-lg-3 col-md-3 col-12">
                                                    <label>Giá đất:</label>
                                                </div>
                                                <div class="col-lg-5 col-md-8 col-7">
                                                    <input type="number" class="form-control">
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-5">
                                                    x 1000đ/m <sup>2</sup>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-3 col-md-3 col-12">
                                                    <label>Giá hợp đồng:</label>
                                                </div>
                                                <div class="col-lg-5 col-md-5 col-7">
                                                    <input type="number" class="form-control">
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-5">
                                                    x 1000đ/m <sup>2</sup>(a)
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-3 col-md-3 col-12">
                                                    <label>Diện tích hợp đồng:</label>
                                                </div>
                                                <div class="col-lg-5 col-md-5 col-7">
                                                    <input type="number" class="form-control">
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-5">
                                                    m <sup>2</sup>(b)
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-3 col-md-3 col-12">
                                                    <label>Giá đất usd:</label>
                                                </div>
                                                <div class="col-lg-5 col-md-5 col-7">
                                                    <input type="number" class="form-control">
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-5">
                                                    (d)
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-3 col-md-3 col-12">
                                                    <label><b>Trị giá hợp đồng:</b></label>
                                                </div>
                                                <div class="col-lg-5 col-md-5 col-7">
                                                    <input type="number" class="form-control">
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-5">
                                                    <b> x 1000 VND (a*b)</b>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-3 col-md-3 col-12">
                                                    <label><b>Trị giá hợp đồng usd:</b></label>
                                                </div>
                                                <div class="col-lg-5 col-md-5 col-7">
                                                    <input type="number" class="form-control">
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-5">
                                                    <b> (d * b)</b>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-3 col-md-3 col-12">
                                                    <label>Giá thực tế:</label>
                                                </div>
                                                <div class="col-lg-5 col-md-5 col-7">
                                                    <input type="number" class="form-control">
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-5">
                                                    x 1000đ/m <sup>2</sup>(c)
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-3 col-md-3 col-12">
                                                    <label>Diện tích thực tế:</label>
                                                </div>
                                                <div class="col-lg-5 col-md-5 col-7">
                                                    <input type="number" class="form-control">
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-5">
                                                    m <sup>2</sup>(d)
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-3 col-md-3 col-12">
                                                    <label><b>Trị giá thực tế:</b></label>
                                                </div>
                                                <div class="col-lg-5 col-md-5 col-7">
                                                    <input type="number" class="form-control">
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-5">
                                                    x 1000 VND (c * d)
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-3 col-md-3 col-12">
                                                    <label>Tiền thuế (%):</label>
                                                </div>
                                                <div class="col-lg-5 col-md-5 col-7">
                                                    <input type="number" class="form-control">
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-5"></div>
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