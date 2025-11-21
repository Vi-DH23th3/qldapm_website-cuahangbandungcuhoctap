<?php
class DONHANG{
	
	public function doanhthutheongay($ngaybd, $ngaykt){
		$dbcon = DATABASE::connect();
		try{
			$sql = "SELECT
						DATE(donhang.ngay) AS Ngay,
						SUM(donhang.tongtien) AS TongDoanhThu,
						COUNT(donhang.id) AS TongSoDonHang
					FROM
						donhang
					WHERE
						donhang.ngay >= :ngaybd
						AND donhang.ngay <= :ngaykt
					GROUP BY
						DATE(donhang.ngay)
					ORDER BY
						Ngay;";
			$cmd = $dbcon->prepare($sql);
			$cmd->bindValue(":ngaybd", $ngaybd);
			$cmd->bindValue(":ngaykt", $ngaykt);
			$cmd->execute();
			$result = $cmd->fetchAll(PDO::FETCH_ASSOC);
			$cmd->closeCursor();
			return $result;
		}
		catch(PDOException $e){
			$error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
		}
	}
	public function mathangbanchay(){
		$dbcon = DATABASE::connect();
		try{
			$sql = "SELECT mh.tenmathang AS TenMatHang, SUM(dhct.soluong) AS DaBan
					FROM donhangct dhct
					JOIN mathang mh ON dhct.mathang_id = mh.id
					GROUP BY mh.id, mh.tenmathang
					ORDER BY DaBan DESC
					LIMIT 5";
			$cmd = $dbcon->prepare($sql);
			$cmd->execute();
			$result = $cmd->fetchAll(PDO::FETCH_ASSOC);
			$cmd->closeCursor();
			return $result;
		}
		catch(PDOException $e){
			$error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
		}
    }
		// Thêm đơn hàng mới, trả về khóa của dòng mới thêm
	public function themdonhang($nguoidung_id,$diachi,$tongtien){
		$db = DATABASE::connect();
		try{
			$sql = "INSERT INTO donhang(nguoidung_id, diachi, tongtien) 
					VALUES(:nguoidung_id,:diachi,:tongtien)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':nguoidung_id',$nguoidung_id);			
			$cmd->bindValue(':diachi',$diachi);
			$cmd->bindValue(':tongtien',$tongtien);
			$cmd->execute();
			$id = $db->lastInsertId();
			return $id;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}
	// Lấy danh sách đơn hàng của khách
    public function laydanhsachdonhangtheokh($nguoidung_id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM donhang WHERE nguoidung_id=:nguoidung_id ORDER BY id DESC";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":nguoidung_id", $nguoidung_id);
            $cmd->execute();
            return $cmd->fetchAll();
        }
        catch(PDOException $e){ return null; }
    }
	//lấy đơn hàng theo id
	public function laydanhsachdonhangtheoid($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM donhang WHERE id=:id ORDER BY id ASC";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            return $cmd->fetch(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e){ 
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
    }
}
?>