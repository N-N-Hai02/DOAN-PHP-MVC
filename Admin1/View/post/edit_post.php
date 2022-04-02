<?php
if (!empty($_GET['msg'])) {
	$msg = unserialize(urldecode($_GET['msg']));
	foreach ($msg as $key => $value) {
		echo '<span style="color:blue;font-weight:bold">' . $value . '</span>';
	}
}
?>
<h3 style="text-align: center;">Cập nhật bài viết</h3>

<div class="col-md-6">
	<?php
	if (isset($_GET['id'])) {
		$mabv = $_GET['id'];
		$bv = new baiviet();
		$result = $bv->getListDMBV_ID($mabv);
		$tenbv = $result['TenBV'];
		$noidung = $result['NoiDung'];
		$hinh_bv = $result['AnhBV'];
		$madmBV = $result['MaDMBV'];
	}
	?>
	<form action="index.php?action=baiviet&act=update_post" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="MaBV" value="<?php echo $mabv;?>">
		<div class="form-group">
			<label for="email">Tên bài viết</label>
			<input type="text" value="<?php echo $tenbv; ?>" name="TenBV" class="form-control">
		</div>
		<div class="form-group">
			<label for="email">Hình ảnh sản phẩm</label>
			<input type="file" name="AnhBV" class="form-control">
			<p><img src="Content/image/post/<?php echo $hinh_bv; ?>" height="100" width="100"></p>
		</div>
		<div class="form-group">
			<label for="pwd">Nội Dung bài viết</label>
			<textarea id="editor" name="NoiDung" rows="10" style="resize: none" class="form-control"><?php echo $noidung; ?></textarea>
		</div>
		<div class="form-group">
			<label for="pwd">Danh mục bài viết</label>
			<select class="form-control" name="DMBV">
				<?php
				$selectDMBV = -1;
				if (isset($madmBV) && $madmBV != -1) {
					$selectDMBV = $madmBV;
				}
				$result = $bv->getDMBV();
				while ($set = $result->fetch()):
				?>
					<option value="<?php echo $set['MaDMBV']; ?>" <?php if ($selectDMBV == $set['MaDMBV']) echo 'selected="selected"'; ?>><?php echo $set['TenDMBV']; ?></option>
				<?php
				endwhile;
				?>
			</select>
		</div>

		<button type="submit" name="updatepost" class="btn btn-primary">Cập nhật bài viết</button>
	</form>

</div>