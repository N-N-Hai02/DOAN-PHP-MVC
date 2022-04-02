<h3 style="text-align: center;"><b>Liệt kê danh sách menu</b></h3>
<table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Tên Menu</th>
        <th>Link Đường Dẫn</th>
        <th>Quản lý</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $i = 0;
        $MN = new menu();
        $result = $MN->getList_Menu();
        while($set=$result->fetch()):
        $i++;
      ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $set['Ten_menu'] ?></td>
        <td><?php echo $set['Link'] ?></td>
        <td><a href="index.php?action=menu&act=delete_menu&id=<?php echo $set['id_menu'] ?>">Xóa</a> || <a href="index.php?action=menu&act=update_menu&id=<?php echo $set['id_menu'] ?>">Cập nhật</a></td>
      </tr>
      <?php
      endwhile;
      ?>
      
    </tbody>
  </table>