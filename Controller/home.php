<?php
$actions = "home";
if (isset($_GET['act'])) {
    $actions = $_GET['act'];
}
switch ($actions) {
    case 'home':
        include "View/home.php";
        break;
    case 'dmsp':
        include "View/categoryproduct.php";
        break;
    case 'dmBV':
        include "View/categorypost.php";
        break;
    case 'sanphammoi':
        include "View/product_hot.php";
        break;
    case 'product':
        include "View/list_product.php";
        break;
    case 'post':
        include "View/list_post.php";
        break;
    case 'detail':
        include "View/details_product.php";
        break;
    case 'detailsPost':
        include "View/details_post.php";
        break;
    case 'cart':
        include "View/cart.php";
        break;
    case "tiemkiem":
        include "View/list_product.php";
        break;
    case "comment":
        $MaSP = $_POST['txtmahh'];
        $Noidung = $_POST['comment'];
        $MaKH = $_SESSION['MaKH'];
        // đem toàn bộ cái mà lấy về insert vô database
        $u = new User();
        $u->insertComment($MaSP,$MaKH,$Noidung);
        include "View/details_product.php";
        break;
}
