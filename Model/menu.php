<?php
class menu{
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
}

?>