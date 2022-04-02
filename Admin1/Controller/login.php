<?php
$action="login";
if(isset($_GET['act']))
{
    $action=$_GET['act'];
}
switch ($action) {
    case 'login':
        include "view/login.php";
        break;
    
    case 'login_action':
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $txtuser=$_POST['username'];
            $txtpass=$_POST['password'];
            $mahoa=md5($txtpass);
            $dt = new Login();
            $result=$dt->logAdmin($txtuser,$mahoa);
            if($result!=false)
            {
                // $_SESSION['admin']=$result[0];
                echo '<script>alert("Đăng Nhập thành công ");</script>>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sanpham&act=dashboard"/>';
            }
            else{
                echo '<script>alert("Đăng Nhập Thất Bại");</script>';
                include "View/login.php";
            }
        }
        break;
}
?>