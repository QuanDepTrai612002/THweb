<?php
if (!isset($_SESSION['user'])) {
  header('location:./index.php?act=signin');
} else {

?>
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
    

    
    <section class="food_section layout_padding-bottom">
    <div class="container">
      <div class="container">
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-6 border-right" >
                    <div class="d-flex flex-column align-items-center text-center">  
                        <img class="rounded-circle mt-5" width="150px" src="https://w7.pngwing.com/pngs/81/570/png-transparent-profile-logo-computer-icons-user-user-blue-heroes-logo-thumbnail.png">
                        <span id="show-username" class="font-weight-bold"><?php echo $_SESSION['user'] ?></span>
                        <span id="show-email" class="text-black-50"><?php echo $_SESSION['email'] ?></span>
                    </div>
                </div>
                <div class="info col-md-6 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <p class="text-right" style="font-size: 30px;">Hồ sơ của tôi</p>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="labels">Tên</label>
                                <input id="info-fname" type="text" class="form-control" value="<?php echo $_SESSION['ten']?>">
                            </div>
                  
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Username</label>
                                <input disabled id="info-username" type="text" class="form-control" value="<?php echo $_SESSION['user']?>">
                            </div>
                            <div class="col-md-12">
                              <label class="labels">Email</label>
                              <input id="info-email" type="text" class="form-control" value="<?php echo $_SESSION['email']?>">
                            </div>    
                            <div class="col-md-12">
                              <label class="labels">Số điện thoại</label>
                              <input id="info-phone-number" type="number" class="form-control" placeholder="Nhập số điện thoại" value="">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Địa chỉ</label>
                                <input id="info-address" type="text" class="form-control" placeholder="Nhập địa chỉ" value="">
                            </div>
                            <div class="col-md-12">
                              <label class="labels">Quận</label>
                              <input id="info-state" type="text" class="form-control" placeholder="Nhập quận" value="">
                            </div>   
                            <div class="col-md-12">
                                <label class="labels">Thành phố</label>
                                <input disabled id="info-city" type="text" class="form-control"  value="Hồ Chí Minh">
                            </div>   
                                             
                          </div>
                        <!-- <div class="mt-5 text-center">
                            <button id="update-info-user" class="btn btn-primary profile-button" type="button">Cập nhật thông tin</button>
                        </div> -->
                    </div>
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

<?php } ?>