<?php include("../inc/top.php"); ?>

<h3 class="text-info">Quản lý khách hàng</h3> 
<br>
<form method="post" action="index.php" class="row g-2 mb-3">
    <input type="hidden" name="action" value="timkhachhang">
    <div class="col-md-4">
        <input type="text" name="txtTim" class="form-control" placeholder="Nhập email hoặc tên...">
    </div>
    <div class="col-md-1">
        <button type="submit" class="btn btn-primary w-100">Tìm</button>
    </div>
</form>

<table class="table table-hover">
	<tr>
		<th>Mã KH</th>
		<th>Họ tên</th>
		<th>SĐT</th>
		<th>Email</th>		
		<th>Xem đơn hàng</th>
	</tr>
	<?php
	foreach($khachhang as $kh):
	?>
	<tr>
		<td>
			<?php echo $kh["id"]; ?>	
		</td>
		<td><?php echo $kh["hoten"]; ?></td>
		<td><?php echo $kh["sodienthoai"]; ?></td>
		<td>
			<?php echo $kh["email"]; ?>
		</td>
		<td><a href="index.php?action=xemdonhang&id=<?php echo $kh["id"]; ?>">Xem
			</a></td>
	</tr>
	<?php
	endforeach;
	?>
</table>

<?php include("../inc/bottom.php"); ?>
