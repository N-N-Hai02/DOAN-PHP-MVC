<h3 style="text-align: center;">Liệt kê bài viết</h3>
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
        <th>Tên </th>
        <th>Hình </th>
        <th>Danh mục </th>
        <th>Quản lý</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 0;
      $BV = new baiviet();
      $result = $BV->getListbaiviet();
      while($set=$result->fetch()):
      $i++;
      ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $set['TenBV'] ?></td>
        <td><img src="Content/image/post/<?php echo $set['AnhBV'] ?>" height="100" width="100"></td>
        <td><?php echo $set['TenDMBV'] ?></td>
        <td><a href="index.php?action=baiviet&act=delete_BV&id=<?php echo $set['MaBV'] ?>">Xóa</a> || <a href="index.php?action=baiviet&act=update_BV&id=<?php echo $set['MaBV']?>">Cập nhật</a></td>
      </tr>
      <?php
      endwhile;
      ?>
      
    </tbody>
  </table>