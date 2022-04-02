<?php
    include "Model/connect.php";
    include "Model/SanPham.php";
    include "Model/user.php";
    include "Model/BaiViet.php";
    include "Model/giohang.php";
    include "Model/order.php";
    include "Model/menu.php";
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Pet Store - Pet Store</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="cleartype" content="on" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" />
    
    <!-- end link đăng nhập -->
    <link rel="stylesheet" type="text/css" href="Content/CSS/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="Content/CSS/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="Content/CSS/product.css">    
    <link rel="stylesheet" type="text/css" href="Content/CSS/style.css">
    <link rel="stylesheet" href="Content/CSS/cssfooter.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script defer type="text/javascript" src="Content/js/bootstrap.js"></script>
    <script defer type="text/javascript" src="Content/js/sweet-alert.js"></script>
    <script defer type="text/javascript" src="Content/js/jquery.flexslider-min.js"></script>
    <script defer src="Content/js/owl.carousel.js" type="text/javascript"></script>
    <script defer src="Content/js/jquery.lazyload.min.js" type="text/javascript"></script>
    <script defer type="text/javascript" src="Content/js/script_ex.js"></script>
    <script defer type="text/javascript" src="Content/js/script_menu.js"></script>
    <title>SanPham</title>
</head>
<body>
    <!-- header -->
    <?php
        include "View/header.php";
        // include "View/slider.php";
    ?>
      <div class="container">
          <div class="row">
              <!-- Hiển thị Nội Dung -->
              <?php
                $ctrl ="home";
                // $_GET['action'='home','act'='sanpham']
                if(isset($_GET['action']))
                {
                    $ctrl=$_GET['action'];//gán cho --> home (controller)
                }
                include "Controller/".$ctrl.".php";
              ?>
          </div>
      </div>
   <!-- footer -->
   <?php
        include "View/footer.php";
    ?>
    <?php
    // session_unset();
    ?>
</body>

</html>