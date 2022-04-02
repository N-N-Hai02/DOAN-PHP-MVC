<header>
    <section class="col-12">
        <div class="info_top col-12">
            <div class="bg_in">
                <p class="p_infor">
                    <span><i class="fa fa-lock" aria-hidden="true"></i><a href="Admin1/index.php">Admin</a></span> |
                    <span><i class="fa fa-envelope-o" aria-hidden="true"></i>Email: petstore@gmail.com</span> |
                    <span><i class="fa fa-phone" aria-hidden="true"></i> Hotline: 0986-253-693</span> |
                    <span><i class="fa fa-users" aria-hidden="true"></i>
                        <?php
                        if (isset($_SESSION['MaKH']) && isset($_SESSION['TenKH'])) :
                            $name = $_SESSION['TenKH'];
                        ?>
                            <span style="color: red;"><?php echo "<b> Xin Chào : .{$name}.</b>" ?></span>
                        <?php
                        else :
                        ?>
                            <span style="color: red;"><?php echo "<b> Xin Chào : ??.. </b>" ?></span>
                        <?php
                        endif;
                        ?>
                    </span>
                </p>
            </div>
        </div>
        <div class="header_top_menu">
            <div class="header_top_menu_all">
                <div class="header_top">
                    <div class="bg_in">
                        <div class="logo">
                            <a href="#"><img src="./Content/imagetourdien/Logo_Pet.JPG" width="350" height="150" alt="Logo_Pet.JPG" /></a>
                        </div>
                        <nav class="menu_top" style="padding-top: 93px;">
                            <form autocomplete="off" class="search_form" action="index.php?action=home&act=tiemkiem" method="post">
                                <input class="searchTerm" name="search" placeholder="Nhập từ cần tìm..." />
                                <button class="searchButton" type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </form>
                        </nav>
                        <div class="cart_wrapper">
                            <div class="cols_50 bd">
                                <div class="hot_line_top">
                                    <span>
                                        <h4>Cửa hàng</h4>
                                    </span>
                                    <br />
                                    <span class="red">146A Phan Văn Trị<br><br> phường 12,Q.Tân Phú<br><br> TP.HCM</span>
                                </div>
                            </div>
                            <div class="cols_50">
                                <div class="hot_line_top">
                                    <span>
                                        <h4>Thời gian làm việc</h4>
                                    </span>
                                    <br />
                                    <span class="red">Tất cả các ngày trong tuần <br><br> 8:00 AM - 8:00 PM</span>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="btn_menu_search">
                <div class="bg_in">
                    <div class="table_row_search">
                        <div class="menu_top_cate">
                            <div class="">
                                <div class="menu" id="menu_cate">
                                    <div class="menu_left">
                                        <i class="fa fa-bars" aria-hidden="true"></i> Danh mục sản phẩm
                                    </div>
                                    <div class="cate_pro">
                                        <div id='cssmenu_flyout' class="display_destop_menu">
                                            <ul>
                                                <?php
                                                $SP = new SanPham();
                                                $results = $SP->danhMucSanPham();
                                                while ($cate = $results->fetch()) :
                                                ?>
                                                    <li class='active has-sub'>

                                                        <a href='index.php?action=home&act=dmsp&id=<?php echo $cate['MaDMSP']; ?>'><span><?php echo $cate['TenDMSP']; ?></span></a>

                                                    </li>
                                                <?php
                                                endwhile;
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="search_top">
                            <div id='cssmenu'>
                                <ul>
                                    <!-- <li class='active'><a href='index.php'>Trang chủ</a></li>
                                    <li class=''><a href='index.php?action=home&act=contact'>Giới thiệu</a></li> -->

                                    <!-- Menu Động -->
                                    <?php
                                    $MNu = new menu();
                                    $results = $MNu->getList_Menu();
                                    while ($set = $results->fetch()) :
                                    ?>
                                        <li class=''><a href="<?php echo $set['Link'] ?>"><?php echo $set['Ten_menu'] ?></a></li>
                                    <?php
                                    endwhile;
                                    ?>
                                    <!--  -->   
                                    
                                    <li class=''>
                                        <a href='index.php?action=home&act=product'>Sản phẩm</a>
                                        <ul>
                                            <?php
                                            $SP = new SanPham();
                                            $results = $SP->danhMucSanPham();
                                            while ($cate = $results->fetch()) :
                                            ?>
                                                <li>
                                                    <a href='index.php?action=home&act=dmsp&id=<?php echo $cate['MaDMSP']; ?>'><span><?php echo $cate['TenDMSP'] ?></span></a>
                                                </li>
                                            <?php
                                            endwhile;
                                            ?>
                                        </ul>
                                    </li>
                                    <li class=''>
                                        <a href='index.php?action=home&act=post'>Tin tức</a>
                                        <ul>
                                            <?php
                                            $BV = new BaiViet();
                                            $results = $BV->danhmucbaiviet();
                                            while ($cate = $results->fetch()) :
                                            ?>
                                                <li>
                                                    <a href='index.php?action=home&act=dmBV&id=<?php echo $cate['MaDMBV']; ?>'><span><?php echo $cate['TenDMBV'] ?></span></a>
                                                </li>
                                            <?php
                                            endwhile;
                                            ?>
                                        </ul>
                                    </li>
                                    <li class=''>
                                        <?php
                                        if (isset($_SESSION['MaKH']) == true) :
                                        ?>

                                        <li class=''><a href='index.php?action=login&act=log_out' class="nav-link">Đăng xuất</a></li>
                                        <?php
                                                else :
                                        ?>
                                        <li class=''><a href='index.php?action=login' class="nav-link">Đăng nhập</a></li>
                                        <?php
                                                endif;
                                        ?>
                                    </li>
                                    <!-- <li><a href="./MailerPHP/index.php">Test LH</a></li> -->
                                <!-- <li class=''><a href='index.php?action=home&act=cart'>Giỏ hàng</a></li>
                                <li class=''><a href='index.php?action=home&act=contact'>Liên hệ</a></li> -->
                                </ul>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </section>
</header>
<div class="clear"></div>
<style>
    .info_top span i.fa {
        color: #074ac4;
    }

    .info_top span {
        color: #074ac4;
    }

    .hot_line_top span.red {
        color: #074ac4;
        width: 145%;
    }

    .btn_menu_search {
        background: #074ac4;
    }

    .panel-warning>.panel-heading {
        background: #074ac4;
    }

    .searchButton {
        background: #074ac4;
    }

    .searchTerm {
        border: 1px solid #074ac4;
    }
</style>