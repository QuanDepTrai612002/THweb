
   <?php

   $product_code= $_GET['pd_c'];
      function myLoad($tenClass)
      {
        include "../db_php/$tenClass.php";
      }
      spl_autoload_register('myLoad');
      $obj = new Products(); //load Products.php , Db.php
      //$data = $obj->productType("bread");
      $data = $obj->search1("$product_code");
      // print_r($data);
      ?>

      <?php
      if (!isset($_SESSION['id'])) {
        $_SESSION['id'] = 0;
      }
      echo '<div class="table-row">';
      foreach ($data as $item) {
        echo '<div class="table-cell">'
          . '<p>' . '<img src="' . "../images/" . $item["product_code"] . '">' . '</p>'
          . '<h1>' . '<b>' . $item["product_name"] . '</b>' . '</h1>'
          . '<h2>' . $item["buy_price"] . '<sup>' . " VND" . '</sup>' . '</h2>'
          . '<h3>' . $item["product_description"] . '</h3>'
          . '<form action="./viewUser/addCart.php?pd_c='
          . $item["product_code"] . '&&pd_n=' . $item["product_name"] .$item["product_description"]. '&&ss_id=' . $_SESSION['id']
          . '" method="post"><button>Thêm</button></form>'
          . ' </div>';
      }
      echo '</div>';
      ?>