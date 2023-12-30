<?php
session_start();

$servername = "localhost";
$username = "root";
$database = "fastfood";

$product_code = $_GET['pd_c'];
$product_name = $_GET['pd_n'];
$user_id = $_GET['ss_id'];
$dateNow = date('Y-m-d H:i:s'); // Đổi 'NOW()' thành giá trị thời gian thực sự

$_SESSION['sl'] = 0;


if ($user_id == 0) {
    header("location:../index?act=signin");
} else {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Chuẩn bị truy vấn INSERT
        $stmt = $conn->prepare("INSERT INTO payment ( product_code, payment_date, product_name, user_id) 
                            VALUES ( :product_code, :dateNow, :product_name, :user_id)");

        // Gán giá trị cho các tham số
        $stmt->bindParam(":user_id", $user_id);
        $stmt->bindParam(":product_code", $product_code);
        $stmt->bindParam(":dateNow", $dateNow);
        $stmt->bindParam(":product_name", $product_name);

        // Thực thi truy vấn INSERT
        $stmt->execute();

        // Update the count column in the payment table
        $updateStmt = $conn->prepare("UPDATE payment SET count = 1 WHERE product_code = :product_code");

        // Gán giá trị cho các tham số
        $updateStmt->bindParam(":product_code", $product_code);

        // Thực thi truy vấn INSERT
        $updateStmt->execute();

        // Lấy số lượng
        $selectStmt = $conn->query("SELECT count(count) FROM `payment` WHERE user_id=$user_id GROUP BY user_id");
        // Lấy kết quả trả về dưới dạng số
        $sl = $selectStmt->fetchColumn();
        //gán cho session
        $_SESSION['sl'] = $sl;
        $_SESSION['user_id']=$user_id;
    } catch (PDOException $e) {
        echo "Thêm không thành công: " . $e->getMessage();
    } finally {
        // Đóng kết nối
        $conn = null;
    }
    header("location:../index.php?act=thucdon");
}
