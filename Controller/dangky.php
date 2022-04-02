<?php
$action="dangky";
if(isset($_GET['act']))
{
    $action=$_GET['act'];
}
switch ($action) {
    // case 'value':
    //     include "View/dangky.php";
    //     break;
    case "dangky_action":
        $tenkh=$_POST['txtHoTen'];
        $dienthoai=$_POST['txtDienThoai'];
        $diachi=$_POST['txtDiaChi'];
        $email=$_POST['txtEmail'];
        // $username=$_POST['txtusername'];
        $password=$_POST['txtPassword'];
        $ctypt=md5($password);
        $dt=new User();
        $dt->insertUser($tenkh,$dienthoai,$email,$ctypt,$diachi);
        echo '<script> alert("đăng ký thành công");</script>';
        // đăng ký thành công quay về trang chủ 
        include "View/home.php";
        break;
}
?>