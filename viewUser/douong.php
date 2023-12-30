<!DOCTYPE html>
<html>

<head>
  <style>
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

 /* Thêm CSS cho hình ảnh */
.table-cell img {
    width: 320px;
    height: 200px; /* Đặt chiều cao cố định */
    object-fit: cover; /* Giữ tỷ lệ khung hình và cắt ảnh để vừa vào khung */
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
  <!-- offer section -->
 
  <!-- end offer section -->

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
        <li><a href="index.php?act=bsl">Best Selling!!!</a></li>
        <li><a href="index.php?act=banhmi">Bánh mì</a></li>
        <li><a href="index.php?act=garan">Gà rán</a></li>
        <li><a href="index.php?act=burger">Burger</a></li>
        <li><a href="index.php?act=douong"><b>Đồ uống</b></a></li>
      </ul>


      <?php
      function myLoad($tenClass)
      {
        include "db_php/$tenClass.php";
      }
      spl_autoload_register('myLoad');
      $obj = new Products(); //load Products.php , Db.php
      $data = $obj->productType("nuoc");
      ?>

      <?php
     if (!isset($_SESSION['id'])) {
      $_SESSION['id'] = 0;
    }
    echo '<div class="table-row">';
    foreach ($data as $item) {
      echo '<div class="table-cell">'
        . '<p>' . '<img src="' . "images/" . $item["product_code"] . '">' . '</p>'
        . '<h1>' . '<b>' . $item["product_name"] . '</b>' . '</h1>'
        . '<h2>' . $item["buy_price"] . '<sup>' . " VND" . '</sup>' . '</h2>'
        . '<form action="./viewUser/addCart.php?pd_c='
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

  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container  ">

      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="images/about-img1.png" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                We Are QPFood
              </h2>
            </div>
            <p>
              Hệ thống QPFood cung cấp nhiều loại đồ ăn phong phú, từ bánh mì, cà phê đến các món ăn nhanh khác, đáp ứng được nhu cầu của khách hàng ở mọi lứa tuổi. QPFood cam kết sử dụng nguyên liệu tươi sạch, được kiểm soát chất lượng nghiêm ngặt để đảm bảo sức khỏe cho người tiêu dùng. Với sự phát triển liên tục và mở rộng quy mô, QPFood là địa chỉ tin cậy cho thực khách trong việc tìm kiếm các sản phẩm ăn uống chất lượng và tiện lợi.
            </p>
            <a href="">
              Đọc thêm
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- book section -->
  <section class="book_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Booking Online
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <form action="">
              <div>
                <input type="text" class="form-control" placeholder="Your Name" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Phone Number" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Your Email" />
              </div>
              <div>
                <input type="date" class="form-control">
              </div>
              <div class="btn_box">
                <button>
                  Đặt món ngay
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="map_container ">
            <div id="googleMap"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end book section -->

  <!-- client section -->

  <section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center psudo_white_primary mb_45">
        <h2>
          Đánh giá của khách hàng
        </h2>
      </div>
      <div class="carousel-wrap row ">
        <div class="owl-carousel client_owl-carousel">

          <div class="item">
            <div class="box">
              <div class="detail-box">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                </p>
                <h6>
                  Moana Michell
                </h6>
                <p>
                  magna aliqua
                </p>
              </div>
              <div class="img-box">
                <img src="images/client1.jpg" alt="" class="box-img">
              </div>
            </div>
          </div>

          <div class="item">
            <div class="box">
              <div class="detail-box">
                <p>
                  Không còn từ nào để chê <br>
                  Perfect! <br>
                  Amazing gut chop!
                </p>
                <h6>
                  QuanTuesday
                </h6>
                <p>
                  Sài Gòn <b> quận 8 </b>, che đi những cơn bão.
                </p>
              </div>
              <div class="img-box">
                <img src="images/client3.jpg" alt="" class="box-img">
              </div>
            </div>
          </div>

          <div class="item">
            <div class="box">
              <div class="detail-box">
                <p>
                  Bạn có tài mà <br>
                  hãy ăn để sống cho hết đời thanh xuân <br>
                  Tuyệt!
                </p>
                <h6>
                  PhucWednesday
                </h6>
                <p>
                  Sài Gòn <b> quận Bình Tân </b>, che đi những cơn bão.
                </p>
              </div>
              <div class="img-box">
                <img src="images/client4.JPEG" alt="" class="box-img">
              </div>
            </div>
          </div>

          <div class="item">
            <div class="box">
              <div class="detail-box">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                </p>
                <h6>
                  Mike Hamell
                </h6>
                <p>
                  magna aliqua
                </p>
              </div>
              <div class="img-box">
                <img src="images/client2.jpg" alt="" class="box-img">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end client section -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
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
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>