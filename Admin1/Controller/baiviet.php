
<?php
include "View/menu.php";
$action = "baiviet";
if (isset($_GET['act'])) {
    $action = $_GET['act'];
}
switch ($action) {
        // danh mục bài viết
    case 'add_category_post':
        include "View/post/add_category.php";
        break;
    case 'list_category_post':
        include "View/post/list_category.php";
        break;
    case 'update_DMBV':
        include "View/post/edit_category.php";
        break;
        // Bài Viết
    case 'add_post':
        include "View/post/add_post.php";
        break;

    case 'list_post':
        include "View/post/list_post.php";
        break;
    case 'update_BV':
        include "View/post/edit_post.php";
        break;

    // Post.
    case 'insert_post':
        $TenBV = $_POST['TenBV'];
        $NoiDung = $_POST['NoiDung'];

        $AnhBV = $_FILES['AnhBV']['name'];
        $image_tmp = $_FILES['AnhBV']['tmp_name'];
        move_uploaded_file($image_tmp, 'Content/image/post/' . $AnhBV);
        file_exists('Content/image/post/' . $AnhBV);

        $MaDMBV = $_POST['DMBV'];

        $db = new baiviet();
        $db->inserPost($TenBV, $NoiDung, $AnhBV, $MaDMBV);
        echo '<script> alert("Thêm Bài Viết thành công");</script>';
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=baiviet&act=list_post"/>';
        break;

    case 'update_post':
        if (isset($_POST['MaBV'])) {
            $MaBV = $_POST['MaBV'];
            $db = new baiviet();
            $TenBV = $_POST['TenBV']; // Sửa Tên
            $NoiDung = $_POST['NoiDung'];
            $AnhBV = $_FILES['AnhBV']['tmp_name']; // sửa ảnh
            if ($_FILES['AnhBV']['name'] == "") {
                $allpost = $db->Allpost();
                while ($set = $allpost->fetch()) :
                    $AnhBV = $set['AnhBV'];
                endwhile;
            } else {
                $AnhBV = $_FILES['AnhBV']['name'];
                $image_tmp = $_FILES['AnhBV']['tmp_name'];
                move_uploaded_file($image_tmp, 'Content/image/post/' . $AnhBV);
                file_exists('Content/image/post/' . $AnhBV);
            }
            $MaDMBV = $_POST['DMBV'];

            $db->updatePost($MaBV, $TenBV, $NoiDung, $AnhBV, $MaDMBV);
            echo '<script> alert("Cập Nhật Bài Viết thành công");</script>';
        }
        include "View/post/list_post.php";
        break;
    case 'delete_BV':
        if (isset($_GET['id'])) {
            $MaBV = $_GET['id'];
            $sp = new baiviet();
            $sp->deleteBv($MaBV);
        }
        include "View/post/list_post.php";
        break;
    // category
    case 'insert_category_post':
        $TenDMBV = $_POST['TenDMBV'];
        $MoTaDMBV = $_POST['MoTaDMBV'];

        $db = new baiviet();
        $db->inserCategoryPost($TenDMBV, $MoTaDMBV);
        echo '<script> alert("Thêm danh mục BV thành công");</script>';
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=baiviet&act=list_category_post"/>';
        break;
    case 'update_category_post':
        if (isset($_POST['MaDMBV'])) {
            $MaDMBV = $_POST['MaDMBV'];
            $db = new baiviet();
            $TenDMBV = $_POST['TenDMBV']; // Sửa Tên danh mục bài Viết
            $MoTaDMBV = $_POST['MoTaDMBV']; // Sửa mô tả danh mục bài Viết

            $db->updateCategoryPost($MaDMBV, $TenDMBV , $MoTaDMBV);
            echo '<script> alert("Cập Nhật danh mục Bài Viết Thành Công");</script>';
        }
        include "View/post/list_category.php";
        break;
    case 'delete_category_post':
        if (isset($_GET['id'])) {
            $MaDMBV = $_GET['id'];
            $sp = new baiviet();
            $sp->deleteDMBV($MaDMBV);
        }
        include "View/post/list_category.php";
        break;
}
?>