<?php
class User{
    // thuộc tính 
    var $MaKH=0;
    var $TenKH=null;
    var $SDTKH=null;
    var $Mail=null;
    var $MatKhau=null;
    var $DiaChi=null;
    //hàm tạo 
    public function __construct(){}
        // phương thức inser thông tin vào database
    public function insertUser($TenKH,$SDTKH,$Mail,$MatKhau,$DiaChi)
    {
        $query="insert into khachhang(MaKH,TenKH,SDTKH,Mail_KH,MatKhau,DiaChi) values(NULL,?,?,?,?,?)";
        $db=new connect();
        $stm=$db->getListP($query);
        // muốn prepare thì pải excute
        $stm->execute([$TenKH,$SDTKH,$Mail,$MatKhau,$DiaChi]);

    }
    public function loginUser($Mail,$MatKhau)
    {
        // câu truy vấn
        $select="select * from khachhang where Mail_KH='$Mail' and MatKhau='$MatKhau'";
        // thục thi câu lệnh seleect
        $db=new connect();
        $result=$db->getList($select);//$result..[12,abc,12,city]
        // vì trả về 1 dòng user nên fetch
        $set= $result->fetch();//$set...
        return $set;
    }
    //phương thức loguer trả về thông tin của 1 người đã đc đăng ký

    // pt insert comment
    public function insertComment($MaSP,$MaKH,$Noidung)
    {
        $date=new DateTime("now");
        $ngay=$date->format("Y-m-d");
        $query="insert into binhluan(Mabinhluan,MaSP,MaKH,Ngaybinhluan,Noidung)values(Null,:MaSP,:MaKH,:Ngaybinhluan,:Noidung)";
        $db=new connect();
        $stm=$db->getListP($query);
        // ràng buộc giá trị hoặc biến
        $stm->bindParam(':MaSP',$MaSP);
        $stm->bindParam(':MaKH',$MaKH);
        $stm->bindParam(':Ngaybinhluan',$ngay);
        $stm->bindParam(':Noidung',$Noidung);
        $stm->execute();
    }
}
?>