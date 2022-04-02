
<?php
include "View/menu.php";
$action = "sanpham";
if (isset($_GET['act'])) {
    $action = $_GET['act'];
}
switch ($action) {
    case 'dashboard':
        include "View/dashboard.php";
        break;
        // danh mục sản phẩm
    case 'add_category':
        include "View/product/add_category.php";
        break;
    case 'list_category':
        include "View/product/list_category.php";
        break;
    case 'update_DMSP':
        include "View/product/edit_category.php";
        break;
        // Sản Phẩm 
    case 'add_product':
        include "View/product/add_product.php";
        break;
    case 'list_product':
        include "View/product/list_product.php";
        break;
        // Update SP
    case 'update_SP':
        include "View/product/edit_product.php";
        break;

    //product
    case 'insert_product':
        $TenSP = $_POST['TenSP'];
        $GiaBan = $_POST['GiaBan'];
        $SoLuong = $_POST['Soluong'];

        $hinh = $_FILES['HinhSP']['name'];
        $image_tmp = $_FILES['HinhSP']['tmp_name'];
        move_uploaded_file($image_tmp, 'Content/image/' . $hinh);
        file_exists('Content/image/' . $hinh);
        $MoTa = $_POST['MoTaSP'];
        $MaDMSP = $_POST['DMSP'];
        $SPMoi = $_POST['SanPhamMoi'];

        $db = new sanpham();
        $db->inserProduct($TenSP, $GiaBan, $MoTa, $SoLuong, $hinh, $MaDMSP, $SPMoi);
        echo '<script> alert("Thêm Sản Phẩm thành công");</script>';
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sanpham&act=list_product"/>';
        break;
    case 'update_product':
        if (isset($_POST['MaSP'])) {
            $MaSP = $_POST['MaSP'];
            $db = new sanpham();
            // $db->getListID($MaSP);
            $TenSP = $_POST['TenSP']; // Sửa Tên
            $GiaBan = $_POST['GiaBan'];
            $SoLuong = $_POST['Soluong'];

            $hinh = $_FILES['HinhSP']['tmp_name']; // sửa ảnh
            if ($_FILES['HinhSP']['name'] == "") {
                $allprod = $db->Allproduct();
                while ($set = $allprod->fetch()) :
                    $hinh = $set['HinhSP'];
                endwhile;
            } else {
                $hinh = $_FILES['HinhSP']['name'];
                $image_tmp = $_FILES['HinhSP']['tmp_name'];
                move_uploaded_file($image_tmp, 'Content/image/' . $hinh);
                file_exists('Content/image/' . $hinh);
            }

            $MoTa = $_POST['MoTaSP']; // Sửa mô tả
            $MaDMSP = $_POST['DMSP'];
            $SPMoi = $_POST['SanPhamMoi'];

            $db->updateProduct($MaSP, $TenSP, $GiaBan, $MoTa, $SoLuong, $hinh, $MaDMSP, $SPMoi);
            echo '<script> alert("Cập Nhật thành công");</script>';
        }
        include "View/product/list_product.php";
        break;
    case 'delete_product':
        if (isset($_GET['id'])) {
            $MaSP = $_GET['id'];
            $sp = new sanpham();
            $sp->deleteSP($MaSP);
        }
        include "View/product/list_product.php";
        break;
    // category
    case 'insert_category_product':
        $TenDMSP = $_POST['TenDMSP'];
        $MoTaDMSP = $_POST['MoTaDMSP'];

        $db = new sanpham();
        $db->inserCategoryProduct($TenDMSP, $MoTaDMSP);
        echo '<script> alert("Thêm danh mục Sản Phẩm thành công");</script>';
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sanpham&act=list_category"/>';
        break;
    case 'update_category_product':
        if (isset($_POST['MaDMSP'])) {
            $MaDMSP = $_POST['MaDMSP'];
            $db = new sanpham();
            $TenDMSP = $_POST['TenDMSP']; // Sửa Tên danh mục sản phẩm
            $MoTaDMSP = $_POST['MoTaDMSP']; // Sửa mô tả danh mục sản phẩm

            $db->updateCategoryProduct($MaDMSP, $TenDMSP, $MoTaDMSP);
            echo '<script> alert("Cập Nhật danh mục SP thành công");</script>';
        }
        include "View/product/list_category.php";
        break;
    case 'delete_category_product':
        if (isset($_GET['id'])) {
            $MaDMSP = $_GET['id'];
            $sp = new sanpham();
            $sp->deleteDMSP($MaDMSP);
        }
        include "View/product/list_category.php";
        break;
}
?>
