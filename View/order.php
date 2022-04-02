<div class="table-responsive">
 <!-- kiểm tra là nếu người dùng đó ko tồn tại và giỏ hàng =0 thì kêu người ta đăng nhập, ngược lại thì hiển thị form ra -->

 
 <form action="" method="post">
      <table class="table table-bordered" border="0">
        <?php
        if(isset($_SESSION['sohd']))
        {
          $id_order=$_SESSION['sohd'];
          $hd=new order();
          $result = $hd->order($id_order);
          $Ngay=$result[1];
          $Ten=$result[2];
          $DiaChi=$result[3];
          $SDT=$result[4];
        }
        ?>             
          <tr>
              <td colspan="4">
                <h2 style="color: red;"><b>HÓA ĐƠN CỦA BẠN</b></h2>
              </td>
          </tr>
          <tr>
              <td colspan="2"><b>Số Hóa đơn :</b><?php echo $id_order;?></td>
              <td colspan="2"><b>Ngày lập :</b><?php echo $Ngay;?></td>
          </tr>
          <tr>
              <td colspan="2"><b>Họ và tên :</b></td>
              <td colspan="2"><?php echo $Ten;?></td>
          </tr>
          <tr>
              <td colspan="2"><b>Địa chỉ :</b></td>
              <td colspan="2"><?php echo $DiaChi;?></td>
          </tr>
          <tr>
              <td colspan="2"><b>Số điện thoại :</b></td>
              <td colspan="2"><?php echo $SDT;?></td>
          </tr>
      </table>
      <!-- Thông tin sản phầm -->
      <table class="table table-bordered">
        <thead>
          <tr class="table-success">
            <th>Số TT</th>
            <th>Thông Tin Sản Phẩm</th>
            <th>Tùy Chọn Của Bạn</th>
            <th>Giá Bán - Số Lượng</th>
            <th>Thành Tiền</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $j=0;
            $result=$hd->orderDetail($id_order);
            while($set=$result->fetch()):
              $j++;
          ?>
          <tr>
            <td><?php echo $j;?></td>
            <td><?php echo $set['TenSP'];?></td>
            <td>Độ Tuổi : <?php echo $set['DoTuoi'];?></td>
            <td>Đơn Giá : <?php echo $set['GiaBan']?>  - Số Lượng : <?php echo $set['soluongdat']?><br/></td>
            <td><?php echo $set['GiaBan'] * $set['soluongdat'];?></td>
          </tr>
          <?php
            endwhile;
          ?>
          <tr>
              <td colspan="4"><b>TỔNG TIỀN : </b></td>
              <td style="float: center;"><b><?php echo get_subtotal();?><sup><u>đ</u></sup></b></td>
          </tr>
        </tbody>
      </table>
 </form>
<style>
  .table-success>th{text-align:center;}
</style>
</div>
</div>