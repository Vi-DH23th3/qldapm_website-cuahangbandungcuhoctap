<?php
require_once("database.php");

class NGUOIDUNG {
    private $db;
    private $id;
    private $hinhanh;

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
    public function setid($value) { 
        $this->id = $value; 
    }
    public function getid() { 
        return $this->id; 
    }
    public function sethinhanh($value) { 
        $this->hinhanh = $value; 
    }
    public function gethinhanh() { 
        return $this->hinhanh; 
    }
    public function getemail() { 
        return $this->email; 
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
    // Kiểm tra đăng nhập Admin
    public function kiemtranguoidunghople($email, $matkhau){
        $db = DATABASE::connect();
        try{
            $sql = "SELECT * FROM nguoidung WHERE email=:email AND matkhau=:matkhau AND trangthai=1";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(":email", $email);
            $cmd->bindValue(":matkhau", md5($matkhau));
            $cmd->execute();
            return $cmd->rowCount() == 1;
        }
        catch(PDOException $e){ return false; }
    }

    // Cập nhật thông tin Admin
    public function capnhatnguoidung($nd) {
        $sql = "UPDATE nguoidung SET email = :email, sodienthoai = :sodt, hoten = :hoten, hinhanh = :hinhanh WHERE id = :id";
        $stm = $this->db->prepare($sql);
        $stm->bindValue(':email', $nd->email);
        $stm->bindValue(':sodt', $nd->sodienthoai);
        $stm->bindValue(':hoten', $nd->hoten);
        $stm->bindValue(':hinhanh', $nd->hinhanh);
        $stm->bindValue(':id', $nd->id);
        return $stm->execute();
    }

    // Đổi mật khẩu Admin
    public function doimatkhau($nd){
        $sql = "UPDATE nguoidung SET matkhau = :matkhau WHERE email = :email";
        $stm = $this->db->prepare($sql);
        $stm->bindValue(':matkhau', $nd->matkhau);
        $stm->bindValue(':email', $nd->email);
        return $stm->execute();
    }
}
?>
