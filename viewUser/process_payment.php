<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location:./index.php?act=signin');
} else {
    $ten = $_GET["ten"];
    $duong = $_GET["diachiDuong"];
    $sdt = $_GET["sdt"];
    $quan = $_GET["diachiQuan"];
    $tp = $_GET["diachiTP"];

    // Tạo mã đơn hàng ngẫu nhiên
    $maDonHang = uniqid('DH');
    function myLoad($tenClass)
{
    include "../db_php/$tenClass.php";
}
spl_autoload_register('myLoad');
$obj = new Payment();

$id = $_SESSION['id'];
$n = $obj->deleteAll($id);

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                text-align: center;
                padding: 20px;
            }

            .success-message {
                color: green;
                font-size: 24px;
                font-weight: bold;
            }

            .invoice-details {
                margin-top: 20px;
                padding: 10px;
                border: 1px solid #ddd;
                background-color: #fff;
                max-width: 400px;
                margin-left: auto;
                margin-right: auto;
            }

            .invoice-label {
                font-weight: bold;
                margin-bottom: 5px;
            }

            .invoice-value {
                margin-bottom: 10px;
            }

            /* CSS cho nút "Home" */
            .home-button {
                display: inline-block;
                padding: 10px 20px;
                background-color: #3498db;
                color: #fff;
                text-decoration: none;
                font-weight: bold;
                border-radius: 5px;
                transition: background-color 0.3s ease;
            }

            .home-button:hover {
                background-color: #2980b9;
            }
        </style>
        <title>Invoice Details</title>
    </head>

    <body>
        <div class="success-message">
            Đơn hàng của bạn có mã: <?php echo $maDonHang; ?>
        </div>

        <div class="invoice-details">
            <div class="invoice-label">Chi tiết hóa đơn</div>
            <div class="invoice-label">Mã đơn hàng: <?php echo $maDonHang; ?></div>
            <div class="invoice-value"></div>

            <div class="invoice-label" style="color: red; font-size: xx-large;"> <?php echo $_SESSION['sl']; ?> sản phẩm </div>
            <div class="invoice-value"></div>
            <div class="invoice-label" style="color: red; font-size: xx-large;"> Tổng: <?php echo $_SESSION['gia'] ; ?> VND</div>
            <div class="invoice-value"></div>

            <div class="invoice-label">Tên: <?php echo $ten; ?></div>
            <div class="invoice-value"></div>
            <div class="invoice-label">Số điện thoại: <?php echo $sdt; ?></div>
            <div class="invoice-value"></div>
            <div class="invoice-label">Địa chỉ: <?php echo $duong; ?>, Quận: <?php echo $quan; ?></div>
            <div class="invoice-value"></div>
            <div class="invoice-label"></div>
            <div class="invoice-value"></div>
            <div class="invoice-label">Thành phố: <?php echo $tp; ?></div>
            <div class="invoice-value"></div>


        </div>
        <br>
        <div class="success-message">
            Đơn hàng sẽ được gửi đến bạn sớm nhất
        </div>
        <br>
        <br>
        <a class="home-button" href="../index.php">Home</a>
    </body>

    </html>
<?php } ?>