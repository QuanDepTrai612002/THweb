<?php
if ($_SESSION['sl'] == 0) {
  header('location:./index.php?act=index');
} else {
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

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- nice select  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!--toastr-->
    <link rel="stylesheet" href="plugins/toastr.min.css">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />

  </head>

  <body class="sub_page">

    <!-- payment section -->
    <section class="food_section layout_padding-bottom mt-5">
      <div class="container form_payment">
        <h1 style="text-align: center;">Thông tin thanh toán</h1>
        <hr>
        <div class="row">
          <div class="col-75 " style="border: solid;">
            <div class="container ">

              <form action="./viewUser/process_payment.php">
                <div class="row">
                  <div class="col-50">
                    <h3>Thông tin khách hàng</h3>
                    <label for="fname"><i class="fa fa-user"></i> Họ và tên</label>
                    <input type="text" id="full-name-info" name="ten" placeholder="Nguyễn Văn A">
                    <label for="email"><i class="fa fa-envelope"></i> Số điện thoại</label>
                    <input type="text" id="email-info" name="sdt" placeholder="09xxx">
                    <label for="adr"><i class="fa fa-address-card-o"></i> Địa chỉ</label>
                    <input type="text" id="address-info" name="diachiDuong" placeholder="542 Tran Hung Dao">
                    <label for="adr"><i class="fa fa-address-card-o"></i> Quận</label>
                    <input type="text" id="address-info" name="diachiQuan" placeholder="Quận 1">
                    <label for="adr"><i class="fa fa-address-card-o"></i> Thành Phố</label>
                    <input type="text" id="address-info" name="diachiTP" value="Hồ Chí Minh">
                  </div>

                  <!-- <div class="col-50">
                    <h3>Phương thức thanh toán</h3>
                    <label for="fname-card">Chấp nhận các loại thanh toán</label>
                    <div class="icon-container">
                      <i class="fa fa-cc-visa" style="color:navy;"></i>
                      <i class="fa fa-cc-amex" style="color:blue;"></i>
                      <i class="fa fa-cc-mastercard" style="color:red;"></i>
                      <i class="fa fa-cc-discover" style="color:orange;"></i>
                    </div>
                    <label for="nameCard">Chọn thẻ</label>
                    <select id="select-cart">
                      <option value="">--Vui lòng chọn ngân hàng--</option>
                      <option value="tcb">Ngân hàng Techcombank</option>
                      <option value="tpb">Ngân hàng TpBank</option>
                      <option value="agr">Ngân hàng Agribank</option>
                    </select><br> <br>
                    <label for="cname">Tên chủ thẻ</label>
                    <input type="text" id="name-card" name="cardname" placeholder="Nguyen Van A">
                    <label for="ccnum">Số thẻ</label>
                    <input type="text" id="num-card" name="cardnumber" placeholder="1111-2222-3333-4444">
                    <label for="expmonth">Hạn sử dụng</label>
                    <input type="text" id="expmonth-card" name="expmonth" placeholder="Thang 7">
                  </div> -->
                </div>
                <button type="submit"><a id="button-payment">Đặt hàng</a></button>
              </form>

            </div>
          </div>
          <div class="col-25">
            <div class="container show-order">
              <!-- <div class="row">
              <div class="col-6"><h6><b>Tên</b></h6></div>
              <div class="col-4"><h6><b>Số lượng</b></h6></div>
              <div class="col-2"><h6><b>Giá</b></h6></div>
            </div>
            <div class="row">
              <div class="col-6"><p>Bánh mì chả lụa</p></div>
              <div class="col-4"><p>2</p></div>
              <div class="col-2"><p>30000</p></div>
            </div>
            
            <hr>
            <div class="row">
              <div class="col-6"><p>Tổng tiền:</p></div>
              <div class="col-6"><b>30000 Vnd</b></div>
            </div> -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end payment section -->

    <!-- footer section -->

    <!-- footer section -->

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
    <!--payment-->
    <script src="js/payment.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    <!-- End Google Map -->

  </body>

  </html>

<?php } ?>