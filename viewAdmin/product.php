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
    <title>Admin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!--Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Data Table-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

  </head>

  <body onload="onPageLoading()" class="hold-transition sidebar-mini">
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

          <!-- SidebarSearch Form -->


          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item" style="background-color: cadetblue;">
                <a href="product.php" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Quản lý sản phẩm
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
              <li class="nav-item">
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

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <div class="container-fluid">
          <div class="row">
            <!-- Add Product Form -->
            <div class="col-md-6">
              <form action="insertProduct.php" method="post">
                <h2>Thêm sản phẩm</h2>
                <label for="add_ten">Tên sản phẩm:</label>
                <input type="text" id="add_ten" name="ten" required>
                <br>
                <label for="add_gia">Giá sản phẩm:</label>
                <input type="text" id="add_gia" name="gia" required>
                <br>
                <label for="add_img">Img sản phẩm:</label>
                <input type="text" id="add_img" name="img" required>
                <br>
                <label>Best Selling: </label>
                <input type="radio" id="add_no" name="bsl" value="0" checked>
                <label for="add_no">No</label>
                <input type="radio" id="add_yes" name="bsl" value="1">
                <label for="add_yes">Yes</label>
                <br>
                <input type="submit" value="Thêm">
              </form>
            </div>

            <!-- Update Product Form -->
            <div class="col-md-6">
              <form action="updateProduct.php" method="post">
                <h2>Sửa sản phẩm</h2>
                <label for="add_ten">ID sản phẩm: </label>
                <input type="text" id="add_ten" name="id" required>
                <br>
                <label for="add_ten">Tên sản phẩm:</label>
                <input type="text" id="add_ten" name="ten" required>
                <br>
                <label for="add_gia">Giá sản phẩm:</label>
                <input type="text" id="add_gia" name="gia" required>
                <br>
                <label for="add_img">Img sản phẩm:</label>
                <input type="text" id="add_img" name="img" required>
                <br>
                <label>Best Selling: </label>
                <input type="radio" id="add_no" name="bsl" value="0" checked>
                <label for="add_no">No</label>
                <input type="radio" id="add_yes" name="bsl" value="1">
                <label for="add_yes">Yes</label>
                <br>
                <input type="submit" value="Sửa">
              </form>
            </div>
          </div>
        </div>

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Quản lý sản phẩm</h1>
              </div>

            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Vouche Data Table -->
          <div class="container-fluid">
            <table class="table table-bordered table-striped table-hover" id="user-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Giá</th>
                  <th>Product_name</th>
                  <th>Product_code / img name</th>
                  <th>Best Selling</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <?php
              function myLoad($tenClass)
              {
                include "../db_php/$tenClass.php";
              }
              spl_autoload_register('myLoad');
              $obj = new Products(); //load Products.php , Db.php
              $data = $obj->all();
              // print_r($data);
              ?>

              <?php
              foreach ($data as $item) {
              ?>
                <tr>
                  <td><?php echo $item['id']; ?></td>
                  <td><?php echo $item['buy_price'] ?></td>
                  <td><?php echo $item['product_name']; ?></td>
                  <td><?php echo $item['product_code']; ?></td>
                  <td>
                    <?php if ($item['product_hot'] == 1) echo "Yes"; ?>
                  </td>
                  <td>
                    <a href="delete.php?id=<?php echo $item['id'] ?>&&product_code=<?php echo $item['product_code'] ?>">Xoa</a>
                  </td>

                </tr>
              <?php } ?>
            </table>
          </div>

      </div>
      <!--code php update -->
      
    </div>

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
      </div>
      <strong>QPFood &copy; 2023-2024 <a href="https://adminlte.io">CEO</a>.</strong> DucQuan - TrongPhuc
    </footer>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="dist/js/product.js"></script>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>

    <!--Bootstrap-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>

  </html>

<?php } else {
  header('location:../index.php?act=signin');
}
?>