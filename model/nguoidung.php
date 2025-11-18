<?php
require_once("database.php");

class NGUOIDUNG {
    private $db;

    public function __construct() {
        $this->db = DATABASE::connect();
    }

    // ====== CÁC HÀM SET =======
    public function setemail($value) {
        $this->email = $value;
    }

    public function setmatkhau($value) {
        // mã hoá mật khẩu md5
        $this->matkhau = md5($value);
    }

    public function setsodienthoai($value) {
        $this->sodienthoai = $value;
    }

    public function sethoten($value) {
        $this->hoten = $value;
    }

    public function setloai($value) {
        $this->loai = $value;
    }

    // ====== LẤY DANH SÁCH =======
    public function laydanhsachnguoidung() {
        $sql = "SELECT * FROM nguoidung ORDER BY id DESC";
        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    // ====== KIỂM TRA EMAIL TỒN TẠI =======
    public function laythongtinnguoidung($email) {
        $sql = "SELECT * FROM nguoidung WHERE email = ?";
        $stm = $this->db->prepare($sql);
        $stm->execute([$email]);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    // ====== THÊM NGƯỜI DÙNG =======
    public function themnguoidung($nd) {
        $sql = "INSERT INTO nguoidung(email, sodienthoai, matkhau, hoten, loai, trangthai)
                VALUES(?, ?, ?, ?, ?, 1)";
        $stm = $this->db->prepare($sql);
        return $stm->execute([
            $nd->email,
            $nd->sodienthoai,
            $nd->matkhau,
            $nd->hoten,
            $nd->loai
        ]);
    }

    // ====== ĐỔI TRẠNG THÁI =======
    public function doitrangthai($id, $trangthai) {
        $sql = "UPDATE nguoidung SET trangthai = ? WHERE id = ?";
        $stm = $this->db->prepare($sql);
        return $stm->execute([$trangthai, $id]);
    }
}
?>
