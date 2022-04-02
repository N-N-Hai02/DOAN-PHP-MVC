<?php
include "View/menu.php";
$action = "menu";
if (isset($_GET['act'])) {
    $action = $_GET['act'];
}
switch ($action) {
    case 'add_menu':
        include "View/menu/add_menu.php";
        break;
    case 'list_menu':
        include "View/menu/list_menu.php";
        break;
    case 'update_menu':
        include "View/menu/edit_menu.php";
        break;
    case 'insert_menu':
        $Ten_Menu = $_POST['Ten_Menu'];
        $DuongDan = $_POST['Link_DuongDan'];

        $db = new menu();
        $db->insert_menu($Ten_Menu, $DuongDan);
        echo '<script> alert("Thêm Menu thành công");</script>';
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=menu&act=list_menu"/>';
        break;
    case 'update_menu_form':
        if (isset($_POST['Ma_menu'])) {
            $Ma_menu = $_POST['Ma_menu'];
            $db = new menu();
            $Ten_menu = $_POST['Ten_menu']; // Sửa Tên danh mục bài Viết
            $Duong_dan = $_POST['Duong_dan']; // Sửa mô tả danh mục bài Viết

            $db->update_menu($Ma_menu, $Ten_menu, $Duong_dan);
            echo '<script> alert("Cập Nhật menu Thành Công");</script>';
        }
        include "View/menu/list_menu.php";
        break;
    case 'delete_menu':
        if (isset($_GET['id'])) {
            $MaMenu = $_GET['id'];
            $Menu = new menu();
            $Menu->delete_menu($MaMenu);
        }
        include "View/menu/list_menu.php";
        break;
}
