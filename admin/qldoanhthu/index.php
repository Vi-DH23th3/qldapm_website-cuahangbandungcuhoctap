<?php
// Bật hiển thị lỗi PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Kiểm tra đăng nhập
// if(!isset($_SESSION["nguoidung"])){
//     header("location:../index.php");
//     exit();
// }

require_once("../../model/database.php");
require("../../model/donhang.php");
require("../../model/khachhang.php");

// Xét action
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "xem";

$dh = new DONHANG();
$kh = new KHACHHANG();
switch($action){
    case "daonhthungay":
        $ngaybd = $_GET["txtNgayBD"];
        $ngaykt = $_GET["txtNgayKT"];

        $doanhthu = $dh->doanhthutheongay($ngaybd, $ngaykt);
        $dt_mathang = $dh->mathangbanchay();
        $khachhang = $kh->topkhachhang();
        include("main.php");
        break;

    case "xem":
        $dt_mathang = $dh->mathangbanchay();
        $khachhang = $kh->topkhachhang();
        $doanhthu = [];
        include("main.php");
        break;
}
