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
}
?>
