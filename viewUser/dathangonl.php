<?php
  $servername = "localhost";
  $username = "root";
  $database = "fastfood";

  // Kiểm tra xem form đã được gửi đi hay chưa
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy giá trị từ form
    $user = $_POST["username"];
    $pw = $_POST["pw"];
    //$pw_repeat = $_POST["pw_repeat"];

    // Tạo kết nối đến cơ sở dữ liệu
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$database", $username);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo "Kết nối thất bại: " . $e->getMessage();
      exit();
    }

    // Chuẩn bị truy vấn INSERT
    $stmt = $conn->prepare("INSERT INTO users (password,username) VALUES (:pw,:username)");

    // Gán giá trị cho các tham số
    $stmt->bindParam("username", $user);
    $stmt->bindParam(':pw', $pw);

    //Thực thi truy vấn
    try {
      $stmt->execute();
      header('location:../index.php?act=burger');
      //echo "Đăng ký thành công!";
    } catch (PDOException $e) {
      header('location:../index.php?act=garan');
      //echo "Đăng ký không thành công!";
    }

    // Đóng kết nối
    $conn = null;
  }
  ?>