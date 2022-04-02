<?php
// if (!empty($_GET['msg'])) {
// 	$msg = unserialize(urldecode($_GET['msg']));
// 	foreach ($msg as $key => $value) {
// 		echo '<span style="color:blue;font-weight:bold">' . $value . '</span>';
// 	}
// }
?>
<h3 style="text-align: center;">Cập nhật sản phẩm</h3>

<div class="col-md-6">
	<?php
	if (isset($_GET['id'])) {
		$masp = $_GET['id'];
		$hh = new sanpham();
		$result = $hh->getListID($masp);

		$tensp = $result['TenSP'];
		$giaban = $result['GiaBan'];
		$mota = $result['MoTaSP'];
		$soluong = $result['Soluong'];
		$hinh = $result['HinhSP'];
		$madmsp = $result['MaDMSP'];
		$sanphammoi = $result['SanPhamMoi'];
		$luotxem = $result['luotxem'];
	}
	?>
	<form action="index.php?action=sanpham&act=update_product" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="MaSP" value="<?php echo $masp;?>">
		<div class="form-group">
			<label for="email">Tên sản phẩm</label>
			<input type="text" value="<?php if (isset($tensp)) echo $tensp;?>" name="TenSP" class="form-control">
		</div>
		<div class="form-group">
			<label for="email">Hình ảnh sản phẩm</label>
			<input type="file" name="HinhSP" value="<?php if (isset($hinh)) echo $hinh;?>" class="form-control">
			<?php
			if (isset($hinh)) 
			{
				echo '<p><img height="100" width="100" src="./Content/image/'.$hinh.'"></p>';
			}
			?>
		</div>
		<div class="form-group">
			<label for="email">Giá sản phẩm</label>
			<input type="text" value="<?php if (isset($giaban)) echo $giaban; ?>" name="GiaBan" class="form-control">
		</div>
		<div class="form-group">
			<label for="email">Số lượng sản phẩm</label>
			<input type="text" value="<?php if (isset($soluong)) echo $soluong; ?>" name="Soluong" class="form-control">
		</div>
		<div class="form-group">
			<label for="pwd">Miêu tả danh mục</label>
			<textarea id="editor" name="MoTaSP" rows="5" style="resize: none" class="form-control"><?php if (isset($mota)) echo $mota; ?></textarea>
		</div>
		<div class="form-group">
			<label for="pwd">Danh mục sản phẩm</label>
			<select name="DMSP" class="form-control">
				<?php
				$selectDMSP = -1;
				if (isset($madmsp) && $madmsp != -1) {
					$selectDMSP = $madmsp;
				}
				$result = $hh->getDMSP();
				while ($set = $result->fetch()) :
				?>
					<option value="<?php echo $set['MaDMSP']; ?>" <?php if ($selectDMSP == $set['MaDMSP']) echo 'selected="selected"'; ?>><?php echo $set['TenDMSP']; ?></option>
				<?php
				endwhile;
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="pwd">Sản phẩm hot</label>
			<select class="form-control" name="SanPhamMoi">
				<?php
				if ($sanphammoi == 0) {
				?>
					<option selected value="0">Không</option>
					<option value="1">Có</option>
				<?php
				} else {
				?>
					<option value="0">Không</option>
					<option selected value="1">Có</option>
				<?php
				}
				?>
			</select>
		</div>

		<button type="submit" name="update_id" class="btn btn-primary">Cập nhật sản phẩm</button>
	</form>
	<?php
	// } 
	?>

</div>