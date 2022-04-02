<?php
	if(!empty($_GET['msg'])){
		$msg = unserialize(urldecode($_GET['msg']));
		foreach ($msg as $key => $value){
			echo '<span style="color:blue;font-weight:bold">'.$value.'</span>';
		}
	}
?> 
<h3 style="text-align: center;">Cập nhật danh mục sản phẩm</h3>

<div class="col-md-6">
	<?php
	if(isset($_GET['id']))
	{
		$MaDMSP = $_GET['id'];
		$db = new sanpham();
		$result = $db->DMSP($MaDMSP);
		$tendmsp = $result[1];
		$mota = $result[2];
	}
	?>
	<form action="index.php?action=sanpham&act=update_category_product" method="POST">
		<input type="hidden" name="MaDMSP" value="<?= $MaDMSP;?>">
	  <div class="form-group">
	    <label for="email">Tên danh mục</label>
	    <input type="text" value="<?= $tendmsp;?>" name="TenDMSP" class="form-control" >
	  </div>
	  <div class="form-group">
	    <label for="pwd">Miêu tả danh mục</label>
	    <textarea name="MoTaDMSP" id="editor" style="resize: none;" rows="5" class="form-control"><?= $mota;?></textarea>
	  </div>
	  <button type="submit" class="btn btn-default">Cập nhật danh mục</button>
	</form>
</div>