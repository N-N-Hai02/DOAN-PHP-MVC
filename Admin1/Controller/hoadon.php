
<?php
include "View/menu.php";
$action="hoadon";
if(isset($_GET['act']))
{
    $action=$_GET['act'];
}
switch ($action) {
    case 'list_order':
        include "View/order/order.php";
        break;
    case 'chitiet':
        include "View/order/order_details.php";
        break;
}
?>