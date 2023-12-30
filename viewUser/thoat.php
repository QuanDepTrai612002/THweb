<?php
session_start();

// Xóa tất cả các biến phiên
$_SESSION = array();

// Hủy phiên làm việc
unset($_SESSION['user']);
unset($_SESSION['ten']);
unset($_SESSION['email']);
unset($_SESSION['pw']);
session_destroy();

// Chuyển hướng
header('location:../index.php?act=index');
exit;
?>
