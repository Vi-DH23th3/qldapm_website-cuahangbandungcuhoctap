<?php include("inc/top.php"); ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-warning text-white text-center"><h4>KHÔI PHỤC MẬT KHẨU</h4></div>
                <div class="card-body">
                    <?php if(isset($tb)){ ?><div class="alert alert-danger"><?php echo $tb; ?></div><?php } ?>
                    
                    <?php if(!isset($email_xacnhan)): ?>
                        <p class="text-muted">Nhập email để tìm tài khoản của bạn:</p>
                        <form action="index.php" method="post">
                            <input type="hidden" name="action" value="xacnhanemail">
                            <div class="mb-3"><label class="form-label">Email:</label><input type="email" class="form-control" name="txtemail" required></div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-warning text-white">Tiếp tục</button>
                                <a href="index.php?action=dangnhap" class="btn btn-secondary">Quay lại</a>
                            </div>
                        </form>
                    <?php else: ?>
                        <div class="alert alert-success">Xin chào, vui lòng đặt lại mật khẩu cho email: <b><?php echo $email_xacnhan; ?></b></div>
                        <form action="index.php" method="post">
                            <input type="hidden" name="action" value="luumatkhaumoi">
                            <input type="hidden" name="txtemail" value="<?php echo $email_xacnhan; ?>">
                            <div class="mb-3"><label class="form-label">Mật khẩu mới:</label><input type="password" class="form-control" name="txtmatkhau" required></div>
                            <div class="mb-3"><label class="form-label">Nhập lại mật khẩu:</label><input type="password" class="form-control" name="txtmatkhau2" required></div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success text-white">Đổi mật khẩu</button>
                                <a href="index.php?action=quenmatkhau" class="btn btn-secondary">Hủy bỏ</a>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("inc/bottom.php"); ?>