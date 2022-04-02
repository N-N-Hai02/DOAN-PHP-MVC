<?php
	if(!empty($_GET['msg'])){
		$msg = unserialize(urldecode($_GET['msg']));
		foreach ($msg as $key => $value){
			echo '<span style="color:blue;font-weight:bold">'.$value.'</span>';
		}
	}
	?> 
<h3 style="text-align: center;">Thêm sản phẩm</h3>

<div class="col-md-6">
	<form action="index.php?action=sanpham&act=insert_product" method="POST" enctype="multipart/form-data">
	  <div class="form-group">
	    <label for="email">Tên sản phẩm</label>
	    <input type="text" name="TenSP" class="form-control" >
	  </div>
	  <div class="form-group">
	    <label for="email">Hình ảnh sản phẩm</label>
	    <input type="file" name="HinhSP" class="form-control" >
	  </div>
	  <div class="form-group">
	    <label for="email">Giá sản phẩm</label>
	    <input type="text" name="GiaBan" class="form-control" >
	  </div>
	  <div class="form-group">
	    <label for="email">Số lượng sản phẩm</label>
	    <input type="text" name="Soluong" class="form-control" >
	  </div>
	  <div class="form-group">
	    <label for="pwd">Miêu tả sản phẩm</label>
	    <textarea id="editor" name="MoTaSP" rows="5" style="resize: none" class="form-control"></textarea>  
	  </div>
	  <div class="form-group">
	    <label for="pwd">Danh mục sản phẩm</label>
	    <select class="form-control" name="DMSP">
	    	<?php
			$hh = new sanpham();
	    	$result = $hh->getDMSP();
			while ($cate = $result->fetch()) :
	    	?>
	    	<option value="<?php echo $cate['MaDMSP'] ?>"><?php echo $cate['TenDMSP'] ?></option>
	    	<?php
	    	endwhile;
	    	?>
	    </select>
	  </div>
	  <div class="form-group">
	    <label for="pwd">Sản phẩm hot</label>
	    <select class="form-control" name="SanPhamMoi">

	    	<option value="0">Không</option>
	    	<option value="1">Có</option>
	    	
	    </select>
	  </div>

	  <button type="submit" class="btn btn-default">Thêm sản phẩm</button>
	</form>
</div>