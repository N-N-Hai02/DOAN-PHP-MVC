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
                           Tất cả tin tức
                           </strong>  
                           </span>
                           <meta itemprop="position" content="2" />
                        </li>
                        <li>
                          <?php  $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                           ?>
                           <div class="fb-share-button" data-href="<?php echo $actual_link ?>" data-layout="button_count" data-size="small"><a target="_blank" href="<?php echo $actual_link ?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                        </li>
                     </ol>
                  </div>
                  <!--breadcrumbs-->
                  <div class="content_page">
                     <div class="box-title">
                        <div class="title-bar">
                           <h1>Tất cả tin tức</h1>
                        </div>
                     </div>
                     <div class="content_text">
                         <style type="text/css">
                               .img-list img {
                                  height: 220px;
                              }
                            </style>
                        <ul class="list_ul">
                           <?php
                              $BV = new BaiViet();
                              $results=$BV->AllBaiViet();
                              while($set=$results->fetch()):
                           ?>
                           
                           <li class="lists">
                              <div class="img-list">
                                 <a href="index.php?action=home&act=detailsPost&id=<?php echo $set['MaBV'];?>">
                                    <img src="<?php echo 'Admin1/Content/image/post/'.$set['AnhBV'];?>" alt="<?php echo $set['TenBV'] ?>" class="img-list-in">
                                 </a>
                              </div>
                              <div class="content-list">
                                 <div class="content-list_inm">
                                    <div class="title-list">
                                       <h3>
                                          <a href="index.php?action=home&act=detailsPost&id=<?php echo $set['MaBV'];?>"><?php echo $set['TenBV'] ?></a>
                                       </h3>
                                      
                                    </div>
                                    <div class="content-list-in">
                                       <p><?php echo substr($set['NoiDung'],0,500).'...' ?></p>
                                    </div>
                                    <div class="xt"><a href="index.php?action=home&act=detailsPost&id=<?php echo $set['MaBV'];?>">Xem thêm</a></div>
                                 </div>
                              </div>
                              <div class="clear"></div>
                           </li>
                           <?php
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