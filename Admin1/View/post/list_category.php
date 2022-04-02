<h3 style="text-align: center;">Liệt kê danh mục bài viết</h3>
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
        <th>Tên danh mục</th>
        <th>Mô tả</th>
        <th>Quản lý</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $i = 0;
        $BV = new baiviet();
        $result = $BV->getDMBV();
        while($set=$result->fetch()):
        $i++;
      ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $set['TenDMBV'] ?></td>
        <td><?php echo $set['MoTaDMBV'] ?></td>
        <td><a href="index.php?action=baiviet&act=delete_category_post&id=<?php echo $set['MaDMBV'] ?>">Xóa</a> || <a href="index.php?action=baiviet&act=update_DMBV&id=<?php echo $set['MaDMBV'] ?>">Cập nhật</a></td>
      </tr>
      <?php
      endwhile;
      ?>
      
    </tbody>
  </table>