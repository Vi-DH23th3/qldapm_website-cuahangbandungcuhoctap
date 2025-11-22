<?php include("../inc/top.php"); ?>

<h3 class="text-info">QUẢN LÝ ĐƠN HÀNG</h3>

<form method="post" action="index.php" class="row g-2 mb-3">
    <input type="hidden" name="action" value="tim">
    <div class="col-md-4">
        <input type="text" name="txtTim" class="form-control" placeholder="Nhập mã đơn hàng...">
    </div>
    <div class="col-md-2">
        <button type="submit" class="btn btn-primary w-100">Tìm</button>
    </div>
</form>

<table class="table table-hover">
    <thead class="table-light">
        <tr>
            <th>Mã đơn</th>
            <th>Ngày đặt</th>
            <th>Tên khách hàng</th>
            <th>Tổng tiền</th>
            <th>Địa chỉ nhận</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($dsdonhang as $d): ?>
        <tr>
            <td><?= $d['id'] ?></td>
            <td><?= date("d/m/Y H:i", strtotime($d['ngay'])) ?></td>
            <td><?= $d['hoten'] ?></td>
            <td class="text-danger fw-bold"><?= number_format($d['tongtien']) ?>đ</td>
            <td><?= $d['diachi'] ?></td>
            <td>
                <a href="index.php?action=chitiet&id=<?= $d['id'] ?>" class="btn btn-info btn-sm text-white">Xem</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include("../inc/bottom.php"); ?>
