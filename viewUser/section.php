<!DOCTYPE html>
<html>

<head>
  <style>
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
    <div class="bg-box">
      <img src="images/bg3.jpg" alt="">
    </div>
    <!-- header section strats -->
    <!-- slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                      Đồ ăn nhanh QPFood
                    </h1>
                    <p>
                      QPFood là cửa hàng đồ ăn nhanh chất lượng, đa dạng sản phẩm và phục vụ nhanh chóng, thuận tiện cho khách hàng. Với đội ngũ nhân viên nhiệt tình và thân thiện, QPFood cam kết mang đến cho khách hàng những trải nghiệm mua sắm và ẩm thực tuyệt vời nhất. Hãy ghé thăm QPFood ngay hôm nay để thưởng thức các món ăn ngon và độc đáo của chúng tôi!
                    </p>
                    <div class="btn-box">
                      <a href="index.php?act=thucdon" class="btn1">
                        Đặt món ngay !!!
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                      Mục tiêu của QPFood
                    </h1>
                    <p>
                      Với mục tiêu trở thành địa điểm mua sắm và thưởng thức đồ ăn nhanh hàng đầu, QPFood luôn cập nhật những sản phẩm mới và đa dạng, từ bánh mì, bánh ngọt đến thức uống và các loại snack hấp dẫn. Chúng tôi cam kết sử dụng nguyên liệu tươi sạch và tuân thủ nghiêm ngặt các tiêu chuẩn vệ sinh an toàn thực phẩm để mang đến cho khách hàng những món ăn ngon và đảm bảo sức khỏe.
                    </p>
                    <div class="btn-box">
                      <a href="index.php?act=thucdon" class="btn1">
                        Đặt món ngay !!!
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                      Đặc điểm QPFood
                    </h1>
                    <p>
                      QPFood không chỉ là địa điểm để mua sắm và thưởng thức đồ ăn nhanh mà còn là một không gian tiện nghi và thoải mái để thư giãn cùng bạn bè và gia đình. Với kiến trúc hiện đại và trang thiết bị tiện nghi, chúng tôi đảm bảo mang đến cho khách hàng không gian thư giãn và ấm cúng nhất. Bên cạnh đó, chúng tôi cũng có dịch vụ giao hàng tận nơi nhanh chóng và tiện lợi cho khách hàng không có thời gian đến cửa hàng. Hãy ghé thăm QPFood và tận hưởng trải nghiệm mua sắm và thưởng thức đồ ăn nhanh tuyệt vời nhất!
                    </p>
                    <div class="btn-box">
                      <a href="index.php?act=thucdon" class="btn1">
                        Đặt món ngay !!!
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <ol class="carousel-indicators">
            <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
            <li data-target="#customCarousel1" data-slide-to="1"></li>
            <li data-target="#customCarousel1" data-slide-to="2"></li>
          </ol>
        </div>
      </div>

    </section>
    <!-- end slider section -->
  </div>

  <!-- offer section -->

  <section class="offer_section layout_padding-bottom">
    <div class="ofer_container_header">
      <h1><b>Voucher</b></h1>
    </div>
    <div class="offer_container">
      <div class="container ">
        <div class="row">
          <div class="col-md-6  ">
            <div class="box ">
              <div class="img-box">
                <img src="images/offer1.jpg" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Gà Rán
                </h5>
                <h6>
                  Giảm đến <span>20%</span>
                </h6>
                <a href="index.php?act=garan" class="btnbuy fa fa-shopping-cart"></a>
              </div>
            </div>
          </div>
          <div class="col-md-6  ">
            <div class="box ">
              <div class="img-box">
                <img src="images/offer2.jpg" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Bánh Mì
                </h5>
                <h6>
                  Giảm đến <span>10%</span>
                </h6>
                <a href="index.php?act=banhmi" class="btnbuy fa fa-shopping-cart"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end offer section -->

  <!-- food section -->

  <section class="food_section layout_padding-bottom">
    <div class="container">
      <div class="ofer_container_header">
        <h1>
          <b>Thực đơn</b>
        </h1>
      </div>
      <ul class="filters_menu">
        <li><a href="index.php?act=bsl"><b>Best Selling!!!</b></a></li>
        <li><a href="index.php?act=banhmi">Bánh mì</a></li>
        <li><a href="index.php?act=garan">Gà rán</a></li>
        <li><a href="index.php?act=burger">Burger</a></li>
        <li><a href="index.php?act=douong">Đồ uống</a></li>
      </ul>


      <?php
      function myLoad($tenClass)
      {
        include "db_php/$tenClass.php";
      }
      spl_autoload_register('myLoad');
      $obj = new Products(); //load Products.php , Db.php
      $data = $obj->productHot();
      // print_r($data);
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
            <img src="../images/about-img1.png" alt="">
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
            <a href="./about.html">
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
            <form action="dathangonl.php">
              <div>
                <input type="text" class="form-control" placeholder="Your Name (*)" name="ten" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Phone Number (*)" name="sdt" />
              </div>

              <div>
                <label for="city">Tỉnh/Thành phố: (*)</label>
                <select name="city" class="form-control">
                  <option value="tphcm">TP.HCM</option>
                </select>
                <select name="quan" class="form-control">
                  <option value="q1">Quận 1</option>
                  <option value="q2">Quận 2</option>
                  <option value="q3">Quận 3</option>
                  <option value="q4">Quận 4</option>
                  <option value="q5">Quận 5</option>
                  <option value="q6">Quận 6</option>
                  <option value="q7">Quận 7</option>
                  <option value="q8">Quận 8</option>
                </select>
              </div>
              <div>
                <input type="text" placeholder=" Địa chị cụ thể: số nhà, đường, phường" />
              </div>
              <div class="btn_box">
                <button type="submit">
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