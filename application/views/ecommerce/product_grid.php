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
                                        <form action="<?php echo base_url(); ?>cart/tambah" method="post" accept-charset="utf-8">
                                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12" style="width:400px;">
                                            <div class="category">  
                                                <div class="ht__cat__thumb" style="border:1px solid black;">
                                                    <a href="#">
                                                        <img style="width: 200px; height: 200px;" src="<?php echo base_url();?>assets/produk/<?php echo $item->gambar;?>" alt="product images">
                                                    </a>
                                                    
                                                </div>
                                                <?php echo $item->deskripsi; ?>
                                                <div class="fr__hover__info">
                                                    <ul class="product__action">
                                                        <li>
                                                            <a>
                                                                <button type="submit" class="swalDefaultSuccess" style="border: none; background-color: transparent;">
                                                                    <i class="icon-handbag icons"></i>
                                                                </button>
                                                            </a>
                                                        </li>
                                                    </ul><br> 
                                                    <strong style=" color: black;"><?php echo $item->nama_produk; ?></strong><br>
                                                    <strong style="margin-right: 30px; font-size: 15pt; color: black;">Rp <?php echo number_format($item->harga); ?></strong>  
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id" value="<?php echo $item->id_produk; ?>" >
                                        <input type="hidden" name="nama" value="<?php echo $item->nama_produk; ?>" >
                                        <input type="hidden" name="gambar" value="<?php echo $item->gambar; ?>" >
                                        <input type="hidden" name="harga" value="<?php echo $item->harga; ?>" > 
                                        <input type="hidden" name="qty" value="1" >

                                        <input type="hidden" name="stok" value="<?php echo $item->stok; ?>">
                                        </form>
                                        <?php endforeach; ?>
                                        <!-- End Single Product -->
                                    </div>
                                </div>

                            </div>
                            <!-- End Product View -->
                        </div>
                        <!-- Start Pagenation -->
                        <!-- <div class="row">
                            <div class="col-xs-12">
                                <ul class="htc__pagenation">
                                   <li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li> 
                                   <li><a href="#">1</a></li> 
                                   <li class="active"><a href="#">3</a></li>   
                                   <li><a href="#">19</a></li> 
                                   <li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li> 
                                </ul>
                            </div>
                        </div> -->
                        <!-- End Pagenation -->
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Grid -->
        <!-- Start Brand Area -->
        <div class="htc__brand__area bg__cat--4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ht__brand__inner">
                            <ul class="brand__list owl-carousel clearfix">
                                <li><a href="#"><img src="<?php echo base_url();?>assets/images/brand/1.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="<?php echo base_url();?>assets/images/brand/2.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="<?php echo base_url();?>assets/images/brand/3.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="<?php echo base_url();?>assets/images/brand/4.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="<?php echo base_url();?>assets/images/brand/5.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="<?php echo base_url();?>assets/images/brand/5.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="<?php echo base_url();?>assets/images/brand/1.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="<?php echo base_url();?>assets/images/brand/2.png" alt="brand images"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Brand Area -->
    </div>



 <footer id="htc__footer">
            <!-- Start Footer Widget -->
            <div class="footer__container bg__cat--1">
                <div class="container">
                    <div class="row">
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-3 col-sm-2">
                            <div class="footer">
                                <h2 class="title__line--2">Tentang</h2>
                                <div class="ft__details">
                                    <p>Website penjualan barang rumah tangga.</p>
                                    <div class="ft__social__link">
                                        <ul class="social__link">
                                            <li><a href="#"><i class="icon-social-twitter icons"></i></a></li>

                                            <li><a href="#"><i class="icon-social-instagram icons"></i></a></li>

                                            <li><a href="#"><i class="icon-social-facebook icons"></i></a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-2 col-sm-6 col-xs-12 xmt-40">
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
                        <!-- End Single Footer Widget -->
                         <!-- Start Single Footer Widget -->
                        <div class="col-md-3 col-sm-6 col-xs-12 xmt-40 smt-40">
                            <div class="footer">
                                <h2 class="title__line--2">NEWSLETTER </h2>
                                <div class="ft__inner">
                                    <div class="news__input">
                                        <input type="text" placeholder="Your Mail*">
                                        <div class="send__btn">
                                            <a class="fr__btn" href="#">Send Mail</a>
                                        </div>
                                    </div>
                                    
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
                                <p>Copyright© <a href="#">Toko Sinar Rangkasbitung</a> 2020. All right reserved.</p>
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