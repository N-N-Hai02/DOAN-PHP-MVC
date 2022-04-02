  <?php 
       $name = 'Danh mục chưa có sản phẩm';                  
      if(isset($_GET['id']))
         {
            $id=$_GET['id'];
            $hh=new SanPham();
            $results=$hh->DMSP_id_home($id);
            $name = $results['TenDMSP'];
            $madmsp = $results['MaDMSP'];
         }
  ?>
<section>
   <div class="bg_in">
   <div class="breadcrumbs">
      <ol itemscope itemtype="http://schema.org/BreadcrumbList">
         <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a itemprop="item" href="index.php">
            <span itemprop="name">Trang chủ</span></a>
            <meta itemprop="position" content="1" />
         </li>
         <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a itemprop="item" href="sanpham.php">
            <span itemprop="name"> <?php echo $name ?></span></a>
            <meta itemprop="position" content="2" />
         </li>
      </ol>
   </div>
   <div class="module_pro_all">
      <div class="box-title">
         <div class="title-bar">
            <h1>Danh mục :  <?php echo $name ?></h1>
           
         </div>
      </div>
      <div class="pro_all_gird">
         <div class="girds_all list_all_other_page ">
         <?php
                $SP = new SanPham();
                $results=$SP->AllSanPham();
                while($pro_cate=$results->fetch()):
                if($id==$pro_cate['MaDMSP']):
         ?>
            <form action="index.php?action=giohang&act=add_cart" method="POST">
            <div class="grids" style="height: 372px">
               <div class="grids_in">
                  <div class="content">
                     <div class="name-pro-right">
                        <a href="index.php?action=home&act=detail&id=<?php echo $pro_cate['MaSP'];?>">
                           <h3> <?php echo $pro_cate['TenSP']; ?></h3>
                        </a>
                     </div>
                     <div class="img-right-pro">
                        <a href="index.php?action=home&act=detail&id=<?php echo $pro_cate['MaSP'];?>">
                        <img class="lazy img-pro content-image" src="<?php echo 'Admin1/Content/image/'.$pro_cate['HinhSP']; ?>" data-original="imagetourdien/iphone.png" alt="Máy in Canon MF229DW" />
                        </a>
                         <div class="content-overlay"></div>
                              <div class="content-details fadeIn-top">
                                    <?php echo $pro_cate['MoTaSP'];?>
                              </div>
                        </div>
                        <input type="hidden" name="masp" value="<?php echo $pro_cate['MaSP'];?>"/>
                        <input type="hidden" value="1" name="soluong">

                        <!-- Giá Bán -->
                        <p><span class='price text-right'><?php echo $pro_cate['GiaBan'] ?>VNĐ</span></p>
                        <!-- Lượt Xem Và Yêu Thích -->
                        <p class="btn"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"><?php echo $pro_cate['luotxem']; ?></span> => Yêu Thích <span class=" glyphicon glyphicon-heart-empty" aria-hidden="true"><?php echo "1"; ?></span></p>
                        
                        <div>
                           <button class="btn btn-success btn-sm" type="submit" name="addcart"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Thêm giỏ hàng</button>
                        </div>
                  </div>
               </div>
            </div>
            </form>
            <?php
               endif;
               endwhile;
            ?>
            <div class="clear"></div>
         </div>
         <div class="clear"></div>
      </div>
      <div class="clear"></div>
   </div>
</section>
<style>
       /* Thẻ Title tiêu đề sản phẩm */
      .title-bar h3,.title-bar h2,.title-bar h1{background: #074ac4;color: #fff700;} 
      .title-bar h1:after {border-left: 35px solid #e2c905;}
      .box-title .title-bar {border-bottom: 2px solid #fff700;}
      .box-title .title-bar a.read_more{background: #074ac4;color: #fff700;}
      .box-title .title-bar a.read_more:after{border-left: 15px solid #074ac4;}
      .grids_in {border: 1px solid #074ac4;}
      .name-pro-right a h3 {max-height: 20px;text-transform: uppercase;font-size: 14px;color: #337ab7;font-weight: bold;}
      .content{text-align: center;}
      .price {color: red;font-weight: bold;}
      p {margin: 0 0 10px;}
      /* Lượt Xem && Yêu Thích */
      .glyphicon-eye-open:before {padding: 2px 5px;}
      .glyphicon-heart-empty:before {padding: 2px 5px;}
      /* nút input Đặt hàng */
      button.btn.btn-success.btn-sm:hover{background-color: #0c3c4e;}
      button.btn.btn-success.btn-sm{background: #074ac4;padding: 9px;width: 90%;display: block;margin-bottom: 10px;border: none;}
      
</style>