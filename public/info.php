<?php include("inc/top.php"); ?>
<div class="container py-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Thông tin tài khoản</h5>
                </div>
                <div class="card-body text-center">
                    <img src="../images/users/user.png" class="img-thumbnail mb-3 rounded-circle" width="100px" alt="Avatar">
                    <h5 class="text-primary"><?php echo $_SESSION["khachhang"]["hoten"]; ?></h5>
                    <p class="text-muted"><?php echo $_SESSION["khachhang"]["email"]; ?></p>
                    <p><strong>SĐT:</strong> <?php echo $_SESSION["khachhang"]["sodienthoai"]; ?></p>
                    <div class="d-grid gap-2">
                        <a href="index.php?action=hoso" class="btn btn-outline-info btn-sm">Cập nhật hồ sơ</a>
                        <a href="index.php?action=dangxuat" class="btn btn-danger btn-sm">Đăng xuất</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <h4 class="text-info mb-3">Lịch sử mua hàng</h4>
            <?php if(empty($donhang)): ?>
                <div class="alert alert-warning">Bạn chưa có đơn hàng nào. <a href="index.php">Mua sắm ngay!</a></div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="table-light">
                            <tr><th>Mã đơn</th><th>Ngày đặt</th><th>Tổng tiền</th><th>Địa chỉ nhận</th><th>Chi tiết</th></tr>
                        </thead>
                        <tbody>
                            <?php foreach($donhang as $d): ?>
                            <tr>
                                <td>#<?php echo $d['id']; ?></td>
                                <td><?php echo date('d/m/Y H:i', strtotime($d['ngay'])); ?></td>
                                <td class="text-danger fw-bold"><?php echo number_format($d['tongtien']); ?>đ</td>
                                <td><?php echo $d['diachi']; ?></td>
                                <td><a href="index.php?action=thongtin&dhid=<?php echo $d['id']; ?>" class="btn btn-sm btn-info text-white">Xem</a></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
            
            <?php if(isset($donhangct)): ?>
            <div class="mt-4">
                <h5 class="text-primary">Chi tiết đơn hàng #<?php echo $_GET['dhid']; ?></h5>
                <table class="table table-bordered">
                    <thead><tr><th>Sản phẩm</th><th>Số lượng</th><th>Đơn giá</th><th>Thành tiền</th></tr></thead>
                    <tbody>
                        <?php foreach($donhangct as $ct): ?>
                        <tr>
                            <td><?php echo $ct['tenmathang']; ?></td>
                            <td><?php echo $ct['soluong']; ?></td>
                            <td><?php echo number_format($ct['dongia']); ?>đ</td>
                            <td><?php echo number_format($ct['thanhtien']); ?>đ</td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php include("inc/bottom.php"); ?>