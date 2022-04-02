<?php
$action = "giohang";
//kiểm tra có giở hangfhay không không có thì tạo
if(!isset($_SESSION['Cart_petStore']))
{
    $_SESSION['Cart_petStore']=array();
}
if(isset($_GET['act']))
{
    $action = $_GET['act'];
}
switch($action) 
{
    case 'giohang':
        include 'View/cart.php';
        break;
    case "add_cart";
        // truyền dữ liệu qua bằng phuong thức POST
        $MaSP=$_POST['masp'];
        $soluong=$_POST['soluong'];
        $age = $_POST['Age'];
        add_item($MaSP,$soluong,$age);
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang&act=giohang"/>';
        break;
    case "delete_item":
        if(isset($_GET['id']))
        {
            $mah=$_GET['id'];
            echo $mah;
            unset($_SESSION['Cart_petStore'][$mah]);
        }
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang&act=giohang"/>';
        break;
    case "update_SP":
        $newsl=$_POST['N_qty'];
        foreach($newsl as $key=>$qty)
        {
            if($_SESSION['Cart_petStore'][$key]['qty']!=$qty)
            {
                update_item($key,$qty);
            }
        }
        $newAge=$_POST['N_Age'];
        foreach($newAge as $key=>$Ag)
        {
            if($_SESSION['Cart_petStore'][$key]['Tuoi']!=$Ag)
            {
                update_item1($key,$Ag);
            }
        }
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang&act=giohang"/>';
        break;
}
?>