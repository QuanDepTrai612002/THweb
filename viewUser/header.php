<?php
ob_start();
session_start();
if (!isset($_SESSION['sl'])) {
  $_SESSION['sl'] = 0;
} else {

  $servername = "localhost";
  $username = "root";
  $database = "fastfood";
  $user_id = $_SESSION['id'];

  $conn = new PDO("mysql:host=$servername;dbname=$database", $username);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $selectStmt = $conn->query("SELECT sum(count) FROM `payment` WHERE user_id=$user_id GROUP BY user_id");
  // Lấy kết quả trả về dưới dạng số
  $sl = $selectStmt->fetchColumn();
  //gán cho session
  $_SESSION['sl'] = $sl;
}
?>

<!DOCTYPE html>
<html>

<head>
  <style>
    .cart {
      position: relative;
    }

    .countcart {
      background-color: red;
      color: white;
      border-radius: 60%;
      /* Để tạo hình tròn nếu bạn muốn */
      padding: 3px 6px;
      /* Điều chỉnh khoảng cách và độ rộng của phần padding */
      position: absolute;
      top: -8px;
      /* Điều chỉnh vị trí lên trên theo ý muốn */
      right: -8px;
      /* Điều chỉnh vị trí qua phải theo ý muốn */
      font-size: 10px;
      /* Điều chỉnh kích thước chữ số */
      z-index: 2;
      /* Đặt thứ bậc cao hơn để hiển thị trên đầu icon giỏ hàng */
    }

    .table-cell img {
      width: 320px;
      height: 200px;
      /* Đặt chiều cao cố định */
      object-fit: cover;
      /* Giữ tỷ lệ khung hình và cắt ảnh để vừa vào khung */
      background-color: white;
      border-radius: 40px;
      /* Giá trị mặc định cho các góc */
      border-top-left-radius: 0;
      /* Đặt giá trị 0 cho góc trên bên trái */
      border-top-right-radius: 0;
      border-bottom-right-radius: 0;
    }


    #overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 9999;
    }

    #searchBoxContainer {
      display: none;
      position: fixed;
      top: 20px;
      right: 20px;
      background-color: #fff;
      padding: 10px;
      z-index: 10000;
    }

    .table,
    tr,
    td,
    th {
      border: 2px solid red;
      padding: 10px;
      text-align: center;
    }
  </style>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png">

  <title> QPFood </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="./css/bootstrap.css" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="./css/font-awesome.min.css" rel="stylesheet" />
  <!--toastr-->
  <link rel="stylesheet" href="plugins/toastr.min.css">
  <!-- Custom styles for this template -->
  <link href="./css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="./css/responsive.css" rel="stylesheet" />

</head>

<body>
  <!-- header section strats -->
  <header class="header_section">
    <div class="container-fluid fixed-top" style="background-color: #222831;">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.php">
          <span>
            QPfood
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  mx-auto ">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Trang chủ </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="index.php?act=thucdon">Thực đơn <span class="sr-only">(current)</span> </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">Giới thiệu</a>
            </li>
          </ul>
          <div class="user_option">
            <?php
            if (isset($_SESSION['user'])) {
              echo '<a href="./index.php?act=profile" id="user_link">' . $_SESSION['user'] . '   ' . '</a>';
            } else {
              echo '<a href="./index.php?act=signin" id="user_link">
                      <i class="fa fa-user" aria-hidden="true"></i>
                      </a>';
            }
            ?>

            <a href="./index.php?act=cart" class="cart">
              <i class="fa fa-shopping-basket" aria-hidden="true"></i>
              <i class="countcart">
                <?php echo $_SESSION['sl'] ?>
              </i>
            </a>

            <button onclick="showSearchBox()" class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
              <i class="fa fa-search" aria-hidden="true"></i>
            </button>

            <div id="overlay" style="display: none;"></div>
            <div id="searchBoxContainer" style="display: none;">
              <form action="viewUser/timkiem.php" method="post">
                <input style="width: 200px;" type="text" placeholder="Nhập từ khóa" name="timkiem">
                <button style="width: 100px;" type="submit" name="tim">Tìm</button>
              </form>
            </div>


            <script>
              function showSearchBox() {
                var overlay = document.getElementById("overlay");
                var searchBoxContainer = document.getElementById("searchBoxContainer");
                overlay.style.display = "block";
                searchBoxContainer.style.display = "block";
              }
            </script>


            <?php
            if (isset($_SESSION['user'])) {
              echo '<a href="viewUser/thoat.php" class="order_online">Thoát </a>';
            } else {
              echo '<a href="index.php" class="order_online"></a>';
            }
            ?>

          </div>
        </div>
      </nav>
    </div>
  </header>