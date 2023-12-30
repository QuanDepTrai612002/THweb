<?php
session_start();
ob_start();
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

    .table-row {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      /* 3 cột với tỷ lệ tự động */
      grid-gap: 100px;
      /* Khoảng cách giữa các cột */
    }

    .table-cell {
      text-align: center;
      background-color: #222831;
      border-radius: 20px;
      /*border-radius: 10%; */
    }

    .table-cell button {
      border-radius: 60%;
      width: 80px;
      padding: 5px;
      background-color: #ffc107;
    }

    .table-cell h2 {
      color: aliceblue;
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

    .table-cell button:hover {
      transform: scale(1.1);
      transition: 1s;
    }

    .ofer_container_header {
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
  <link rel="shortcut icon" href="../images/favicon.png">

  <title> QPFood </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="../css/font-awesome.min.css" rel="stylesheet" />
  <!--toastr-->
  <link rel="stylesheet" href="plugins/toastr.min.css">
  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="../css/responsive.css" rel="stylesheet" />

</head>

<body>
  <div class="hero_area">
    <header class="header_section">
      <div class="container-fluid fixed-top" style="background-color: #222831;">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="../index.php">
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
                <a class="nav-link" href="../index.php">Trang chủ </a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="../index.php?act=thucdon">Thực đơn <span class="sr-only">(current)</span> </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../about.html">Giới thiệu</a>
              </li>
            </ul>
            <div class="user_option">
              <?php
              if (isset($_SESSION['user'])) {
                echo '<a href="../index.php?act=profile" id="user_link">' . $_SESSION['user'] . ',' . '</a>';
              } else {
                echo '<a href="../index.php?act=signin" id="user_link">
                      <i class="fa fa-user" aria-hidden="true"></i>
                      </a>';
              }
              ?>

              <a href="../index.php?act=cart" class="cart">
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
                <form action="./timkiem.php" method="post">
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
              }
              ?>
            </div>
          </div>
        </nav>
      </div>
    </header>

    <!-- food section -->
    <br>
    <section class="food_section layout_padding-bottom">
      <div class="container">
        <div class="ofer_container_header">
          <h1>
            <b>Thực đơn</b>
          </h1>
        </div>
        <ul class="filters_menu">
          <li><a href="../index.php?act=bsl">Best Selling!!!</a></li>
          <li><a href="../index.php?act=banhmi">Bánh mì</a></li>
          <li><a href="../index.php?act=garan">Gà rán</a></li>
          <li><a href="../index.php?act=burger">Burger</a></li>
          <li><a href="../index.php?act=douong">Đồ uống</a></li>
        </ul>


        <?php
        function myLoad($tenClass)
        {
          include "../db_php/$tenClass.php";
        }
        spl_autoload_register('myLoad');

        $obj = new Products(); //load Products.php , Db.php
        $timkiem = $_POST['timkiem'];
        $data = $obj->search($timkiem);
        ?>

        <?php
        if (!isset($_SESSION['id'])) {
          $_SESSION['id'] = 0;
        }
        echo '<div class="table-row">';
        foreach ($data as $item) {
          echo '<div class="table-cell">'
            . '<p>' . '<img src="' . "../images/" . $item["product_code"] . '.jpg">' . '</p>'
            . '<h1>' . '<b>' . $item["product_name"] . '</b>' . '</h1>'
            . '<h2>' . $item["buy_price"] . '<sup>' . " VND" . '</sup>' . '</h2>'
            . '<form action="../viewUser/addCart.php?pd_c='
            . $item["product_code"] . '&&pd_n=' . $item["product_name"] . '&&ss_id=' . $_SESSION['id']
            . '" method="post"><button>Thêm</button></form>'
            . ' </div>';
        }
        echo '</div>';
        ?>

        <div class="btn-box">
          <a href="./index.php?act=thucdon">
            View More
          </a>
        </div>
      </div>
    </section>

    <!-- end food section -->
    <!-- jQery -->
    <script src="../js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <!-- bootstrap js -->
    <script src="../js/bootstrap.js"></script>
    <!--toast-->
    <script src="plugins/toastr.min.js"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
    <!-- nice select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
    <!-- custom js -->
    <script src="../js/custom.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    <!-- End Google Map -->

</body>

</html>