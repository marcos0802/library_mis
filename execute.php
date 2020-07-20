<!-- Include Header -->
<?php include 'app/header.php'; ?>

<!-- Links Controller -->
<?php
switch ($_GET['request']):
  case 'Dashboard':    include 'app/dashboard.php';    break;
  case 'NewUser':      include 'app/new_user.php';    break;
  case 'ListUser':      include 'app/list_users.php';    break;
  case 'Students':      include 'app/students.php';    break;
  case 'Category':      include 'app/category.php';    break;
  case 'NewBook':      include 'app/new_book.php';break;
  case 'Available':      include 'app/available_books.php';break;
  case 'Widthdraw':      include 'app/widthdraw.php';break;
  case 'NewWidthdraw':      include 'app/new_widthdraw.php';break;
  case 'Settings':     include 'app/settings.php';     break;
  default:             include 'app/dashboard.php';    break;
endswitch;
?>

<!-- Include Header -->
<?php include 'app/footer.php'; ?>
