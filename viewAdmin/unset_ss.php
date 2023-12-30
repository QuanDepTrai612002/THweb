<?php
session_start();

// Xóa tất cả các biến phiên
$_SESSION = array();

// Hủy phiên làm việc
session_destroy();

// Chuyển hướng người dùng đến trang đăng nhập (hoặc trang khác)
header('location:../index.php?act=signin');
exit;
?>