<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="">

  <title> LotteBee </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!--toastr-->
  <link rel="stylesheet" href="plugins/toastr.min.css">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">

  <!-- food section -->
  <!-- header section strats -->
  <header class="header_section">
    <div class="container-fluid fixed-top" style="background-color: #222831;">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.php">
          <span>
            QPfood
          </span>
        </a>
      </nav>
    </div>
  </header>
  <br>
  <section class="food_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Tải khoản
        </h2>
      </div>
      <form action="../QPFood/main_php/login.php" class="form-sign-in" method="post">
        <div class="container">
          <h1> Đăng Nhập</h1>
          <hr>
          <label for="email"><b>Username</b></label>
          <input id="input-username-sign-in" type="text" placeholder="Nhập Username" name="username">
          <label for="psw"><b>Mật Khẩu</b></label>
          <input id="input-password-sign-in" type="password" placeholder="Nhập Mật Khẩu" name="pw">
          <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Nhớ Đăng Nhập
          </label>
          <div class=" d-flex justify-content-center">
            <div class="signup-section">Bạn chưa phải là thành viên ? <a href="./index.php?act=signup" id="sign-up-link" class="text-warning"> Đăng ký ngay</a>.</div>
          </div>
          <div class="clearfix">
            <button type="submit" name="dangnhap" value="Đăng nhập">Sign In</button>
          </div>
        </div>
      </form>
    </div>
  </section>
  <!-- Code PHP -->
  <?php

  $servername = "localhost";
  $username = "root";
  $database = "fastfood";

  // Kiểm tra xem form đã được gửi đi hay chưa
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy giá trị từ form
    $user = $_POST["username"];
    $pw = $_POST["pw"];

    // Tạo kết nối đến cơ sở dữ liệu
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$database", $username);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo "Kết nối thất bại: " . $e->getMessage();
      exit();
    }

    //Thực hiện truy vấn SELECT
    $stmt = $conn->query("SELECT id,email,ten,username, password,role FROM users WHERE username='$user' AND password='$pw'");
    // Lấy kết quả trả về dưới dạng mảng kết hợp
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //var_dump($results);
    if (empty($results)) {
      header('location:../index.php?act=signin');
    } else {
      //Duyệt qua các kết quả
      foreach ($results as $row) {
        if (($row['username']) == $user && ($row['password']) == $pw && $row['role'] == 1) {

          //$ss = $row['username'];
          $_SESSION['admin'] = $user;
          header('location:../viewAdmin/user.php');
          break;
        }
        if (($row['username']) == $user && ($row['password']) == $pw && $row['role'] == 0) {
          $_SESSION['user'] = $user;
          $_SESSION['pw'] = $pw;

          $_SESSION['ten'] = $row['username'];
          $_SESSION['email'] = $row['email'];
          $_SESSION['id'] = $row['id'];
          //echo $_SESSION['id'];
          header('location:../index.php');
          break;
        }
      }
    }

    // Đóng kết nối
    $conn = null;
  }
  ?>
  <!-- Code PHP -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>

  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <!--toast-->
  <script src="plugins/toastr.min.js"></script>

  <script src="js/signin.js"></script>

  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>