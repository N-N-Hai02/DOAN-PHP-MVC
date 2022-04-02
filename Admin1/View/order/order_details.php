<h3 style="text-align: center;">Liệt kê đơn hàng chi tiết</h3>
<table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Tên Khách</th>
        <th>Email</th>
        <th>SĐT</th>
        <th>Địa chỉ</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 0;
     
      if(isset($_GET['id']))
      {
        $MaHD = $_GET['id'];
        $hd = new hoadon();
        $result = $hd->order($MaHD);
        $TenKH = $result['TenKH'];
        $Email = $result['Mail_KH'];
        $SDT = $result['SDTKH'];
        $DiaChi =$result['DiaChi'];
      }
       
      $i++;
       ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $TenKH;?></td>
        <td><?php echo $Email;?></td>
        <td><?php echo $SDT;?></td>
        <td><?php echo $DiaChi;?></td>
      </tr>
    </tbody>
</table>

<table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Mã SP</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>SL Đặt</th>
        <th>Độ Tuổi</th>
        <th>Đơn giá</th>
        <th>Thành tiền</th>
      
      </tr>
    </thead>
    <tbody>
      <?php
        $i = 0;
        $total=0;
        $result=$hd->orderDetail($MaHD);
          while($set=$result->fetch()):
          $total+=$set['soluongdat']*$set['GiaBan'];
        $i++;
       ?>

      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $set['MaSP']?></td>
        <td><?php echo $set['TenSP'] ?></td>
        <td><img src="Content/image/<?php echo $set['HinhSP'] ?>" height="100" width="100"></td>
        <td><?php echo $set['soluongdat'] ?></td>
        <td><?php echo $set['DoTuoi'] ?></td>
        <td><?php echo number_format($set['GiaBan'],0,',','.').'đ' ?></td>
        <td><?php echo number_format($set['soluongdat']*$set['GiaBan'],0,',','.').'đ' ?></td>
       
      </tr>
      <?php
      endwhile;
      ?>
      <form method="POST" action="#">
      <tr>
        <td><input type="submit" name="update_order" value="Đã xử lý" class="btn btn-default"></td>
        <td align="right" colspan="7">Tổng tiền : <?php echo number_format($total,0,',','.').'đ' ?></td>
      </tr>
      </form>
      
    </tbody>
  </table>