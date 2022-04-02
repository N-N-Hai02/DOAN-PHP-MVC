<?php
class sanpham
{
    // THuộc Tính 
    var $MaSP = 0;
    var $TenSP = null;
    var $GiaBan = 0;
    var $MoTa = NULL;
    var $SoLuong = 0;
    var $Hinh = Null;
    var $MaDMSP = 0;
    var $SPMoi = 0;
    // Hàm Tạo 
    function __construct()
    {
    }
    public function getAllSanpham()
    {
        $select = "SELECT * FROM sanpham sp,danhmucsp dm WHERE sp.MaDMSP=dm.MaDMSP ORDER BY sp.MaSP DESC";
        $db = new connect();
        $result = $db->getList($select);
        return $result;
    }
    public function getDMSP() 
    {
        $select = "select * from danhmucsp";
        $db = new connect();
        $result = $db->getList($select);
        return $result;
    }
    public function getListMaDMSP()
    {
        $select = "select MaDMSP,TenDMSP from danhmucsp";
        $db = new connect();
        $result = $db->getList($select);
        return $result;
    }
    // update ,insert Sản Phẩm.
        public function Allproduct()
        {
            $select = "SELECT * FROM sanpham";
            $db = new connect();
            $result = $db->getList($select);
            return $result;
        }
        public function getListID($id)
        {
            $select = "select * from sanpham where MaSP=$id";
            $db = new connect();
            $result = $db->getInstance($select);
            return $result;
        }
        public function inserProduct($TenSP, $GiaBan, $MoTa, $SoLuong, $hinh, $MaDMSP, $SPMoi)
        {
            $query = "insert into sanpham(MaSP,TenSP,GiaBan,MoTaSP,Soluong,HinhSP,MaDMSP,SanPhamMoi,luotxem) values(NULL,'$TenSP','$GiaBan','$MoTa',$SoLuong,'$hinh',$MaDMSP,$SPMoi,0)";
            $db = new connect();
            $stm = $db->getListP($query);
            // muốn prepare thì pải excute
            $stm->execute();
        }
        public function updateProduct($MaSP, $TenSP, $GiaBan, $MoTa, $SoLuong, $hinh, $MaDMSP, $SPMoi)
        {
            $select = "UPDATE sanpham SET TenSP='$TenSP',GiaBan='$GiaBan',MoTaSP='$MoTa',Soluong=$SoLuong,HinhSP='$hinh',MaDMSP=$MaDMSP,SanPhamMoi=$SPMoi WHERE MaSP=$MaSP";
            $db = new connect();
            $db->exec($select);
        }
    // Xóa Sản phẩm.
        function deleteSP($id)
        {
            $query = "delete from sanpham where MaSP=$id";
            $db = new connect();
            $db->exec($query);
        }
    
    // Danh Mục ( category )
        // insert , update DMSP.
        public function DMSP($id)
        {
            $select = "SELECT * FROM danhmucsp where MaDMSP=$id";
            $db = new connect();
            $results = $db->getInstance($select);
            return $results;
        }
        public function inserCategoryProduct($TenDMSP , $MoTaDMSP)
        {
            $query = "insert into danhmucsp(MaDMSP,TenDMSP,MoTaDMSP) values(NULL,'$TenDMSP','$MoTaDMSP')";
            $db = new connect();
            $stm = $db->getListP($query);
            // muốn prepare thì pải excute
            $stm->execute();
        }
        public function updateCategoryProduct($MaDMSP, $TenDMSP , $MoTaDMSP)
        {
            $select = "UPDATE danhmucsp SET TenDMSP='$TenDMSP', MoTaDMSP='$MoTaDMSP' WHERE MaDMSP=$MaDMSP";
            $db = new connect();
            $db->exec($select);
        }
        // xóa danh mục sản phẩm
        function deleteDMSP($id)
        {
            $query = "delete from danhmucsp where MaDMSP=$id";
            $db = new connect();
            $db->exec($query);
        }
        
}
