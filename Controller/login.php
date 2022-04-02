<?php
$action="login";
if(isset($_GET['act']))
{
    $action=$_GET['act'];//login_action
}
switch($action) 
{
    case 'login':
        include "View/customer_login.php";
        break;
    case "login_action":
        //gửi thông tin về action thì $_POST=array('txtusername'='hai'.....)
        $user=$_POST['username'];
        $matkhau=$_POST['password'];
        $crypt=md5($matkhau);
        $dt=new User();
        $u=$dt->loginUser($user, $crypt);
        // session là : Lưa lại mọi hoạt dộng của người đặng nhập,là phiên làm việc cho từng khách đăng nhập
        if($u !='false')
        {
            $_SESSION['MaKH'  ]=$u[0];
            $_SESSION['TenKH' ]=$u[1];
            $_SESSION['SDTKH' ]=$u[2];
            $_SESSION['Mail_KH']=$u[3];
            $_SESSION['MatKhau']=$u[4];
            $_SESSION['DiaChi']=$u[5];
            echo '<script> alert ("đăng nhập thành công")</script>';
            // include "View/home.php";
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home&act=cart"/>';
        }
        break;
    case "log_out":
        // hàm unset : là loại v=bỏ 1 biến hoạc biến đực truyền vào và nó cũng có thể sử dụng để loại bỏ 1 phần tử xác ddingj trong mảng
        // cú pháp : unset(var $a);
        //lưu ý : Nếu 1 biến toàn cục bị unset trong một hàn nào đó thì biến đó sẽ bij loại trong phạm vi hàm đó , để xóa biến toàn cục ta sử dụng mảng $Globals
        if(isset($_SESSION['MaKH']))
        {
            unset($_SESSION['MaKH'   ]);
            unset($_SESSION['TenKH'  ]);
            unset($_SESSION['SDTKH'  ]);
            unset($_SESSION['Mail_KH']);
            unset($_SESSION['MatKhau']);
            unset($_SESSION['DiaChi' ]);
        }
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home&act=home"/>';
        break;
}
?>