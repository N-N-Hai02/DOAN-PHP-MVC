<h3 style="text-align: center;">Liệt kê danh mục sản phẩm</h3>
<table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Tên danh mục</th>
        <th>Mô tả</th>
        <th>Quản lý</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $i=0;
        $sp = new sanpham();
        $result = $sp->getDMSP();
        while($set=$result->fetch()):
        $i++;
      ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $set['TenDMSP'] ?></td>
        <td><?php echo $set['MoTaDMSP'] ?></td>
        <td><a href="index.php?action=sanpham&act=delete_category_product&id=<?php echo $set['MaDMSP'] ?>">Xóa</a> || <a href="index.php?action=sanpham&act=update_DMSP&id=<?php echo $set['MaDMSP'] ?>">Cập nhật</a></td>
      </tr>
      <?php
      endwhile;
      ?>
      
    </tbody>
  </table>