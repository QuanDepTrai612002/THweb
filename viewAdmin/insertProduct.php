<?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy giá trị từ form
        $ten = $_POST['ten'];
        $gia = $_POST['gia'];
        $img = $_POST['img'];

        // Kiểm tra xem role đã được chọn hay chưa
        if (isset($_POST['bsl'])) {
          $bsl = $_POST['bsl'];

          $servername = "localhost";
          $username = "root";
          $database = "fastfood";

          try {
            $conn = new PDO("mysql:host=$servername;dbname=$database", $username);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Insert values into the product table
            $insertStmt = $conn->prepare("INSERT INTO product (product_name, product_code, buy_price, product_hot) 
                                          VALUES (:ten, :img, :gia, :bsl)");

            // Gán giá trị cho các tham số
            $insertStmt->bindParam(":ten", $ten);
            $insertStmt->bindParam(":img", $img);
            $insertStmt->bindParam(":gia", $gia);
            $insertStmt->bindParam(":bsl", $bsl);

            // Thực thi truy vấn INSERT
            $insertStmt->execute();

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
          // Nếu role không được chọn, có thể xử lý khác tùy thuộc vào yêu cầu của bạn
          echo "Vui lòng chọn Access Level";
        }
      } else {
        // Nếu không phải là phương thức POST, có thể xử lý khác tùy thuộc vào yêu cầu của bạn
        // Ví dụ: chuyển hướng hoặc hiển thị thông báo lỗi
      }
      ?>

      <!--code php update -->