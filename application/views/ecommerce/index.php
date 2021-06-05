         <!-- Start Slider Area -->
        <div class="slider__container slider--one bg__cat--3">
            <div class="slide__container slider__activation__wrap owl-carousel">
                <!-- Start Single Slide -->
                <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h2>Koleksi <?= date('Y'); ?></h2>
                                        <h1>Kualitas Terbaik</h1>
                                        <div class="cr__btn">
                                            <a href="<?php echo base_url();?>ecommerce/product_grid">Belanja Sekarang</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                    <img src="<?php echo base_url();?>assets/images/slider/front.png" alt="slider images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->
            </div>
        </div>
        <!-- Start Slider Area -->
        <!-- Start Top Rated Area -->
        <section class="top__rated__area bg__white pt--100 pb--110">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">Produk Terbaru</h2>
                            <p>Clothing Kualitas Terbaik</p>
                        </div>
                    </div>
                </div>
                <div class="row mt--20">
                    <!-- Start Single Product -->
                    <?php foreach ($terbaru as $row):?>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="htc__best__product">
                            <div class="htc__best__pro__thumb">
                                <a href="#">
                                    <img src="<?php echo base_url();?>assets/produk/<?php echo $row->gambar;?>" alt="small product">
                                </a>
                            </div>
                            <div class="htc__best__product__details">
                                <h2><a href="product-details.html"><?php echo $row->nama_produk;?></a></h2>
                                <ul class="rating">
                                    <li><i class="icon-star icons"></i></li>
                                    <li><i class="icon-star icons"></i></li>
                                    <li><i class="icon-star icons"></i></li>
                                    <li class="old"><i class="icon-star icons"></i></li>
                                    <li class="old"><i class="icon-star icons"></i></li>
                                </ul>
                                <ul  class="top__pro__prize">
                                    <li>Rp <?php echo number_format($row->harga);?></li>
                                </ul>
                                <div class="best__product__action">
                                    <ul class="product__action--dft">
                                        <li><a href="#"><i class="icon-heart icons"></i></a></li>
                                        <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>
                                        <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach?>
                    <!-- End Single Product -->
                </div>
            </div>
        </section>
        <!-- End Top Rated Area -->
        <!-- Start Brand Area -->
        <div class="htc__brand__area bg__cat--4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ht__brand__inner">
                            <ul class="brand__list owl-carousel clearfix">
                                <li><a href="javascript:void(0);"><img src="<?php echo base_url();?>assets/images/logo/logo.png" alt="brand images"></a></li>
                                <li><a href="javascript:void(0);"><img src="<?php echo base_url();?>assets/images/logo/logo.png" alt="brand images"></a></li>
                                <li><a href="javascript:void(0);"><img src="<?php echo base_url();?>assets/images/logo/logo.png" alt="brand images"></a></li>
                                <li><a href="javascript:void(0);"><img src="<?php echo base_url();?>assets/images/logo/logo.png" alt="brand images"></a></li>
                                <li><a href="javascript:void(0);"><img src="<?php echo base_url();?>assets/images/logo/logo.png" alt="brand images"></a></li>
                                <li><a href="javascript:void(0);"><img src="<?php echo base_url();?>assets/images/logo/logo.png" alt="brand images"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a href="https://api.whatsapp.com/send?phone=6285157552214&text=Hallo%20Agan%20Colonizer.co" target="_blank" class="icon-whatsapp">
            <img src="<?php echo base_url();?>assets/images/logo/whatsapp.png" alt="icon whatsapp" id="whatsapp" >
        </a>