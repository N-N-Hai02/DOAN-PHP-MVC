<?php
class BaiViet{
    //thuộc tính
    var $MaBV = 0;
    var $TenBV = null;
    var $Noidung = null;
    var $AnhBV = null;
    var $MaDMBV = 0;
    //hàm tạo 
    public function __construct(){

    }
    public function AllBaiViet()
    {
        //câu lệnh Truy Vấn
        $select = "SELECT * FROM baiviet ORDER BY MaBV DESC";
        $db = new connect();
        $results=$db->getList($select);
        return $results;
    }
    public function danhmucbaiviet()
    {
        //câu lệnh Truy Vấn
        $select="select * FROM danhmucbaiviet ORDER BY MaDMBV ASC";
        $db = new connect();
        $results=$db->getList($select);
        return $results;
    }
    public function ChiTietBV($MaBV)
    {
        $select = "SELECT * FROM baiviet WHERE MaBV = $MaBV";
        $db=new connect();
        $results=$db->getInstance($select);
        return $results;
    }
    public function DMBV_id_home($MaDMBV)
    {
        //câu lệnh Truy Vấn
        $select="SELECT * FROM danhmucbaiviet dmbv,baiviet bv WHERE dmbv.MaDMBV=bv.MaDMBV AND bv.MaDMBV=$MaDMBV ORDER BY BV.MaBV DESC";
        $db = new connect();
        $results=$db->getInstance($select);
        return $results;
    }
}
?>