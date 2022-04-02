<?php
class order{
    var $mahd = null;
    var $ngaydat = null;
    var $makh = null;
    var $tongtien = 0;
    var $masp = null;
    public function __construct()
    {
        
    }
    // thực hiện phương thức insert vào bảng hoadon1
    public function insertOrder($makh)
    {
        date_default_timezone_set('asia/ho_chi_minh');
        $ngay=date("d/m/Y - h:i:sa");
        $query="insert into hoadon(MaHD,NgayDatHang,MaKH,TongTien)values(Null,'$ngay',$makh,0)";
        $db=new connect();
        $db->exec($query);
        // lúc này đã chèn vào đc database
        // lấy ra mã số hóa đơn vừa chèn vào
        $select="select MaHD from hoadon order by MaHD DESC limit 1";
        $mahd=$db->getInstance($select);//$sohd[44]
        return $mahd[0];//44
    }
    // phương thức insert vào bảng chitiethd
    public function insertOrderDetail($mahd,$maS,$solm,$thanhtien,$dotuoi)
    {
        $query="insert into cthoadon(MaHD,MaSP,soluongdat,ThanhTien,DoTuoi,TinhTrangDat)values($mahd,$maS,$solm,$thanhtien,'$dotuoi',0)";
        $db=new connect();
        $db->exec($query);
    }
    function updateOrderTotal($sohdid,$total)
    {
        $query="update hoadon set TongTien=$total where MaHD=$sohdid";
        $db = new connect();
        $db->exec($query); 
    }
    //hiển thị lên hóa đơn
    public function order($mahd)
    {
        $select = "select a.MaHD,a.NgayDatHang,b.TenKH,b.DiaChi,b.SDTKH 
        from hoadon a INNER JOIN khachhang b on a.MaKH=b.MaKH Where MaHD=$mahd"; 
        $db = new connect();
        $result=$db->getInstance($select);
        return $result;
    }
    public function orderDetail($mahd)
    {
        $select = "select a.TenSP,a.GiaBan,b.DoTuoi,b.soluongdat from sanpham a 
        INNER join cthoadon b on a.MaSP=b.MaSP where b.MaHD=$mahd";
        $db = new connect();
        $result=$db->getList($select);
        return $result;
    }
}
?>