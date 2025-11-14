<?php include("../inc/top.php"); ?>

<h4 class="text-info my-3">Thống kê doanh thu</h4>

<div class="container my-3">
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
                        <td><?= $dt['Ngay'] ?></td>
                        <td><?= number_format($dt['TongDoanhThu']) ?> VND</td>
                        <td><?= $dt['TongSoDonHang'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" class="text-center">Chưa có đơn hàng trong khoảng thời gian này</td>
                </tr>
            <?php endif; ?>
    </table>
</div>

<?php include("../inc/bottom.php"); ?>
