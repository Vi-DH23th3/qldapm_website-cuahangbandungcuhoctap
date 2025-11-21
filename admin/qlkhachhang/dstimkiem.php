<?php include("../inc/top.php"); ?>

<h3 class="text-info">Kết quả tìm kiếm</h3> 
<br>
<table class="table table-hover">
	<tr>
		<th>Mã KH</th>
		<th>Họ tên</th>
		<th>SĐT</th>
		<th>Email</th>		
		<th>Xem đơn hàng</th>
	</tr>
	<?php if(!empty($khachhang)){
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
    } else{ ?>
<div class="alert alert-warning">Không tìm thấy khách hàng.</div>
<?php } ?>
</table>

<a id="btn-back" href="index.php?action=xem&id=<?php echo $donhang['nguoidung_id'] ?? '' ?>" class="btn btn-secondary mb-3">Quay lại</a>
<?php include("../inc/bottom.php"); ?>
