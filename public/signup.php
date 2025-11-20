<?php include("inc/top.php"); ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-info text-white text-center"><h4>ĐĂNG KÝ TÀI KHOẢN</h4></div>
                <div class="card-body">
                    <?php if(isset($tb)){ ?><div class="alert alert-danger"><?php echo $tb; ?></div><?php } ?>
                    <form action="index.php" method="post">
                        <input type="hidden" name="action" value="xldangky">
                        <div class="mb-3"><label class="form-label">Họ tên:</label><input type="text" class="form-control" name="txthoten" required></div>
                        <div class="mb-3"><label class="form-label">Số điện thoại:</label><input type="number" class="form-control" name="txtsodienthoai" required></div>
                        <div class="mb-3"><label class="form-label">Email:</label><input type="email" class="form-control" name="txtemail" required></div>
                        <div class="mb-3"><label class="form-label">Mật khẩu:</label><input type="password" class="form-control" name="txtmatkhau" required></div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-info text-white">Đăng ký</button>
                            <a href="index.php?action=dangnhap" class="btn btn-secondary">Quay lại đăng nhập</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("inc/bottom.php"); ?>