<h3 style="text-align: center;">Liệt kê đơn hàng</h3>
<?php
  if(!empty($_GET['msg'])){
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value){
      echo '<span style="color:blue;font-weight:bold">'.$value.'</span>';
    }
  }
  ?> 
<table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Mã HD</th>
        <th>Ngày , Giờ đặt</th>
        <th>Mã Khách Hàng</th>
        <th>Tổng Tiền</th>
        <th>Quản lý</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 0;
      $hd = new hoadon();
      $result = $hd->getListHoaDon();
      while($set=$result->fetch()):
      $i++;
      ?>
      <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $set['MaHD'];?></td>
        <td><?php echo $set['NgayDatHang'];?></td>
        <td><?php echo $set['MaKH'];?></td>
        <td><?php echo $set['TongTien'];?></td>
        <td><a href="index.php?action=hoadon&act=chitiet&id=<?=$set['MaHD'];?>">Xem đơn hàng</a></td>
      </tr>
      <?php
      endwhile;
      ?>
    </tbody>
  </table>