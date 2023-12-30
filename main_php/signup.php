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

  <!-- food section -->

  <section class="food_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Tải khoản
        </h2>
      </div>
      <form action="../QPFood/main_php/signup.php" class="form-sign-up" method="post">
        <div class="container">
          <h1>Đăng Ký</h1>
          <hr>
          <label for="username"><b>Username</b></label>
          <input id="input-username-sign-up" type="text" placeholder="Nhập User" name="username">
          <label for="email"><b>Email</b></label>
          <input id="input-email-sign-up" type="text" placeholder="Nhập Email" name="email">
          <label for="psw"><b>Mật Khẩu</b></label>
          <input id="input-password-sign-up" type="password" placeholder="Nhập Mật Khẩu" name="pw">
          <label for="psw-repeat"><b>Xác nhận Mật Khẩu</b></label>
          <input id="input-rePassword-sign-up" type="password" placeholder="Nhập Lại Mật Khẩu" name="pw-repeat">
          <div class=" d-flex justify-content-center">
            <div class="signup-section">Bạn đã có tài khoản ? <a href="./index.php?act=signin" id="sign-in-link" class="text-warning"> Đăng nhập ngay</a>.</div>
          </div>
          <div class="clearfix">
            <button type="submit" name="dangky" value="Đăng ký">Sign Up</button>
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
      header('location:../index.php?act=signin');
      //echo "Đăng ký thành công!";
    } catch (PDOException $e) {
      header('location:../index.php?act=signup');
      //echo "Đăng ký không thành công!";
    }

    // Đóng kết nối
    $conn = null;
  }
  ?>
  <!-- Code PHP -->

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-4 footer-col">
          <div class="footer_contact">
            <h4>
              Liên hệ
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Địa chỉ
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Điện thoại +01 1234567890
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  demo@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <div class="footer_detail">
            <a href="" class="footer-logo">
              LotteBee
            </a>
            <span>
              Cảm ơn bạn đã sử dụng dịch vụ của tôi. Tôi luôn sẵn sàng hỗ trợ và giúp đỡ bạn trong mọi thắc mắc và yêu
              cầu. <br> Xin cảm ơn và chúc bạn một ngày tốt lành! <br> Love you &#10084;
            </span>
            <div class="footer_social">
              <a href="">
                <i class="fa fa-facebook" style="color: black;" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-youtube" style="color: black;" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" style="color: black;" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <h4>
            Giờ mở cửa
          </h4>
          <span>
            Hằng ngày
          </span>
          <span>
            09.00 Am -10.00 Pm
          </span>
        </div>
      </div>
      <div class="footer-info">
        <span>
          &copy; <span id="displayYear"></span> LotteBee
          <a href="https://html.design/">&#10084;</a><br><br>
          &copy; <span id="displayYear"></span> Distributed By
          <a href="https://themewagon.com/" target="_blank">HaoNguyen</a>
        </span>
      </div>
    </div>
  </footer>
  <!-- footer section -->

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