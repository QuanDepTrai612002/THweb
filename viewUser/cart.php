<?php
if (!isset($_SESSION['user'])) {
    header('location:./index.php?act=signin');
} else {
?>

    </style>

    <!DOCTYPE html>
    <html>

    <head>
        <style>
            /* Thêm CSS cho hình ảnh */
            .product_code_img {
                width: 2cm;
                /* Đặt kích thước chiều rộng mong muốn */
                height: 2cm;
                /* Tự động tính chiều cao để giữ tỷ lệ khung hình */
                border: 2px solid #333;
                /* Thêm đường viền cho hình ảnh */
            }

            /* Thêm CSS cho bảng */
            table,
            tr,
            td,
            th {
                border: 2px solid white;
            }

            .table-striped {
                border: 2px solid black;
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

        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="css/styleCart.css" rel="stylesheet" />
        <!-- responsive style -->
        <link href="css/responsive.css" rel="stylesheet" />

    </head>

    <body class="sub_page">
        <!-- food section -->
        <section class="food_section layout_padding-bottom mt-5">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        Giỏ hàng
                    </h2>
                </div>
            </div>
            <section class="content">
                <!-- Vouche Data Table -->
                <div class="container-fluid">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr style="background-color: #343a40; color:aliceblue">
                                <th>Tên Khách Hàng</th>
                                <th>Hình ảnh</th>
                                <th>Sản Phẩm</th>
                                <th>Ngày đặt hàng</th>
                                <th>Số Lượng</th>
                                <th>Thành tiền</th>

                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <?php
                        function myLoad($tenClass)
                        {
                            include "./db_php/$tenClass.php";
                        }
                        spl_autoload_register('myLoad');
                        $obj = new Payment(); // Load Products.php , Db.php

                        if (!isset($_SESSION['user_id'])) {
                            $user_id = $_SESSION['id'];
                        } else {
                            $user_id = $_SESSION['user_id'];
                        }
                        $data = $obj->all($user_id);

                        $gioHang = array(); // Mảng lưu trữ thông tin giỏ hàng

                        foreach ($data as $item) {
                            $productCode = $item['product_code'];
                            $price = $obj->giaSP($productCode);

                            if (!isset($gioHang[$productCode])) {
                                // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm mới
                                $gioHang[$productCode] = array(
                                    'image' => '<img class="product_code_img" src="./images/' . $productCode . '.jpg" alt="">',
                                    'productName' => $item['product_name'],
                                    'paymentDate' => $item['payment_date'],
                                    'count' => $item['count'],
                                    'totalPrice' => (int)$price[0]['buy_price'] * $item['count'],
                                    'id' => $item['id'],
                                    'deleteLink' => '<a href="./viewUser/delete.php?id=' . $item['id'] . '">Xoa</a>',
                                );
                            } else {
                                // Nếu sản phẩm đã tồn tại trong giỏ hàng, tăng số lượng
                                $gioHang[$productCode]['count'] += $item['count'];
                                $gioHang[$productCode]['totalPrice'] += (int)$price[0]['buy_price'];
                            }
                        }

                        $gia = 0; // Tổng giá tiền
                        ?>


                        <tr>
                            <th rowspan="<?php echo $a = (count($gioHang) + 1); ?>" style="vertical-align: middle; text-align: center;"><?php echo $_SESSION['user']; ?></th>
                        </tr>
                        <?php foreach ($gioHang as $item) : ?>
                            <tr>
                                <th><?php echo $item['image']; ?></th>
                                <th><?php echo $item['productName']; ?></th>
                                <th><?php echo $item['paymentDate']; ?></th>
                                <th>
                                    <form action="./viewUser/addCartUpdate.php" method='post'>
                                        <input type='number' name='quantity' value='<?php echo $item['count']; ?>' />
                                        <input type='hidden' name='product_code' value='<?php echo $item['id']; ?>' />
                                        <input type='submit' name='update_cart' value='Update' />
                                    </form>
                                </th>
                                <th><?php
                                    $gia += $item['totalPrice'];
                                    echo $item['totalPrice'] . '<sup>' . ' VND' . '</sup>';
                                    ?></th>
                                <th><?php echo $item['deleteLink']; ?></th>
                            </tr>
                        <?php endforeach; ?>


                        <!-- Hiển thị tổng giá tiền -->
                    </table>
                </div>
                <div class="container clearfix1">
                    <div class="right">
                        <?php if (($_SESSION['sl'] == 0)) {
                        } else {
                            echo '<a href="./viewUser/deleteAll.php?id=' . $user_id . '">Xóa tất cả</a>';
                        } ?>
                    </div>
                </div>
            </section>
            <footer id="site-footer">
                <div class="container clearfix1">
                    <div class="right">
                        <h1 class="subtotal">Tổng Cộng: <span><b><?php echo $_SESSION['sl'] ?></span> SP</b></h1>
                        <h1 class="subtotal">Tổng thanh toán: <span><b><?php $_SESSION['gia']=$gia; echo $_SESSION['gia'] ?></span> vnd</b></h1>
                        <?php if (($_SESSION['sl'] == 0)) {
                        } else {
                            echo '<a href="index.php?act=thanhtoan" class="btn1">Thanh Toán</a>';
                        } ?>
                    </div>
                </div>
            </footer>
            </div>


        </section>

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
                                Cảm ơn bạn đã sử dụng dịch vụ của tôi. Tôi luôn sẵn sàng hỗ trợ và giúp đỡ bạn trong mọi thắc mắc và yêu cầu. <br> Xin cảm ơn và chúc bạn một ngày tốt lành! <br> Love you &#10084;
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
        <!-- custom js -->
        <script src="js/custom.js"></script>
        <!--cart js-->
        <script src="js/cart.js"></script>
        <!-- Google Map -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
        </script>
        <!-- End Google Map -->

    </body>

    </html>

<?php } ?>