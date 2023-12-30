<?php
session_start();
ob_start();
//unset($_SESSION['admin']);
if (isset($_SESSION['admin'])) {
  //echo "xin chao " . ($_SESSION['admin']);
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <style>
      form {
        width: 400px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      label {
        display: block;
        margin-bottom: 5px;
      }

      /* Hiệu chỉnh cho radio và label */
      input[type="radio"] {
        margin-right: 5px;
        /* Khoảng cách giữa radio và label */
      }

      /* Hiệu chỉnh cho button */
      input[type="submit"] {
        width: 100%;
        /* Rộng 100% để nằm giữa khung */
        margin-top: 10px;
        /* Khoảng cách giữa button và các input */
        background-color: #4CAF50;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }

      input[type="submit"]:hover {
        background-color: #45a049;
      }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Blank Page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

  </head>

  <body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
      <!-- Navbar -->
      
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="../index.php" class="brand-link">
          <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">QPFood</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="dist/img/client3.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block"><?php echo $_SESSION['admin']; ?></a>
            </div>
          </div>
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <a href="unset_ss.php" class="d-block">
                <img src="dist/img/thoat.png" class="img-circle elevation-2" alt="User Image">
              </a>
            </div>
            <div class="info">
              <a href="unset_ss.php" class="d-block">Thoat</a>
            </div>
          </div>

          <!--  -->

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item">
                <a href="product.php" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Quản lý Sản phẩm
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="order.php" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Quản lý đơn hàng
                  </p>
                </a>
              </li>
              <li class="nav-item" style="background-color: cadetblue;">
                <a href="user.php" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Quản lý người dùng
                  </p>
                </a>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>
      <div class="content-wrapper">
        <!-- sửa quyền truy cập -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Sửa quyền truy cập admin - user</h1>
              </div>
            </div>
          </div>
        </section>

        <form action="user.php" method="post">
          <label for="user_id">User ID:</label>
          <input type="text" id="user_id" name="user_id" required>
          <br>
          <label>Thay đổi quyền truy cập: </label>
          <input type="radio" id="user" name="role" value="0" checked>
          <label for="user">User</label>
          <input type="radio" id="admin" name="role" value="1">
          <label for="admin">Admin</label>
          <br>
          <input type="submit" value="Submit">
        </form>

        <!-- Content Wrapper. Contains page content -->

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Quản lý Người Dùng</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Blank Page</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Update User Admin -->


        <!-- Main content -->
        <section class="content">
          <!-- Vouche Data Table -->
          <div class="container-fluid">
            <table class="table table-bordered table-striped table-hover" id="user-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Tên</th>
                  <th>Address</th>
                  <th>Email</th>
                  <th>UserName</th>
                  <th>Admin</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <?php
              function myLoad($tenClass)
              {
                include "../db_php/$tenClass.php";
              }
              spl_autoload_register('myLoad');
              $obj = new Login(); //load Products.php , Db.php
              $data = $obj->all();
              // print_r($data);
              ?>

              <?php
              foreach ($data as $item) {
              ?>
                <tr>
                  <td><?php echo $item['id']; ?></td>
                  <td><?php echo $item['ten'] ?></td>
                  <td><?php echo $item['address']; ?></td>
                  <td><?php echo $item['email']; ?></td>
                  <td><?php echo $item['username']; ?></td>
                  <td><?php if ($item['role'] == 1) echo "Admin"; ?></td>
                  <td>
                    <a href="delete.php?id=<?php echo $item['id'] ?>&&username=<?php echo $item['username'] ?>">Xoa</a>
                  </td>

                </tr>
              <?php } ?>

            </table>
          </div>
      </div>

      <!--code php update -->
      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy giá trị từ form
        $user_id = $_POST['user_id'];

        // Kiểm tra xem role đã được chọn hay chưa
        if (isset($_POST['role'])) {
          $role = $_POST['role'];

          $servername = "localhost";
          $username = "root";
          $database = "fastfood";


          try {
            $conn = new PDO("mysql:host=$servername;dbname=$database", $username);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Update the count column in the payment table
            $updateStmt = $conn->prepare("UPDATE users SET role = :role WHERE id = :user_id");

            // Gán giá trị cho các tham số
            $updateStmt->bindParam(":role", $role);
            $updateStmt->bindParam(":user_id", $user_id);

            // Thực thi truy vấn INSERT
            $updateStmt->execute();
          } catch (PDOException $e) {
            echo "Thêm không thành công: " . $e->getMessage();
          } finally {
            // Đóng kết nối
            $conn = null;
          }
          header("Location: " . $_SERVER['PHP_SELF']);
          exit(); // Đảm bảo chương trình dừng sau khi header
          //header("location:../index.php?act=cart");

          // // In ra thông tin để kiểm tra
          // echo "User ID: " . $user_id . "<br>";
          // echo "Access Level: " . $role . "<br>";

          // Tiếp tục xử lý dữ liệu hoặc chuyển hướng người dùng
        } else {
          // Nếu role không được chọn, có thể xử lý khác tùy thuộc vào yêu cầu của bạn
          echo "Vui lòng chọn Access Level";
        }
      } else {
        // Nếu không phải là phương thức POST, có thể xử lý khác tùy thuộc vào yêu cầu của bạn
        // Ví dụ: chuyển hướng hoặc hiển thị thông báo lỗi
      }
      ?>

      <!--code php update -->

    </div>

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
      </div>
      <strong>QPFood &copy; 2023-2024 <a href="https://adminlte.io">CEO</a>.</strong> DucQuan - TrongPhuc
    </footer>



    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
  </body>

  </html>
<?php } else {
  header('location:../index.php?act=signin');
}
?>