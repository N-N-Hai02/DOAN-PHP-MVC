<section>

   <div class="bg_in">
   <div class="wrapper_all_main">
  
      <?php
       if(isset($_GET['id']))
       {
          $id=$_GET['id'];
          $BV=new BaiViet();
          $results=$BV->ChiTietBV($id);
          // vì kết quả trả vè chỉ có 1 row nên ko cần while
          // đây là thông tin của 1 sản phẩm người dùng chọn
          $tenBV = $results[1];
          $noidung = $results[2];
          $maDMSV = $results[4];
       } 
      ?>
      <div class="content_page">
               <div style="text-align:center;color:green;">
                  <h1><b>Trang Chi Tiết Bài Viết</b></h1><hr>
               </div>
         <div class="box-title">
            <div class="title-bar">
               <h1><?php echo $tenBV;?></h1>
            </div>
            <?php  $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                           ?>
                           <div class="fb-share-button" data-href="<?php echo $actual_link ?>" data-layout="button_count" data-size="small"><a target="_blank" href="<?php echo $actual_link ?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
         </div>
         <div class="content_text">
           <?php echo $noidung;?>
         </div>
         <div class="clear"></div>
      </div>
   </div>
   <div class="module_pro_all">
   <div class="box-title">
      <div class="title-bar">
         <h3>Tin tức liên quan</h3>
      </div>
   </div>
   <div class="pro_all_gird">
   <div class="girds_all list_all_other_page ">
      <?php 
      $SP = new BaiViet();
      $results=$SP->AllBaiViet();
      while($relate=$results->fetch()):
      if($maDMSV==$relate['MaDMBV']):
      ?>
      <div class="grids">
         <div class="grids_in">
            <div class="content">
               <div class="img-right-pro">
                  <a href="index.php?action=home&act=detailsPost&id=<?php echo $relate['MaBV'];?>">
                  <img class="lazy img-pro content-image" src="<?php echo 'Admin1/Content/image/post/'.$relate['AnhBV'];?>" data-original="image/iphone.png" alt="Máy in Canon MF229DW" />
                  </a>
                
               </div>
               <div class="name-pro-right">
                  <a href="index.php?action=home&act=detailsPost&id=<?php echo $relate['MaBV'];?>">
                     <h3><?php echo $relate['TenBV'] ?></h3>
                  </a>
               </div>
            </div>
         </div>
         <!--start:left-->
         <div class="wrapper_all_main_left">
         </div>
         <!--end:left-->
         <div class="clear"></div>
      </div>
      <?php
         endif;
         endwhile;
      ?>
      
      <div class="clear"></div>
   </div>
</section>
<style>
.box-title .title-bar {border-bottom: 2px solid #edee07;}
.title-bar h1:after {border-left: 35px solid #edee07;}
.title-bar h3, .title-bar h2, .title-bar h1 {background: #074ac4;color: #fff700;}
</style>