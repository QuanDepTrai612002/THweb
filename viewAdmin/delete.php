<?php

// include 'class/Db.php';
// include 'class/Book.php';
function myLoad($tenClass)
{
    include "../db_php/$tenClass.php";
}
spl_autoload_register('myLoad');
$obj = new Products(); //load Products.php , Db.php

$id = $_GET['id'] ?? '';
$username = $_GET['username'];
$product_code = $_GET['product_code'];

if (isset($username)) {
    $n = $obj->deleteUser($id);
    header('location:./user.php');
}
if (isset($product_code)) {
    $n = $obj->deleteProduct($id);
    header('location:./product.php');
}