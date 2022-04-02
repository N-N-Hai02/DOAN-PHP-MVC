<?php
$action="order";
if(isset($_GET['act']))
{
    $actions=$_GET['act'];
}
switch($action){
    case "order":
        // thực hiện việc là insert vào bảng hóa đơn
        // masohd,makh,ngaydat,tongtien
        if(isset($_SESSION['MaKH']))
        {
            $makhang=$_SESSION['MaKH'];//8
            $hd=new order();
            $sohdid=$hd->insertOrder($makhang);//$sohdid=44
            $_SESSION['sohd']=$sohdid;
            // đem những món hàng trong giỏ hàng chèn vào bảng cthoadon
            $total=0;
            foreach($_SESSION['Cart_petStore'] as $key=>$item)
            {
                $hd->insertOrderDetail($sohdid,$item['ma'],$item['qty'],$item['total'],$item['Tuoi']);
                $total+=$item['total'];// tính tổng thành tiền
            }
            // sau đó đem tổng thành tiền update vào bảng hoadon1
            $hd->updateOrderTotal($sohdid,$total);
           
        }
        include "View/order.php"; 
        break;
    case 'XemDonHang':
        include "View/order_details.php";
        break;
}
?>