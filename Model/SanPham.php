<?php
class SanPham{
    // THuộc Tính 
    var $MaSP = 0;
    var $TenSP = null;
    var $GiaBan=0;
    var $MoTa=NULL;
    var $SoLuong=0;
    var $Hinh=Null;
    var $MaDMSP=0;
    var $SPMoi = 0;
    // Hàm Tạo 
    public function __construct(){

    }
    public function sanphammoi()
    {
        //câu lệnh Truy Vấn
        $select="select * from sanpham where SanPhamMoi=1 ORDER BY sanpham.MaSP desc;";
        $db = new connect();
        $results=$db->getList($select);
        return $results;
    }
    public function sanphammoi_home()
    {
        //câu lệnh Truy Vấn
        $select="select * from sanpham where SanPhamMoi=1 ORDER BY sanpham.MaSP desc limit 10;";
        $db = new connect();
        $results=$db->getList($select);
        return $results;
    }

    public function danhMucSanPham()
    {
        //câu lệnh Truy Vấn
        $select="select * FROM danhmucsp ORDER BY MaDMSP ASC;";
        $db = new connect();
        $results=$db->getList($select);
        return $results;
    }
    public function DMSP_id_home($MaDMSP)
    {
        //câu lệnh Truy Vấn
        $select="SELECT * FROM danhmucsp dm,sanpham sp WHERE dm.MaDMSP=sp.MaDMSP AND sp.MaDMSP=$MaDMSP ORDER BY sp.MaSP DESC";
        $db = new connect();
        $results=$db->getInstance($select);
        return $results;
    }
    public function ChiTietSP($MaSP)
    {
        $select = "SELECT * FROM sanpham WHERE MaSP=$MaSP";
        $db=new connect();
        $results=$db->getInstance($select);
        return $results;
    }
    public function update_SL($MaSP) 
    {
        $select = "UPDATE sanpham SET luotxem=luotxem+1 WHERE MaSP=$MaSP";
        $db=new connect();
        $db->exec($select);
        // $results=$db->getListP($select);
        // $results->execute();
    }
    public function AllSanPham()
    {
        //câu lệnh Truy Vấn
        $select = "SELECT * FROM sanpham sp ORDER BY sp.MaSP DESC";
        $db = new connect();
        $results=$db->getList($select);
        return $results;
    }
    public function AllSanPham_home1()
    {
        $select = "SELECT * FROM sanpham WHERE MaDMSP = 34 ORDER BY sanpham.MaSP DESC  LIMIT 5";
        // ai thực hiện câu truy vấn này query
        $db=new connect();
        $results=$db->getList($select);
        return $results;
    }
    public function AllSanPham_home2()
    {
        $select = "SELECT * FROM sanpham WHERE MaDMSP = 35 ORDER BY sanpham.MaSP DESC  LIMIT 5";
        // ai thực hiện câu truy vấn này query
        $db=new connect();
        $results=$db->getList($select);
        return $results;
    }
    public function AllSanPham_home3()
    {
        $select = "SELECT * FROM sanpham WHERE MaDMSP = 36 ORDER BY sanpham.MaSP DESC  LIMIT 5";
        // ai thực hiện câu truy vấn này query
        $db=new connect();
        $results=$db->getList($select);
        return $results;
    }
    public function AllSanPham_home4()
    {
        $select = "SELECT * FROM sanpham WHERE MaDMSP = 37 ORDER BY sanpham.MaSP DESC LIMIT 5";
        // ai thực hiện câu truy vấn này query
        $db=new connect();
        $results=$db->getList($select);
        return $results;
    }
    function getSearch($name)
    {
        $select="select * from sanpham where TenSP like '%$name%'";
        $db=new connect();
        $results=$db->getList($select);
        return $results;
    }

    // Comment (bình Luận)
    public function getListcomment($MaSP)
    {
        $select = "select kh.TenKH,bl.Noidung 
                   FROM binhluan bl,khachhang kh 
                   where bl.MaSP=:MaSP and bl.MaKH = kh.MaKH order by Mabinhluan DESC";
        $db=new connect();
        $stm=$db->getListP($select);
        // muốn prepare đc thì phải
        $stm->bindParam(':MaSP',$MaSP);
        // $stm->bindParam(':tenkh',$tenkh);
        $stm->execute(); 
        return $stm;
    }
    public function Dem_comment($MaSP)
    {
        $select = "select count(Mabinhluan) from binhluan where MaSP=$MaSP";
        $db=new connect();
        $stm=$db->getInstance($select);
        return $stm;
    }
}
?>
