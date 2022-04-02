<?php
	if(!empty($_GET['msg'])){
		$msg = unserialize(urldecode($_GET['msg']));
		foreach ($msg as $key => $value){
			echo '<span style="color:blue;font-weight:bold">'.$value.'</span>';
		}
	}
	?> 
<h3 style="text-align: center;">Thêm danh mục bài viết</h3>

<div class="col-md-6">
	<form action="index.php?action=baiviet&act=insert_category_post" method="POST">
	  <div class="form-group">
	    <label for="email">Tên danh mục</label>
	    <input type="text" name="TenDMBV" class="form-control" >
	  </div>
	  <div class="form-group">
	    <label for="pwd">Miêu tả danh mục</label>
	    <input type="text" name="MoTaDMBV" class="form-control">
	  </div>
	
	  <button type="submit" class="btn btn-default">Thêm danh mục</button>
	</form>
</div>