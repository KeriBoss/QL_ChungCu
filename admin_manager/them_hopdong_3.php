<?php
include "./header.php";

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Bản hợp đồng 3 với khách hàng</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bạn hãy thêm một hợp đồng</h6>
        </div>
        <div class="card-body">
            <div class="form-report border-2">
                <form>
                    <div class="row mb-3">
                        <div class="col-lg-8 col-md-12 col-12">
                            <div class="row mt-3 align-items-center">
                                <div class="col-lg-3 col-md-12 col-12">
                                    Giai đoạn thứ:
                                </div>
                                <div class="col-lg-9 col-md-12 col-12">
                                    <input type="text" value="1" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-3 align-items-center">
                                <div class="col-lg-3 col-md-12 col-12">
                                    Tên giai đoạn:
                                </div>
                                <div class="col-lg-9 col-md-12 col-12">
                                    <textarea name="" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row mt-3 align-items-center">
                                <div class="col-lg-3 col-md-12 col-12">
                                    Tên hợp đồng:
                                </div>
                                <div class="col-lg-5 col-md-7 col-7">
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-lg-4 col-md-5 col-5">
                                    x 1000đ
                                </div>
                            </div>
                            <div class="row mt-3 align-items-center">
                                <div class="col-lg-3 col-md-12 col-12">
                                    Ngày trả tiền:
                                </div>
                                <div class="col-lg-9 col-md-12 col-12">
                                    <input type="date" class="form-control">
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