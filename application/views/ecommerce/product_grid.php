        <!-- Start Product Grid -->
        <section class="htc__product__grid bg__white">
            <div class="container">
                <hr><h2 class="text-center">PRODUK KAMI</h2><hr>
                <h2 style="text-align: center;"><?php echo $this->session->flashdata('message'); ?></h2>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="htc__product__rightidebar">
                            <div class="htc__grid__top">
                                <div class="htc__select__option">
                                   
                                </div>
                            </div>
                            <!-- Start Product View -->
                            <div class="row">
                                
                                <div class="shop__grid__view__wrap">
                                    <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                        <!-- Start Single Product -->
                                        <?php foreach ($produk as $item): ?>
                                            <form id="formDisplay" method="POST" action="<?php echo base_url(); ?>ecommerce/product_detail" >
                                                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                                    <div class="category">
                                                        <div class="ht__cat__thumb">
                                                        <button style="border: none;" type="submit">
                                                            <a href="javascript:void(0);">
                                                                <img src="<?php echo base_url();?>assets/produk/<?php echo $item->image;?>" title="Klik untuk melihat detil produk" alt="product images" style="width:350px; height:350px;">
                                                            </a>
                                                        </button>
                                                        </div>
                                                        <div class="fr__hover__info">
                                                            <ul class="product__action">
                                                                <li><button style="border: none;" type="submit"><a href="javascript:void(0);"  title="Klik untuk melihat detil produk"><i class="icon-magnifier icons"></i></a></button></li>
                                                            </ul>
                                                        </div>
                                                        <div class="fr__product__inner">
                                                            <h4><?php echo $item->name; ?></h4>
                                                            <ul class="fr__pro__prize">
                                                                <li>Rp <?php echo number_format($item->price); ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="code" value="<?php echo $item->code; ?>" >
                                                <input type="hidden" name="name" value="<?php echo $item->name; ?>" >
                                                <input type="hidden" name="image" value="<?php echo $item->image; ?>" >
                                            </form>
                                        <?php endforeach; ?>
                                        <!-- End Single Product -->
                                    </div>
                                </div>

                            </div>
                            <!-- End Product View -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Grid -->
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
    </div>

    <a href="https://api.whatsapp.com/send?phone=6285157552214&text=Hallo%20Agan%20Colonizer.co" target="_blank" class="icon-whatsapp">
        <img src="<?php echo base_url();?>assets/images/logo/whatsapp.png" alt="icon whatsapp" id="whatsapp" >
    </a>


        <footer id="htc__footer">
            <!-- Start Footer Widget -->
            <div class="footer__container bg__cat--1">
                <div class="container">
                    <div class="row">
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-3 col-sm-2">
                            <div class="footer">
                                <h2 class="title__line--2">Kontak</h2>
                                <div class="ft__details">
                                    <p>Telepon :  0821-2345-9695</p>
                                    <p>Instagram :  @colonizer.co</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-2">
                            <div class="footer">
                                <h2 class="title__line--2">Alamat</h2>
                                <div class="ft__details">
                                    <p> Jl. Kp. Pengkolan, RT.04/RW.01, Pasir Gadung, Kec. Cikupa Tangerang Banten 15710</p>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-3 col-sm-6 col-xs-12 xmt-40">
                            <div class="footer">
                                <h2 class="title__line--2">informasi</h2>
                                <div class="ft__inner">
                                    <ul class="ft__list">
                                        <li><a href="#">Informasi Pengiriman</a></li>
                                        <li><a href="#">Privacy & Policy</a></li>
                                        <li><a href="#">Terms  & Condition</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer Widget -->
            <!-- Start Copyright Area -->
            <div class="htc__copyright bg__cat--5">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="copyright__inner">
                                <p>Copyright© <a href="javascript:void(0);">Clothing Brand Colonizer.co</a> 2021. All right reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Copyright Area -->
        </footer>
        <!-- End Footer Style -->
    </div>
    <!-- Body main wrapper end -->

    <!-- Placed js at the end of the document so the pages load faster -->
    <!-- Bootstrap framework js -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="<?php echo base_url();?>assets/js/plugins.js"></script>
    <script src="<?php echo base_url();?>assets/js/slick.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/ajax-mail.js"></script>
    <!-- Bootstrap framework js -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="<?php echo base_url();?>assets/js/plugins.js"></script>
    <script src="<?php echo base_url();?>assets/js/slick.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/owl.carousel.min.js"></script>
    <!-- Waypoints.min.js. -->
    <script src="<?php echo base_url();?>assets/js/waypoints.min.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="<?php echo base_url();?>assets/js/main.js"></script>

    <script src="<?php echo base_url();?>assets/plugins/toastr/toastr.min.js"></script>

    <script src="<?php echo base_url();?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>

    <script type="text/javascript">
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });

        $('.swalDefaultSuccess').click(function() {
          Toast.fire({
            type: 'success',
            title: 'Produk masuk keranjang.'
          })
        });
        
      });
    </script>
</body>

</html>