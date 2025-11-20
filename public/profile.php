<?php include("inc/top.php"); ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-info text-white text-center"><h4>CẬP NHẬT HỒ SƠ</h4></div>
                <div class="card-body">
                    <form action="index.php" method="post">
                        <input type="hidden" name="action" value="xlhoso">
                        <input type="hidden" name="txtid" value="<?php echo $_SESSION["khachhang"]["id"]; ?>">
                        
                        <div class="mb-3">
                            <label class="form-label">Email (Không thể thay đổi):</label>
                            <input type="email" class="form-control bg-light" name="txtemail" value="<?php echo $_SESSION["khachhang"]["email"]; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Họ tên:</label>
                            <input type="text" class="form-control" name="txthoten" value="<?php echo $_SESSION["khachhang"]["hoten"]; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Số điện thoại:</label>
                            <input type="number" class="form-control" name="txtsodienthoai" value="<?php echo $_SESSION["khachhang"]["sodienthoai"]; ?>" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-info text-white">Lưu thay đổi</button>
                            <a href="index.php?action=thongtin" class="btn btn-secondary">Hủy bỏ</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("inc/bottom.php"); ?>