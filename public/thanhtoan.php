<?php include("inc/top.php"); ?>

<div class="container">    
  <div class="row"> 
    <h3>Vui lòng nhập đầy đủ thông tin</h3>
	<div class="col-sm-6">
	<h4 class="text-info">Thông tin khách hàng</h4>
	<?php 
	if(isset($_SESSION["khachhang"])){
	?>
	<form method="post" action="index.php">
		<input type="hidden" name="txtid" value="<?php echo $_SESSION["khachhang"]["id"]; ?>">
		<input type="hidden" name="action" value="luudonhang">
		<div class="my-3">
			<label>Email</label>
			<input type="email" class="form-control" name="txtemail" value="<?php echo $_SESSION["khachhang"]["email"]; ?>" readonly>
		</div>
		<div class="my-3">
			<label>Họ tên</label>
			<input type="text" class="form-control" name="txthoten" value="<?php echo $_SESSION["khachhang"]["hoten"]; ?>" readonly>
		</div>
		<div class="my-3">
			<label>Số điện thoại</label>
			<input type="number" class="form-control" name="txtsodienthoai" value="<?php echo $_SESSION["khachhang"]["sodienthoai"] ?>" readonly>
		</div>
		<div class="my-3">
			<label>Địa chỉ giao hàng</label>
			<textarea class="form-control" name="txtdiachi" required><?php echo $diachi["diachi"]; ?></textarea>
		</div>
		<div class="my-3">
			<input type="submit" value="Hoàn tất đơn hàng" class="btn btn-primary">
		</div>
	</form>
	<?php
	}
	else{	
	?>
	<form method="post"  action="index.php">
		<input type="hidden" name="action" value="luudonhang">
		<div class="my-3">
			<label>Email</label>
			<input type="email" class="form-control" name="txtemail" id="txtemail" required>
		</div>
		<div class="my-3">
			<label>Họ tên</label>
			<input type="text" class="form-control" name="txthoten" id="txthoten" required>
		</div>
		<div class="my-3">
			<label>Số điện thoại</label>
			<input type="number" class="form-control" name="txtsodienthoai" id="txtsodienthoai" required>
		</div>
		<div class="my-3">
			<label>Địa chỉ</label>
			<textarea class="form-control" name="txtdiachi" required></textarea>
		</div>
		<div class="my-3">
			<label>Chọn phương thức thanh toán</label> <br>
			<input type="radio" name="pttt" id="radNganHang" required>Thanh toán bằng tài khoản ngân hàng <br>
			<input type="radio" name="pttt" id="radNhanHang">Thanh toán khi nhận hàng
		</div>
		<!-- Form thông tin ngân hàng, mặc định ẩn -->
		<div class="my-3" id="bank-form" style="display:none;">
			<label for="stk" class="form-label">Số tài khoản</label>
			<input type="text" class="form-control" name="txtstk" id="stk" placeholder="Nhập số tài khoản">

			<label for="tennganhang" class="form-label mt-2">Tên ngân hàng</label>
			<input type="text" class="form-control" name="txttennganhang" id="tennganhang" placeholder="Nhập tên ngân hàng">
		</div>
		<div class="my-3">
			<input type="submit" value="Hoàn tất đơn hàng" class="btn btn-primary">
			
		</div>
	</form>
	<script src="../js/kiemtra_email.js"></script>
	<script>
		// Lấy các radio
		const radNH = document.getElementById('radNganHang');
		const radCOD = document.getElementById('radNhanHang');
		const bankForm = document.getElementById('bank-form');

		radNH.addEventListener('change', function(){
			if(this.checked){
				bankForm.style.display = 'block';
			}
		});

		radCOD.addEventListener('change', function(){
			if(this.checked){
				bankForm.style.display = 'none';
			}
		});
		function kiemTra(){

		}
		</script>
	<?php	
	}
	?>
	</div>
	<div class="col-sm-6">
	<h4 class="text-info">Thông tin đơn hàng</h4>
		<table class="table table-bordered">
		<tr class="table-info">
		<th>Sản phẩm</th> 
		<th>Đơn giá</th>
		<th>Số lượng</th>
		<th>Thành tiền</th>
		</tr>
		<?php foreach($giohang as $id => $mh): ?>
		<tr>
		<td><img width="50" src="../<?php echo $mh["hinhanh"]; ?>"><?php echo $mh["tenmathang"]; ?></td>
		<td><?php echo number_format($mh["giaban"]) . "đ"; ?></td>
		<td><?php echo $mh["soluong"]; ?></td>
		<td><?php echo number_format($mh["thanhtien"]) . "đ"; ?></td>
		</tr>
		<?php endforeach; ?>
		<tr class="table-info">
		<td colspan="3" class="text-end"><b>Tổng tiền</b></td>
		<td><b><?php echo number_format(tinhtiengiohang()); ?>đ</b></td>
		</tr>
		</table>
	</div>
    


  </div>
 
</div>

<?php include("inc/bottom.php"); ?>