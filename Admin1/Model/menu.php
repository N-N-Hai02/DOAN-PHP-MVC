<?php
class menu
{
    //thuộc tính
    var $tenmenu = null;
    var $link = null;
    //thuộc tính
    function __construct()
    {
    }
    public function getList_Menu()
    {
        $select = "SELECT * FROM menu";
        $db = new connect();
        $result = $db->getList($select);
        return $result;
    }
    public function Menu($id)
    {
        $select = "SELECT * FROM menu where id_menu=$id";
        $db = new connect();
        $results = $db->getInstance($select);
        return $results;
    }
    public function insert_menu($TenMenu, $DuongDan)
    {
        $query = "insert into menu(id_menu,Ten_menu,Link) values(NULL,'$TenMenu','$DuongDan')";
        $db = new connect();
        $stm = $db->getListP($query);
        // muốn prepare thì pải excute
        $stm->execute();
    }
    public function update_menu($MaMenu, $TenMenu, $DuongDan)
    {
        $select = "UPDATE menu SET Ten_menu='$TenMenu', Link='$DuongDan' WHERE id_menu=$MaMenu";
        $db = new connect();
        $db->exec($select);
    }
    // xóa danh mục sản phẩm
    function delete_menu($id)
    {
        $query = "delete from menu where id_menu=$id";
        $db = new connect();
        $db->exec($query);
    }
}
