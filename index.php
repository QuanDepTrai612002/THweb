<?php

if (isset($_GET['act'])) {
  switch ($_GET['act']) {
    case 'thucdon':
    case 'bsl':
      include "viewUser/header.php";
      include "viewUser/thucdon.php";
      break;
    case 'banhmi':
      include "viewUser/header.php";
      include "viewUser/banhmi.php";
      break;
    case 'douong':
      include "viewUser/header.php";
      include "viewUser/douong.php";
      break;
    case 'garan':
      include "viewUser/header.php";
      include "viewUser/garan.php";
      break;
    case 'burger':
      include "viewUser/header.php";
      include "viewUser/burger.php";
      break;
    case 'signin':
      //include "viewUser/header.php";
      include "main_php/login.php";
      break;
    case 'signup':
      include "viewUser/header.php";
      include "main_php/signup.php";
      break;
    case 'profile':
      include "viewUser/header.php";
      include "viewUser/profile.php";
      break;
    case 'cart':
      include "viewUser/header.php";
      include "viewUser/cart.php";
      break;
      case 'thanhtoan':
        include "viewUser/header.php";
        include "viewUser/thanhtoan.php";
        break;
      case 'process_payment':
          include "viewUser/header.php";
          include "viewUser/process_payment.php";
          break;
    default:
      include "viewUser/header.php";
      include "viewUser/section.php";
      break;

  }
} else {
  include "viewUser/header.php";
  include "viewUser/section.php";
}

include "viewUser/footer.php";
