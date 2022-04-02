 <section>
        <div class="bg_in">
            <style type="text/css">
                .carousel-inner .item img {
                        height: 374px !important;
                    }
            </style>
            <div class="col-md-7 col-xs-12 col-sm-12" style="padding: 0;margin-top:10px;">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                        <li data-target="#myCarousel" data-slide-to="4"></li>
                        <li data-target="#myCarousel" data-slide-to="5"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" style="width:100%;">
                        <div class="item active">
                            <img src="./Content/imagetourdien/Slider1.jpg" alt="Mô hình DC" width="100%">
                        </div>

                        <div class="item">
                            <img src="./Content/imagetourdien/Slider2.jpg" alt="Siêu khuyến mãi" width="100%">
                        </div>

                        <div class="item">
                            <img src="./Content/imagetourdien/Slider3.jpg" alt="Siêu khuyến mãi" width="100%">
                        </div>

                         <div class="item">
                            <img src="./Content/imagetourdien/Slider4.jpg" alt="Siêu khuyến mãi" width="100%">
                        </div>

                         <div class="item">
                            <img src="./Content/imagetourdien/Slider5.jpg" alt="Siêu khuyến mãi" width="100%">
                        </div>

                         <div class="item">
                            <img src="./Content/imagetourdien/Slider6.jpg" alt="Siêu khuyến mãi" width="100%">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-12" style="padding: 0;margin-left:75px;margin-top:5px;">
                <div class="row">
                    <div class="panel  panel-warning panel-styling">
                        <div class="panel-heading">Tin tức cập nhật</div>
                        <div class="panel-body scrollable-panel">
                            <?php
                            $SP = new BaiViet();
                            $results=$SP->AllBaiViet();
                            while($pro_cate=$results->fetch()):
                            ?>
                            <div class="row">
                                <div class="col-md-4 col-xs-4 col-sm-4">
                                    <img src="<?php echo 'Admin1/Content/image/post/'.$pro_cate['AnhBV'];?>">
                                </div>
                                <div class="col-md-8 col-xs-8 col-sm-8">
                                    <h4><?php echo $pro_cate['TenBV'] ?></h4>
                                    <p><?php echo substr($pro_cate['NoiDung'], 0,100) ?></p>
                                </div>
                            </div>
                            <hr>
                            <?php
                            endwhile;
                            ?>
                           
                          
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="clear"></div>
</section>
