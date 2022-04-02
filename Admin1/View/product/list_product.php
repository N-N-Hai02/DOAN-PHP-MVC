<h3 style="text-align: center;">Liệt kê sản phẩm</h3>
<table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Tên SP</th>
        <th>Hình </th>
        <th>Danh mục </th>
        <th>Giá </th>
        <th>Số lượng</th>
        <th>Hot</th>
        <th>Quản lý</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $i=0;
        $sp = new sanpham();
        $result = $sp->getAllSanpham(); 
        while($set=$result->fetch()):
        $i++;
      ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $set['TenSP'] ?></td>
        <td><img src="./Content/image/<?php echo $set['HinhSP'] ?>" height="100" width="100"></td>
        <td><?php echo $set['TenDMSP'] ?></td>
        <td><?php echo $set['GiaBan']?>đ</td>
        <td><?php echo $set['Soluong'] ?></td>
        <td><?php 

        if($set['SanPhamMoi']==0){
          echo 'Không có';
        }else{
          echo 'Có';
        }

         ?></td>
       
        <td><a href="index.php?action=sanpham&act=delete_product&id=<?php echo $set['MaSP'];?>">Xóa</a> || <a href="index.php?action=sanpham&act=update_SP&id=<?php echo $set['MaSP'];?>">Cập nhật</a></td>
      </tr>
      <?php
      endwhile;
      ?>
    </tbody>
  </table>