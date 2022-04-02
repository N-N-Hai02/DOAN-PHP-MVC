<?php
if (isset($_POST['frmSubmit']) == true) {
   goimail();
}

function goimail()
{
   require "PHPMailer-master/src/PHPMailer.php";  //nhúng thư viện vào để dùng, sửa lại đường dẫn cho đúng nếu bạn lưu vào chỗ khác
   require "PHPMailer-master/src/SMTP.php"; //nhúng thư viện vào để dùng
   require 'PHPMailer-master/src/Exception.php'; //nhúng thư viện vào để dùng
   $mail = new PHPMailer\PHPMailer\PHPMailer(true);  //true: enables exceptions
   try {
      $mail->SMTPDebug = 0;  // 0,1,2: chế độ debug. khi mọi cấu hình đều tớt thì chỉnh lại 0 nhé
      $mail->isSMTP();
      $mail->CharSet  = "utf-8";
      $mail->Host = 'smtp.gmail.com';  //SMTP servers
      $mail->SMTPAuth = true; // Enable authentication
      // $nguoigui = 'emailCủaBạn@gmail.com';
      // $matkhau = 'mật khẩu';
      // $tennguoigui = 'Nhập tên người gửi';
      $mail->Username = 'nediahnguyen123@gmail.com'; // SMTP username
      $mail->Password = 'LAPTRINH123';   // SMTP password
      $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
      $mail->Port = 465;  // port to connect to  465/587              
      $mail->setFrom('nediahnguyen123@gmail.com', 'PHP LAPTRINH');
      // $to = "nhập email của người nhận";
      // $to_name = "Tên người nhận";

      $mail->addAddress('nasakawe123@gmail.com', 'NA VILA'); //mail và tên người nhận  
      $mail->isHTML(true);  // Set email format to HTML
      $mail->Subject = 'THƯ GỮI TỪ FORM LIÊN HỆ';
      // $noidungthu = "<b>Chào bạn!</b><br>Chúc an lành!";
      $noidungthu = file_get_contents("./View/noidungthulienhe.php");
      $noidungthu = str_replace(
         ['{txtEmail}', 'txtName', 'txtPhone', 'txtAddress', '{txtNoiDung}'],
         [$_POST['txtEmail'], $_POST['txtName'], $_POST['txtPhone'], $_POST['txtAddress'], $_POST['txtNoiDung']],
         $noidungthu
      );
      $mail->Body = nl2br($noidungthu);
      $mail->smtpConnect(array(
         "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
            "allow_self_signed" => true
         )
      ));
      $mail->send();
      echo '<meta http-equiv="refresh" content="0;url=index.php?action=contact&act=lienhe_daguimail"/>';
      // header('location:./View/lienhe_daguimail.php');
      // echo 'Đã gửi mail xong';
   } catch (Exception $e) {
      echo '<b style="color:red;">Mail không gửi được. Lỗi:</b>', $mail->ErrorInfo;
   }
}
?>
<section>
   <div class="bg_in">
      <div class="contact_form">
         <div class="col-md-12 well">
            <div class="contact_right">
               <div class="form_contact_in">
                  <div class="box_contact">
                     <div class="col-6 m-auto">
                        <h2 style="text-align: center;color:yellow;"><b>Liên Hệ</b></h2>
                        <form method="post">
                           <div class="mb-3">
                              <label class="form-label"><b>Họ Và Tên:<span style="color:red;">*</span></b></label>
                              <input type="text" class="form-control bg-light" name="txtName" required placeholder="Nhập Tên Của Bạn">
                           </div>
                           <div class="mb-3">
                              <label class="form-label"><b>Số Điện Thoại:</b><span style="color:red;">*</span></label>
                              <input type="text" class="form-control bg-light" name="txtPhone" required placeholder="Nhập Số DT Của Bạn">
                           </div>
                           <div class="mb-3">
                              <label class="form-label"><b>Địa Chỉ:</b><span style="color:red;">*</span></label>
                              <input type="text" class="form-control bg-light" name="txtAddress" required placeholder="Nhập Địa chỉ Của Bạn">
                           </div>
                           <div class="mb-3">
                              <label class="form-label"><b>Email của Bạn:</b><span style="color:red;">*</span></label>
                              <input type="email" class="form-control bg-light" name="txtEmail" required placeholder="Nhập Email">
                           </div>
                           <div class="mb-3">
                              <label class="form-label"><b>Nội dung:</b><span style="color:red;">*</span></label>
                              <textarea class="form-control bg-light" name="txtNoiDung" rows="5" placeholder="Nhập Nội Dung Gữi"></textarea>
                           </div>
                           <div class="mb-3">
                              <div class="input ipmaxn ">
                                 <input type="submit" class="btn-gui" name="frmSubmit" id="frmSubmit" value="Gửi liên hệ">
                                 <input type="reset" class="btn-gui" value="Nhập lại">
                              </div>
                              <div class="clear"></div>
                           </div>
                        </form>
                     </div>
                     <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<style>
   .contact_form .contact_right {width: 100%;float: left;}
   .well{background-color: #074ac4;}
   label{font-size: 15px;padding: 10px 0px;color: white;}
</style>