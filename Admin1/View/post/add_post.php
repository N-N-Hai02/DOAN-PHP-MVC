<?php
if (!empty($_GET['msg'])) {
	$msg = unserialize(urldecode($_GET['msg']));
	foreach ($msg as $key => $value) {
		echo '<span style="color:blue;font-weight:bold">' . $value . '</span>';
	}
}
?>
<h3 style="text-align: center;">Thêm bài viết</h3>
<div class="col-md-6">
	<form action="index.php?action=baiviet&act=insert_post" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="email">Tên bài viết</label>
			<input type="text" name="TenBV" class="form-control">
		</div>
		<div class="form-group">
			<label for="email">Hình ảnh sản phẩm</label>
			<input type="file" name="AnhBV" class="form-control">
		</div>
		<div class="form-group">
			<label for="pwd">Chi tiết bài viết</label>
			<textarea id="editor" name="NoiDung" rows="10" style="resize: none" class="form-control"></textarea>
		</div>
		<div class="form-group">
			<label for="pwd">Danh mục bài viết</label>
			<select class="form-control" name="DMBV">
				<?php
				$bv = new baiviet();
				$result = $bv->getDMBV();
				while($set = $result->fetch()):
				?>
					<option value="<?php echo $set['MaDMBV']; ?>"><?php echo $set['TenDMBV']; ?></option>
				<?php
				endwhile;
				?>
			</select>
		</div>
		<button type="submit" name="addpost" class="btn btn-default">Thêm bài viết</button>
	</form>
</div>