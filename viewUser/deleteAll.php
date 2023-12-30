<?php

function myLoad($tenClass)
{
    include "../db_php/$tenClass.php";
}
spl_autoload_register('myLoad');
$obj = new Payment();

$id = $_GET['id'] ?? '';
$n = $obj->deleteAll($id);
header('location:../index.php?act=cart');
// echo "Da xoa $n book";
// echo "<a href=index.php>Trang chu</a>";