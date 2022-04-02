<?php
    //lớp giổ hàng này không tọa lớp.
    function add_item($MaSP,$quantity,$age)
    {

        //Thêm mặt hàng giống vậy vào thì sẽ được update lại.
        if(isset($_SESSION['Cart_petStore'][$MaSP]))
        {
            $quantity+=$_SESSION['Cart_petStore'][$MaSP]['qty'];
            update_item($MaSP,$quantity);
            return;
        }
        // thêm vào giỏ hàng.
        $pros = new SanPham();
        $pro = $pros->ChiTietSP($MaSP);
        $cost = $pro['GiaBan'];
        $ten = $pro['TenSP'];
        $hinh = $pro['HinhSP'];
        $total = $quantity * $cost;
        $item=array(
            'ma'=>$MaSP,
            'hinh'=>$hinh,
            'name'=>$ten,
            'cost'=>$cost,
            'qty'=>$quantity,
            'Tuoi'=>$age,
            'total'=>$total
        );
        $_SESSION['Cart_petStore'][$MaSP]=$item;
    }
    // phương thức tính tổng thành tiền 
    function get_subtotal()
    {
        $tong=0;
        foreach($_SESSION['Cart_petStore'] as $item)
        {
            $tong+=$item['total'];
        }
        $tong = number_format($tong,2);
        return $tong;
    }

    function update_item($MaSP,$quantity)
    {
        $_SESSION['Cart_petStore'][$MaSP]['qty']=$quantity;
        $totalnew=$_SESSION['Cart_petStore'][$MaSP]['qty']*$_SESSION['Cart_petStore'][$MaSP]['cost'];// 5 * 600000
        $_SESSION['Cart_petStore'][$MaSP]['total']=$totalnew;
    }
    function update_item1($MaSP,$age)
    {
        $_SESSION['Cart_petStore'][$MaSP]['Tuoi']=$age;
    }
?>