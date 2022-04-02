<?php
class hoadon{
    function __construct()
    {
        
    }
    public function getListHoaDon()
    {
        $select = "select * from hoadon order by MaHD desc";
        $db = new connect();
        $result = $db->getList($select);
        return $result;
    }
    public function order($mahd)
    {
        $select = "select * from hoadon a INNER JOIN khachhang b on a.MaKH=b.MaKH Where MaHD=$mahd"; 
        $db = new connect();
        $result=$db->getInstance($select);
        return $result;
    }
    public function orderDetail($mahd)
    {
        $select = "select a.MaSP,a.HinhSP,a.TenSP,a.GiaBan,b.DoTuoi,b.soluongdat from sanpham a 
        INNER join cthoadon b on a.MaSP=b.MaSP where b.MaHD=$mahd";
        $db = new connect();
        $result=$db->getList($select);
        return $result;
    }
}
?>