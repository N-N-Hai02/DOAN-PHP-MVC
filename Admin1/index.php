<?php
include "Model/connect.php";
include "Model/login.php";
include "Model/sanpham.php";
include "Model/baiviet.php";
include "Model/hoadon.php";
include "Model/menu.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- link đăng nhập -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- link đăng nhập -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- end -->
    <!-- end link đăng nhập -->
    <link rel="stylesheet" type="text/css" href="../Content/CSS/Tour.css" />
    <title>Admin Pet_Store</title>
</head>

<body>
    <!-- Thanh header tao menu -->
    <?php
    include "View/header.php";
    ?>
    <!-- end hinh dong -->
    <!-- phan thân -->
    <div class="container">
        <div class="row">
            <?php
            //load controler
            $ctrl = "login";
            if (isset($_GET['action']))
                $ctrl = $_GET['action'];
            include 'Controller/' . $ctrl . '.php';
            // include 'Controller/'.$ctrl.'.php'; 

            //end controller

            ?>
        </div>
        <!-- end menu right -->
    </div>
    <!-- footer -->
    <?php
    include "View/footer.php"
    ?>
    <!-- end footer -->
</body>
</html>