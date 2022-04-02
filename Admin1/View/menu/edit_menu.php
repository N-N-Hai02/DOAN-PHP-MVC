<?php
	if(!empty($_GET['msg'])){
		$msg = unserialize(urldecode($_GET['msg']));
		foreach ($msg as $key => $value){
			echo '<span style="color:blue;font-weight:bold">'.$value.'</span>';
		}
	}
	?> 
<h3 style="text-align: center;">Cập nhật danh mục bài viết</h3>

<div class="col-md-6">
	<?php
	if(isset($_GET['id']))
	{
		$Ma_menu = $_GET['id'];
		$MN = new menu();
		$result = $MN->Menu($Ma_menu);
		$ten_menu = $result[1];
		$duongdan = $result[2];
	}
	?>
	<form action="index.php?action=menu&act=update_menu_form" method="POST">
	<input type="hidden" name="Ma_menu" value="<?= $Ma_menu;?>">
	  <div class="form-group">
	    <label for="email">Tên menu</label>
	    <input type="text" value="<?= $ten_menu;?>" name="Ten_menu" class="form-control" >
	  </div>
	  <div class="form-group">
	    <label for="pwd">Đường Dẫn</label>
	    <textarea name="Duong_dan" style="resize: none;" rows="5" class="form-control"><?= $duongdan;?></textarea>
	  </div>
	  <button type="submit" class="btn btn-default">Cập nhật menu</button>
	</form>

</div>