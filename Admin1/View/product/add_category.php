<?php
	if(!empty($_GET['msg'])){
		$msg = unserialize(urldecode($_GET['msg']));
		foreach ($msg as $key => $value){
			echo '<span style="color:blue;font-weight:bold">'.$value.'</span>';
		}
	}
	?> 
<h3 style="text-align: center;">Thêm danh mục sản phẩm</h3>

<div class="col-md-6">
	<form action="index.php?action=sanpham&act=insert_category_product" method="POST">
	  <div class="form-group">
	    <label for="email">Tên danh mục</label>
	    <input type="text" name="TenDMSP" class="form-control" >
	  </div>
	  <div class="form-group">
	    <label for="pwd">Miêu tả danh mục</label>
	    <textarea name="MoTaDMSP" rows="5" id="editor" class="form-control"></textarea>  
	  </div>
	
	  <button type="submit" class="btn btn-default">Thêm danh mục</button>
	</form>
</div>