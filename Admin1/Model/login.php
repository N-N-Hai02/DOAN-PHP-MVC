<?php
class Login{
    var $user=null;
    var $pass=null;
    function __construct()
    {
        
    }
    function logAdmin($user,$pass)
    {
        $select = "select * from admin_petstore where ten_user='$user' and matkhau='$pass'";
        $db = new connect();
        $result=$db->getList($select);
        $set=$result->fetch();
        return $set;
    }
}
?>