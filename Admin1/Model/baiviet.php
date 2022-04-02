<?php
class baiviet
{
    //Thuộc tính.
    var $mabv = 0;
    var $tenbv = null;
    var $noidung = null;
    var $anhbv = null;
    var $madmbv = 0;
    //hàm tạo
    function __construct()
    {
    }
    public function getDMBV()
    {
        $select = "select * from danhmucbaiviet";
        $db = new connect();
        $result = $db->getList($select);
        return $result;
    }
    public function getListbaiviet()
    {
        $select = "select * from baiviet BV,danhmucbaiviet DMBV where BV.MaDMBV=DMBV.MaDMBV ORDER BY BV.MaBV DESC";
        $db = new connect();
        $result = $db->getList($select);
        return $result;
    }
    public function getListDMBV_ID($id)
    {
        $select = "select * from baiviet where MaBV=$id";
        $db = new connect();
        $result = $db->getInstance($select);
        return $result;
    }
    // update , insert baiviet
    public function Allpost()
    {
        $select = "SELECT * FROM baiviet";
        $db = new connect();
        $result = $db->getList($select);
        return $result;
    }
    public function inserPost($TenBV, $NoiDung, $AnhBV, $MaDMBV)
    {
        $query = "insert into baiviet(MaBV,TenBV,NoiDung,AnhBV,MaDMBV) values(NULL,'$TenBV','$NoiDung','$AnhBV',$MaDMBV)";
        $db = new connect();
        $stm = $db->getListP($query);
        // muốn prepare thì pải excute
        $stm->execute();
    }
    public function updatePost($MaBV, $TenBV, $NoiDung, $AnhBV, $MaDMBV)
    {
        $select = "UPDATE baiviet SET TenBV='$TenBV',NoiDung='$NoiDung',AnhBV='$AnhBV',MaDMBV=$MaDMBV WHERE MaBV=$MaBV";
        $db = new connect();
        $db->exec($select);
    }
    // Xóa Bài viết
    function deleteBv($id)
    {
        $query = "delete from baiviet where MaBV=$id";
        $db = new connect();
        $db->exec($query);
    }
    // Danh Mục ( category )
        // insert , update DMBV.
        public function DMBV($id)
        {
            $select = "SELECT * FROM danhmucbaiviet where MaDMBV=$id";
            $db = new connect();
            $results = $db->getInstance($select);
            return $results;
        }
        public function inserCategoryPost($TenDMBV , $MoTaDMBV)
        {
            $query = "insert into danhmucbaiviet(MaDMBV,TenDMBV,MoTaDMBV) values(NULL,'$TenDMBV','$MoTaDMBV')";
            $db = new connect();
            $stm = $db->getListP($query);
            // muốn prepare thì pải excute
            $stm->execute();
        }
        public function updateCategoryPost($MaDMBV, $TenDMBV , $MoTaDMBV)
        {
            $select = "UPDATE danhmucbaiviet SET TenDMBV='$TenDMBV', MoTaDMBV='$MoTaDMBV' WHERE MaDMBV=$MaDMBV";
            $db = new connect();
            $db->exec($select);
        }
        // xóa danh mục sản phẩm
        function deleteDMBV($id)
        {
            $query = "delete from danhmucbaiviet where MaDMBV=$id";
            $db = new connect();
            $db->exec($query);
        }
}
