<?php include("../inc/top.php"); ?>
<div class="dsdonhang">
    
        <h4 class="text-info">Lịch sử mua hàng</h4>
        <?php if(empty($dsdonhang)): ?>
            <div class="alert alert-warning">Khách hàng này chưa có đơn hàng.</div>
        <?php else: ?>
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr><th>Mã đơn</th><th>Ngày đặt</th><th>Tổng tiền</th><th>Địa chỉ nhận</th><th>Chi tiết</th></tr>
                    </thead>
                    <tbody>
                        <?php foreach($dsdonhang as $d): ?>
                        <tr>
                            <td><?php echo $d['id']; ?></td>
                            <td><?php echo date('d/m/Y H:i', strtotime($d['ngay'])); ?></td>
                            <td class="text-danger fw-bold"><?php echo number_format($d['tongtien']); ?>đ</td>
                            <td><?php echo $d['diachi']; ?></td>
                            <td><a href="index.php?action=chitietdonhang&dhid=<?php echo $d['id'];?>" class="btn btn-sm btn-info text-white">Xem</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
        
</div>
    <?php if(isset($donhangct)): ?>
    <div class="mt-4">
        <table class="table table-hover">
                <thead class="table-light">
                    <tr><th>Mã đơn</th><th>Ngày đặt</th><th>Tổng tiền</th><th>Địa chỉ nhận</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $donhang['id']; ?></td>
                        <td><?php echo date('d/m/Y H:i', strtotime($donhang['ngay'])); ?></td>
                        <td class="text-danger fw-bold"><?php echo number_format($donhang['tongtien']); ?>đ</td>
                        <td><?php echo $donhang['diachi']; ?></td>
                    </tr>
                </tbody>
            </table>
        <a id="btn-back" href="index.php?action=xemdonhang&id=<?php echo $donhang['nguoidung_id'] ?? '' ?>" class="btn btn-secondary mb-3">Quay lại</a>
        <h5 class="text-primary">Chi tiết đơn hàng: <?php echo $_GET['dhid']; ?></h5>
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
                <?php  endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>
<script>
     <?php if(isset($_GET["dhid"])){ ?>
        document.querySelector(".dsdonhang").style.display="none";
     <?php  } ?>
</script>
<?php include("../inc/bottom.php"); ?>
