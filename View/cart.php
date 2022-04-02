  <section>
         <div class="bg_in">
            <div class="content_page cart_page">
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
                        Giỏ hàng
                        </strong>
                        </span>
                        <meta itemprop="position" content="2" />
                     </li>
                  </ol>
               </div>
               <div class="box-title">
                  <div class="title-bar">
                     <h1>Giỏ hàng của bạn</h1>
                  </div>
               </div>
               <div class="content_text">
                  <div class="container_table">
                     <table class="table table-hover table-condensed">
                        <thead>
                           <tr class="tr tr_first">
                              <!-- <th>STT</th> -->
                              <th>Hình ảnh</th>
                              <th>Tên sản phẩm</th>
                              <th>Giá</th>
                              <th style="width:90px;">Số lượng</th>
                              <th>Độ Tuổi</th>
                              <th>Thành tiền</th>
                              <th style="width:50px; text-align:center;"></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                              if(!isset($_SESSION['Cart_petStore'])||count($_SESSION['Cart_petStore'])==0):
                                 echo '<tr>
                                          <td colspan="7">
                                             <div class="sum_price_all">
                                                <span class="text_price">Giỏ hàng trống</span><br/>
                                                <a href="index.php" style="color:blue;"><i class="fa fa-long-arrow-left"></i>Tiếp Tục Mua Hàng</a>
                                             </div>
                                          </td>
                                       </tr>';
                           ?>
                           <?php 
                           else:
                           ?> 
                           <form action="index.php?action=giohang&act=update_SP" method="POST">
                               <?php
                                    foreach($_SESSION['Cart_petStore'] as $key=>$item):
                                      $costnew=number_format($item['cost'],2);
                                      $totalnew=number_format($item['total'],2); 
                                 ?>
                              <tr class="tr">
                                 <td data-th="Hình ảnh">
                                    <div class="col_table_image col_table_hidden-xs"><img src="Admin1/Content/image/<?php echo $item['hinh'];?>" alt="<?php echo $item['name'];?>" class="img-responsive"/></div>
                                 </td>
                                 <td data-th="Sản phẩm">
                                    <div class="col_table_name">
                                       <h4 class="nomargin"><?php echo $item['name'];?></h4>
                                    </div>
                                 </td>
                              
                                 <td data-th="Giá"><span class="color_red font_money"><?php echo $costnew;?><sup><u>Đ</u></sup></span></td>

                                 <td data-th="Số lượng">
                                    <div class="clear margintop5">
                                       <div class="floatleft">

                                       <input type="number" min="1" class="inputsoluong" name="N_qty[<?php echo $item['ma'];?>]"  value="<?php echo $item['qty'];?>"></div>

                                    </div>
                                    <div class="clear"></div>
                                 </td>
                                 <td data-th="Độ Tuổi">
                                    <div class="clear margintop5">
                                       <div class="floatleft">
                                       <select name="N_Age[<?php echo $item['ma'];?>]"  value="<?php echo $item['Tuoi'];?>" class="form-control" style="width:150px;">
                                          <?php
                                          if(isset($item['Tuoi'])==""):
                                          ?>   
                                          <option value="1 Đến 2 Tháng">1 Đến 2 Tháng</option>
                                          <?php
                                          else:
                                          ?>                                  
                                          <option><?php echo $item['Tuoi']?></option>
                                          <?php 
                                          endif;
                                          ?>
                                          <option value="1 Đến 2 Tháng">1 Đến 2 Tháng</option>
                                          <option value="5 Đến 10 Tháng">5 Đến 10 Tháng</option>
                                          <option value="9 Đén 12 Tháng">9 Đén 12 Tháng</option>
                                          <option value="12 Đến 18 Tháng">12 Đến 18 Tháng</option>
                                       </select>
                                    </div>
                                    <div class="clear"></div>
                                 </td>
                                 <td data-th="Thành tiền" class="text_center"><span class="color_red font_money"><?php echo $totalnew;?><sup><u>Đ</u></sup></span></td>

                                 <td class="actions aligncenter">
                                    
                                   <a href="index.php?action=giohang&act=delete_item&id=<?php echo $item['ma'];?>"><button type="button" style="box-shadow: none;" class="btn btn-sm btn-warning">Xóa</button></a>

                                   <button type="submit" style="box-shadow: none;" class="btn btn-sm btn-primary">Cập nhật</button>              
                                 </td>

                              </tr>
                              <?php  
                                 endforeach; 
                              ?>
                           </form>
                           <tr>
                              <td colspan="7" class="textright_text">
                                 <div class="sum_price_all">
                                    <span class="text_price">Tổng tiền thành toán</span>: 
                                    <span class="text_price color_red"><?php echo get_subtotal();?><sup><u>VNĐ</u></sup></span>
                                 </div>
                              </td>
                           </tr>
                           <?php
                           endif;
                           ?>
                        </tbody>
                        <tfoot>
                           <tr class="tr_last">
                              <td colspan="7">
                                 <?php 
                                 if(isset($_SESSION['MaKH'])==false):
                                 ?>
                                 <marquee behavior="Alternate" direction="left">
                                    <button class="btn btn-warning floatcenter"><b style="color:blue;"><i class="fa fa-long-arrow-right"></i> Đăng Nhập Trước Khi Thanh Toán <i class="fa fa-long-arrow-left"></i></b></button>
                                    <div class="clear"></div>
                                 </marquee>
                                 <?php
                                 else:
                                 ?>
                                 <button class="btn btn-success" style="width:1100px;"><a href="index.php?action=order&act=order"><b>Thanh Toán <i class="fa fa-long-arrow-right"></b></a></button>
                                 <?php 
                                 endif;
                                 ?>
                              </td>
                           </tr>
                        </tfoot>
                     </table>
                  </div>
                  <div class="contact_form">
                     <div class="contact_left">
                        <div class="ch-contacts-details">
                           <ul class="contact-list">
                              <li class="addr">
                                 <strong class="title">Địa chỉ của chúng tôi</strong>
                                 <p><em><strong>3tmobile</strong></em><br />
                                 <p>Trung Tâm Bán Hàng:</p>
                                 <p>CN1: 333B Minh Phụng, Phường 2, Quận 11, HCM</p>
                                 <p>CN2: 548 Lý Thái Tổ, Phường 10, Quận 10, HCM</p>
                                 <p>N3: 297 Quang Trung, Phường 10, Q. Gò Vấp, HCM</p>
                                 <p> CN4: 72 Đinh Tiên Hoàng, Phường 01, Q. Bình Thạnh, HCM</p>
                                 <p> Hotline: 0888 70 8284 - 0936 11 7080 (zalo)</p>
                                 </p>
                              </li>
                           </ul>
                           <div class="hiring-box">
                              <strong class="title">Chào bạn!</strong>
                              <p>Mọi thắc mắc bạn hãy gửi về mail của chúng tôi <strong>3tmobile@webextrasite.com</strong> chúng tôi sẽ giải đáp cho bạn.</p>
                              <p><a href="." class="arrow-link"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Về trang chủ</a></p>
                           </div>
                        </div>
                     </div>
                     <div class="contact_right">
                        
                     </div>
                  </div>
               </div>
               <?php
                  // endif;
               ?>
            </div>
         </div>
      </section>
      <div class="clear"></div>
<style>
.floatleft {float: left;width: 65px;}
.col_table_name {padding: 0px;}
.box-title .title-bar {border-bottom: 2px solid #edee07;}
.title-bar h1:after {border-left: 35px solid #edee07;}
.title-bar h3, .title-bar h2, .title-bar h1 {background: #074ac4;color: #fff700;}
</style>