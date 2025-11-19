<?php include("inc/top.php"); ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-info text-white text-center">
                    <h4>ĐĂNG NHẬP KHÁCH HÀNG</h4>
                </div>
                <div class="card-body">
                    <?php if(isset($tb)){ ?>
                        <div class="alert alert-danger"><?php echo $tb; ?></div>
                    <?php } ?>
                    <form action="index.php" method="post">
                        <input type="hidden" name="action" value="xldangnhap">

                        <div class="mb-3">
                            <label for="txtemail" class="form-label">Email:</label>
                            <input type="email" class="form-control" name="txtemail" id="txtemail" placeholder="Nhập email..." required>
                        </div>

                        <div class="mb-3">
                            <label for="txtmatkhau" class="form-label">Mật khẩu:</label>
                            <input type="password" class="form-control" name="txtmatkhau" id="txtmatkhau" placeholder="Nhập mật khẩu..." required>
                        </div>
                        
                        <div class="mb-3 text-end">
                            <a href="index.php?action=quenmatkhau" class="text-decoration-none text-info">Quên mật khẩu?</a>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-info text-white">Đăng nhập</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <p class="mb-0">Chưa có tài khoản? <a href="index.php?action=dangky" class="text-info">Đăng ký ngay</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("inc/bottom.php"); ?>