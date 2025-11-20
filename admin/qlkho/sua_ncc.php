<?php include("../inc/top.php"); ?>
<div class="container-fluid p-0">
    <h4 class="mb-3 text-info">Cập Nhật Nhà Cung Cấp</h4>
    <div class="card col-md-8 mx-auto">
        <div class="card-body">
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="xl_sua_ncc">
                <input type="hidden" name="id" value="<?php echo $ncc_hientai['id']; ?>">
                <div class="mb-3"><label class="form-label">Tên Nhà Cung Cấp</label><input type="text" class="form-control" name="ten" value="<?php echo $ncc_hientai['tenncc']; ?>" required></div>
                <div class="mb-3"><label class="form-label">Địa chỉ</label><input type="text" class="form-control" name="diachi" value="<?php echo $ncc_hientai['diachi']; ?>"></div>
                <div class="row">
                    <div class="col-md-6 mb-3"><label class="form-label">Số điện thoại</label><input type="text" class="form-control" name="sodt" value="<?php echo $ncc_hientai['sodienthoai']; ?>"></div>
                    <div class="col-md-6 mb-3"><label class="form-label">Email</label><input type="email" class="form-control" name="email" value="<?php echo $ncc_hientai['email']; ?>"></div>
                </div>
                <div class="text-center"><button type="submit" class="btn btn-primary">Lưu Thay Đổi</button><a href="index.php?action=ql_nhacc" class="btn btn-warning">Hủy</a></div>
            </form>
        </div>
    </div>
</div>
<?php include("../inc/bottom.php"); ?>