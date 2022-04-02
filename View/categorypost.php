  <?php 

       $name = 'Danh mục chưa có tin';
            // foreach($postbyid as $key => $post_name){
            //    $name = $post_name['TenDMBV'];
            // }
         if(isset($_GET['id']))
         {
            $id=$_GET['id'];
            $hh=new BaiViet();
            $results=$hh->DMBV_id_home($id);
            $name = $results['TenDMBV'];
         }
                          
  ?>
   <section>
         <div class="bg_in">
            <div class="wrapper_all_main">
               <div class="wrapper_all_main_right">
                 
                  <!--breadcrumbs-->
                  <div class="breadcrumbs">
                     <ol itemscope itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope
                           itemtype="http://schema.org/ListItem">
                           <a itemprop="item" href="index.php">
                           <span itemprop="name">Trang chủ</span></a>
                           <meta itemprop="position" content="1" />
                        </li>

                        <li itemprop="itemListElement" itemscope
                           itemtype="http://schema.org/ListItem">
                           <span itemprop="item">
                           <strong itemprop="name">
                           <?php echo $name ?>
                           </strong>  
                           </span>
                           <meta itemprop="position" content="2" />
                        </li>

                     </ol>
                  </div>
                  <!--breadcrumbs-->
                  <div class="content_page">
                     <div class="box-title">
                        <div class="title-bar">
                           
                           <h1><?php echo $name ?></h1>
                        </div>
                     </div>
                     <div class="content_text">
                        <ul class="list_ul">
                           <?php
                              $SP = new BaiViet();
                              $results=$SP->AllBaiViet();
                              while($pro_cate=$results->fetch()):
                              if($id==$pro_cate['MaDMBV']):
                            ?>
                           <li class="lists">
                              <div class="img-list">
                                 <a href="index.php?action=home&act=detailsPost&id=<?php echo $pro_cate['MaBV'];?>">
                                 <img src="<?php echo 'Admin1/Content/image/post/'.$pro_cate['AnhBV'];?>" alt="<?php echo $pro_cate['TenBV'] ?>" class="img-list-in">
                                 </a>
                              </div>
                              <div class="content-list">
                                 <div class="content-list_inm">
                                    <div class="title-list">
                                       <h3>
                                          <a href="index.php?action=home&act=detailsPost&id=<?php echo $pro_cate['MaBV'];?>"><?php echo $pro_cate['TenBV'] ?></a>
                                       </h3>
                                      
                                    </div>
                                    <div class="content-list-in">
                                       <p><?php echo substr($pro_cate['NoiDung'],0,500).'...' ?></p>
                                    </div>
                                    <div class="xt"><a href="index.php?action=home&act=detailsPost&id=<?php echo $pro_cate['MaBV'];?>">Xem thêm</a></div>
                                 </div>
                              </div>
                              <div class="clear"></div>
                           </li>
                           <?php
                              endif;
                              endwhile;
                           ?>
                        </ul>
                        <div class="clear"></div>
                        <div class="wp_page">
                           <div class="page">
                           </div>
                        </div>
                     </div>
                  </div>
               </div> 
               <div class="clear"></div>
            </div>
         </div>
      </section>
      <!---End bg_in----->
<style>
   .title-bar h3, .title-bar h2, .title-bar h1 {background: #074ac4;color: #fff700;}
   .box-title .title-bar {border-bottom: 2px solid #edee07;}
   .title-bar h1:after {border-left: 35px solid #edee07;}
   .title-list h3 a {color:#074ac4;}
</style>