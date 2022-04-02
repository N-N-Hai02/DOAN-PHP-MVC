<section>
   <div class="bg_in">
      <div class="wrapper_all_main">
         <div class="wrapper_all_main_right no-padding-left" style="width:100%;">
            <div style="text-align:center;color:green;">
               <h1><b>Trang Chi Tiết Sản Phẩm</b></h1>
               <hr>
            </div>
            <!--  -->
            <article class="col-12">
               <!-- <div class="card"> -->
               <div class="container-fliud">
                  <div class="wrapper row">
                     <!-- <form action="index.php?action=giohang&act=add_cart" method="post"> -->
                     <form action="index.php?action=giohang&act=add_cart" method="post">
                        <div class="preview col-md-5">
                           <div class="tab-content">
                              <!-- Lấu thông tin của 1 sản phẩm để hiển thị lên cho người dùng thấy  -->
                              <?php
                              if (isset($_GET['id'])) {
                                 $id = $_GET['id'];
                                 $hh = new SanPham();
                                 // Update Phải Dược load trước nếu không sẽ không đúng số hiển thị lên 
                                 $update = $hh->update_SL($id);
                                 $results = $hh->ChiTietSP($id);
                                 // vì kết quả trả vè chỉ có 1 row nên ko cần while
                                 // đây là thông tin của 1 sản phẩm người dùng chọn
                                 $masp = $results[0];
                                 $tensp = $results[1];
                                 $giaban = $results[2];
                                 $motasp = $results[3];
                                 $soluong = $results[4];
                                 $hinhsp = $results[5];
                                 $madmsp = $results[6];
                                 $sanphammoi = $results[7];
                                 $luotxem = $results[8];
                              }
                              ?>
                              <div class="tab-pane-active" id="">
                                 <img src="<?php echo 'Admin1/Content/image/' . $hinhsp; ?>" alt="" width="100%" height="600px">
                              </div>
                           </div>
                           <br>
                           <ul class="preview-thumbnail nav nav-tabs">
                              <?php
                              // $results=$hh->getListDatailNhom($nhom);
                              // while($set=$results->fetch()):
                              ?>
                              <li class="active">
                                 <div class="row-active-img">
                                    <a href="#" data-toggle="tab">
                                       <img src="<?php echo 'Admin1/Content/image/' . $hinhsp; ?>" width="150px" height="150px">
                                    </a>
                                 </div>
                              </li>
                              <?php
                              // endwhile;
                              ?>
                           </ul>
                        </div>
                        <div class="details col-md-4">
                           <div class="price">
                              <p class="code_skin" style="margin-bottom:10px">
                                 <span>Mã hàng: <a href="chitietsp.php">CRW-W06</a> | Thương hiệu: <a href="#">Comrack</a></span>
                              </p>
                              <div class="status_pro">
                                 <span><b>Trạng thái: </b> Còn hàng</span>
                              </div>
                              <div class="status_pro"><span><b>Xuất xứ:</b> Việt Nam</span></div>
                           </div>
                           <input type="hidden" name="masp" value="<?php echo $masp; ?>" />
                           <h1 class="product-title"><b>PET :</b><b style="color:red;"> <?php echo $tensp; ?></b></h1><br>
                           <div class="color_price">
                              <span class="title_price bg_green">Giá bán</span> <?php echo number_format($giaban, 0, ',', '.') ?> <span>vnđ</span>
                              <div class="clear"></div>
                           </div>
                           <br><br>
                           <div class="rating">
                              <div div class="stars">Yêu Thích : <span class="glyphicon glyphicon-heart-empty" style="color: palevioletred;"></span> <span class="glyphicon glyphicon-heart-empty"></span></div>
                           </div>

                           <div class="luotxem">
                              <p>Lượt Xem : <?php echo $luotxem; ?></p>
                           </div>
                           <div class="content-pro-des">
                              <div class="content_des">
                                 <b>Mô Tả Sản Phẩm :</b>
                                 <?php echo $motasp; ?>
                              </div>
                           </div>
                           <div class="ct">
                              <h4><b>Độ Tuổi : </b></h4>
                              <select name="Age" class="form-control" style="width:150px;">
                                 <option value="1 Đến 2 Tháng">1 Đến 2 Tháng</option>
                                 <option value="5 Đến 10 Tháng">5 Đến 10 Tháng</option>
                                 <option value="9 Đén 12 Tháng">9 Đén 12 Tháng</option>
                                 <option value="12 Đến 18 Tháng">12 Đến 18 Tháng</option>
                              </select>
                           </div>
                           <div class="ct">
                              <div class="number_price">
                                 <h4><b>SỐ LƯỢNG :</b> </h4>
                                 <div class="custom pull-left">
                                    <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp &amp &qty > 0 ) result.value--;return false;" class="reduced items-count" type="button">-</button>
                                    <input type="text" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="soluong">
                                    <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button">+</button>
                                    <div class="clear"></div>
                                 </div>
                                 <br><br>
                                 <br><br>
                                 <div class="wp_a">
                                    <!-- <button type="submit" class="view_duan"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="text-mobile-buy">Mua hàng</span></button> -->
                                    <button class="add-to-cart btn btn-warning" type="submit" data-toggle="modal" data-target="#myModal">MUA NGAY</button>
                                    <!--  -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">GỌI NGAY</button>
                                    <div class="modal fade" id="myModal" role="dialog">
                                       <div class="modal-dialog">
                                          <div class="modal-content">
                                             <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Xin Chào Quý Khách</h4>
                                             </div>
                                             <div class="modal-body">
                                                <p><b>Liên Hệ :</b><b style="color:red;">0909229999</b></p>
                                                <b>Để Được Hộ Trợ Và Tư Vấn Mọi Thứ Khi Cần Thiết Nhất Chúng tôi Sẵn Sàng Phục vụ 24/24</b>
                                                <br>
                                                <span>
                                                   <b>Hoặc Liên Hệ Qua FACEBOOK & ZALO : </b>
                                                   <a href="https://www.facebook.com/" Type="button" class="btn btn-primary" style="background:blue;"><b style="color:#fff;">facebook</b></a>
                                                   <a href="https://id.zalo.me/account?continue=https://chat.zalo.me" class="btn btn-info" style="background:#00bfff;"><b style="color:#fff;">zalo</b></a>
                                                </span>
                                             </div>
                                             <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                             </div>
                                          </div>

                                       </div>
                                    </div>
                                    <!--  -->
                                 </div>
                                 <div class="clear"></div>
                              </div>

                              <div class="clear"></div>
                           </div>
                        </div>
                     </form>
                     <div class="content-des-pro-suport">
                        <div class="box-setup">
                           <div class="title-setup">
                              <i class="fa fa-tasks" aria-hidden="true"></i> Dịch vụ &amp; Chú ý
                           </div>
                           <div class="info-setup">
                              <div class="row-setup">
                                 <p style="text-align:justify">Quý khách vui lòng liên hệ với nhân viên bán hàng theo số điện thoại Hotline sau :</p>
                                 <p><span style="color:#d50100;font-weight: bold;">0932 023 992</span>&nbsp;để biết thêm chi tiết về Phụ kiện sản phẩm.</p>
                              </div>
                           </div>
                        </div>
                        <div class="info-prod prod-price freeship">
                           <span class="title">
                              <p>Bạn sẽ được giao hàng miễn phí trong khu vực nội thành TPHCM khi mua sản phẩm này.</p>
                           </span>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- </div> -->
            </article>
            <!--  -->
         </div>

         <div class="wrapper_all_main_right">
            <!-- Bình Luận Sản Phẩm -->
            <div class="clear">
               <?php
               if (isset($_SESSION['MaKH'])) :
               ?>
                  <section>
                     <div class="col-12">
                        <div class="row">
                           <?php
                           if (isset($_GET['id'])) {
                              $id = $_GET['id'];
                              $results = $hh->Dem_comment($id);
                              $tong = $results[0];
                           }
                           ?>
                           <p class="float-left"><b>Số Người BÌnh luận : <?php echo $tong; ?></b></p>
                           <hr>
                        </div>
                        <form action="index.php?action=home&act=comment&id=<?php echo $_GET['id']; ?>" method="post">
                           <div class="row">
                              <input type="hidden" name="txtmahh" value="<?php echo $_GET['id']; ?>" />
                              <img src="Content/imagetourdien/people.png" width="50px" height="50px" ; />
                              <textarea class="input-field" type="text" name="comment" rows="2" cols="70" id="comment" placeholder="Thêm bình luận">  </textarea>
                              <input type="submit" class="btn btn-primary" id="submitButton" style="float: right;" value="Bình Luận" />
                           </div>
                        </form>
                        <div class="row"><br><br>
                           <p class="float-left"><b>Các bình luận</b></p>

                           <hr>
                        </div>

                        <div class="row">
                           <?php
                           $results = $hh->getListcomment($masp);
                           while ($set = $results->fetch()) :
                           ?>
                              <div class="col-12">
                                 <span>
                                    <img src="Content/imagetourdien/people.png" width="50px" height="70px" style="padding:10px 0;" />
                                    <b style="color:brow;"><?php echo $set['TenKH']; ?> : <?php echo $set['Noidung']; ?></b>
                                 </span>
                              </div>
                           <?php
                           endwhile;
                           ?>
                        </div>

                     </div>
                  </section>
               <?php
               endif;
               ?>
            </div>
            <!-- end Bình Luận  -->

            <div class="dmsub">
               <div class="tags_products desktop">
                  <div class="tab_link"><br><br>
                     <div class="box-title">
                        <div class="title-bar">
                           <h3>Các Mặt Hàng Khác:</h3>
                        </div>
                     </div>
                     <div class="content_tab_link">
                        <a href="index.php?action=home&act=dmsp&id=34">Chó Kiển đẹp</a>
                        <a href="index.php?action=home&act=dmsp&id=35">Mèo Kiển </a>
                        <a href="index.php?action=home&act=dmsp&id=36">Phụ Kiện Chó,Mèo</a>
                        <a href="index.php?action=home&act=dmsp&id=37">Thức ăn các loại</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="module_pro_all">
               <div class="box-title">
                  <div class="title-bar">
                     <h3>Sản phẩm liên quan</h3>
                  </div>
               </div>
               <div class="pro_all_gird">
                  <div class="girds_all list_all_other_page ">
                     <?php
                     $SP = new SanPham();
                     $results = $SP->AllSanPham();
                     while ($relate = $results->fetch()) :
                        if ($madmsp == $relate['MaDMSP']) :
                     ?>
                           <div class="grids">
                              <div class="grids_in">
                                 <div class="content">
                                    <div class="img-right-pro">

                                       <a href="sanpham.php">
                                          <img class="lazy img-pro content-image" src="<?php echo 'Admin1/Content/image/' . $relate['HinhSP']; ?>" data-original="image/iphone.png" alt="Máy in Canon MF229DW" />
                                       </a>

                                       <div class="content-overlay"></div>
                                       <div class="content-details fadeIn-top">
                                          <?php echo $relate['MoTaSP'] ?>

                                       </div>
                                    </div>
                                    <div class="name-pro-right">
                                       <a href="index.php?action=home&act=detail&id=<?php echo $relate['MaSP']; ?>">
                                          <h3> <?php echo $relate['TenSP'] ?></h3>
                                       </a>
                                    </div>
                                    <div class="add_card">
                                       <input type="submit" style="box-shadow: none" class="btn btn-success btn-sm" name="addcart" value="Đặt hàng" />
                                    </div>
                                    <div class="price_old_new">
                                       <div class="price">
                                          <span class="news_price"><?php echo number_format($relate['GiaBan'], 0, ',', '.') . 'đ' ?></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
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
         </div>

         <!--end:left-->
         <div class="clear"></div>
      </div>
      <div class="clear"></div>
   </div>

   <script>
      jQuery(document).ready(function() {
         var div_fixed = jQuery('.product_detail_info').offset().top;

         jQuery(window).scroll(function() {

            if (jQuery(window).scrollTop() > div_fixed) {

               jQuery('.tabs-animation').addClass('fix_top');

            } else {

               jQuery('.tabs-animation').removeClass('fix_top');

            }

         });
         jQuery(window).load(function() {

            if (jQuery(window).scrollTop() > div_fixed) {

               jQuery('.tabs-animation').addClass('fix_top');

            }

         });

      });
   </script>
</section>
<style>
   /* Thẻ Title tiêu đề sản phẩm */
   .title-bar h3,
   .title-bar h2,
   .title-bar h1 {
      background: #074ac4;
      color: #fff700;
   }

   .title-bar h3:after {
      border-left: 35px solid #e2c905;
   }

   .box-title .title-bar {
      border-bottom: 2px solid #fff700;
   }

   .box-title .title-bar a.read_more {
      background: #074ac4;
      color: #fff700;
   }

   .box-title .title-bar a.read_more:after {
      border-left: 15px solid #074ac4;
   }

   .grids_in {
      border: 1px solid #074ac4;
   }

   /* nút input Đặt hàng */
   .add_card a {
      background: #074ac4;
   }

   .tags_products a {
      background: #074ac4;
   }

   input.btn.btn-success.btn-sm:hover {
      background-color: #0c3c4e;
   }

   input.btn.btn-success.btn-sm {
      background: #074ac4;
   }
</style>