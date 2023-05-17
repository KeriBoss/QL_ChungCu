<?php
include "./header.php";

?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Báo cáo công nợ khách hàng</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Báo Cáo -> Khách Hàng -> Công Nợ Khách Hàng</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-report border-2">
                                <form>
                                    <div class="form-group d-flex align-items-center">
                                        <label for="">Thuộc dự án: </label>
                                        <select name="duan_baocao" class="form-control w-25 ml-3">
                                            <option value="">Dự án 1</option>
                                            <option value="">Dự án 2</option>
                                            <option value="">Dự án 3</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="parent">
                                            <div class="form-group">
                                                <input type="radio" name="bao_cao" id="bao_cao1" checked>
                                                <label for="bao_cao1">Danh sách công nợ khách hàng - Hợp đồng - Giai đoạn thanh toán</label>
                                            </div>
                                            <div class="form-group">
                                                <input type="radio" name="bao_cao" id="bao_cao2">
                                                <label for="bao_cao2">Danh sách công nợ tổng kết thực tế của khách hàng</label>
                                            </div>
                                            <div class="form-group">
                                                <input type="radio" name="bao_cao" id="bao_cao3">
                                                <label for="bao_cao3">Danh sách công nợ chi tiết của khách hàng</label>
                                            </div>
                                            <div class="form-group">
                                                <input type="radio" name="bao_cao" id="bao_cao4">
                                                <label for="bao_cao4">Danh sách công nợ tổng hợp của khách hàng</label>
                                            </div>
                                            <div class="form-group">
                                                <input type="radio" name="bao_cao" id="bao_cao5">
                                                <label for="bao_cao5">Danh sách nợ quá hạn (>= 1 tháng)</label>
                                                <input type="date" name="" id="">
                                            </div>
                                            <div class="form-group">
                                                <input type="radio" name="bao_cao" id="bao_cao6">
                                                <label for="bao_cao6">Danh sách kế hoạch thu (Theo hợp đồng)</label>
                                            </div>
                                            <div class="form-group">
                                                <input type="radio" name="bao_cao" id="bao_cao7">
                                                <label for="bao_cao7">Danh sách kế hoạch thu (Sắp hết hạn)</label>
                                            </div>
                                        </div>
                                        <div class="form-group mt-3">
                                            <h5>Chọn định dạng xuất dữ liệu:</h5>
                                            <div class="group-flex">
                                                <div>
                                                    <input type="radio" name="dinh_dang" id="dinh_dang1" checked>
                                                    <label for="dinh_dang1">Tệp tin (.pdf)</label>
                                                </div>
                                                <div>
                                                    <input type="radio" name="dinh_dang" id="dinh_dang2">
                                                    <label for="dinh_dang2">Tệp tin excel(.xls)</label>
                                                </div>
                                                <div>
                                                    <input type="radio" name="dinh_dang" id="dinh_dang3">
                                                    <label for="dinh_dang3">Tệp tin word(.doc)</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Xuất</button>
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