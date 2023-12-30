<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy giá trị từ form
    $id = $_POST['id'];
    $ten = $_POST['ten'];
    $gia = $_POST['gia'];
    $img = $_POST['img'];

    // Kiểm tra xem role đã được chọn hay chưa

    $bsl = $_POST['bsl'];

    $servername = "localhost";
    $username = "root";
    $database = "fastfood";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert values into the product table
        $updateStmt = $conn->prepare("UPDATE product 
                                            SET product_name = :ten, buy_price = :gia, product_hot = :bsl,product_code = :img 
                                            WHERE id=:id");

        // Assuming that 'product_code' is the unique identifier for your products. 
        // You may need to adjust it based on your actual database schema.

        $updateStmt->bindParam(':ten', $ten);
        $updateStmt->bindParam(':gia', $gia);
        $updateStmt->bindParam(':bsl', $bsl);
        $updateStmt->bindParam(':img', $img);
        $updateStmt->bindParam(':id', $id);

        // Thực thi truy vấn INSERT
        $updateStmt->execute();

        // // Lấy ID của bản ghi mới được thêm vào
        // $newUserId = $conn->lastInsertId();

        // // Bạn có thể sử dụng $newUserId theo cách bạn muốn, ví dụ: hiển thị thông báo thành công
        // echo "Dữ liệu đã được thêm vào với ID: " . $newUserId;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        // Đóng kết nối
        $conn = null;
    }
    header("Location:../viewAdmin/product.php");
    exit();
} else {
    // Nếu không phải là phương thức POST, có thể xử lý khác tùy thuộc vào yêu cầu của bạn
    // Ví dụ: chuyển hướng hoặc hiển thị thông báo lỗi
}
?>

<!--code php update -->