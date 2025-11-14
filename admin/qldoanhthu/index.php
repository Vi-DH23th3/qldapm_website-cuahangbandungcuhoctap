<?php
// Bật hiển thị lỗi PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Kiểm tra đăng nhập
if(!isset($_SESSION["nguoidung"])){
    header("location:../index.php");
    exit();
}

require("../../model/database.php");
require("../../model/donhang.php");

// Xét action
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "xem";

$dh = new DONHANG();

switch($action){
    case "daonhthungay":
        $ngaybd = $_GET["txtNgayBD"];
        $ngaykt = $_GET["txtNgayKT"];

        $doanhthu = $dh->doanhthutheongay($ngaybd, $ngaykt);
        include("main.php");
        break;

    default:
        // Mặc định: show form rỗng
        $doanhthu = [];
        include("main.php");
        break;
}
