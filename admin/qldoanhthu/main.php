<?php include("../inc/top.php"); ?>

<h2 class="text-primary my-3">Thống kê doanh thu</h2>

<div class="container my-3">
    <h4 class="text-info">Doang thu theo ngày</h4>
    <form class="row g-3 align-items-center" method="get" action="index.php">
        <input type="hidden" name="action" value="daonhthungay">

        <div class="col-md-3">
            <label for="txtNgayBD" class="form-label">Từ ngày:</label>
            <input type="date" class="form-control" id="txtNgayBD" name="txtNgayBD" required>
        </div>

        <div class="col-md-3">
            <label for="txtNgayKT" class="form-label">Đến ngày:</label>
            <input type="date" class="form-control" id="txtNgayKT" name="txtNgayKT" required>
        </div>

        <div class="col-md-3 align-self-end">
            <button type="submit" class="btn btn-primary">Thống kê</button>
        </div>
    </form>
</div>

<div class="container my-4">
    <table class="table table-hover table-bordered">
            <tr>
                <th>Ngày</th>
                <th>Tổng doanh thu</th>
                <th>Tổng số đơn hàng</th>
            </tr>

            <?php if(!empty($doanhthu)): ?>
                <?php foreach($doanhthu as $dt): ?>
                    <tr>
                        <td><?php echo $dt['Ngay'] ?></td>
                        <td><?php echo number_format($dt['TongDoanhThu']) ?> VND</td>
                        <td><?php echo $dt['TongSoDonHang'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" class="text-center">Chưa có đơn hàng trong khoảng thời gian này</td>
                </tr>
            <?php endif; ?>
    </table>
    <h4 class="text-info">Danh sách khách hàng có số lượng mua cao</h4>
    <table class="table table-hover table-bordered">
            <tr>
                <th>Tên khách hàng</th>
                <th>Email khách hàng</th>
                <th>Tổng tiền đã mua</th>
                <th>Số lượng đơn hàng</th>
            </tr>
                <?php foreach($khachhang as $kh): ?>
                    <tr>
                        <td><?php echo $kh['TenKhachHang'] ?></td>
                        <td><?php echo $kh['EmailKhachHang'] ?></td>
                        <td><?php echo $kh['TongTienDaMua'] ?>VND</td>
                        <td><?php echo $kh['SoLuongDonHang'] ?></td>
                    </tr>
                <?php endforeach; ?>
    </table>
    <h4 class="text-info">Mặt hàng bán chạy</h4>
        <table class="table table-hover table-bordered">
            <tr>
                <th>Tên mặt hàng</th>
                <th>Đã bán</th>
            </tr>
                <?php foreach($dt_mathang as $dtmh): ?>
                    <tr>
                        <td><?php echo $dtmh['TenMatHang'] ?></td>
                        <td><?php echo $dtmh['DaBan'] ?></td>
                    </tr>
                <?php endforeach; ?>
    </table>
</div>

<?php include("../inc/bottom.php"); ?>
