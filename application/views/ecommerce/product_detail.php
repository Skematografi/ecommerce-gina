        <!-- Start Product Grid -->
        <section class="htc__product__grid bg__white">
            <div class="container">
                <hr><h2 class="text-center">DETIL PRODUK</h2><hr>
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
                                <?php foreach ($produk as $item): ?>
                                    <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                                        <div class="htc__product__details__tab__content">
                                            <!-- Start Product Big Images -->
                                            <div class="product__big__images">
                                                <div class="portfolio-full-image tab-content">
                                                    <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                                        <img src="<?php echo base_url();?>assets/produk/<?php echo $item->image;?>" alt="full-image">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Product Big Images -->
                                            <!-- Start Small images -->
                                            <!-- End Small images -->
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                                        <div class="ht__product__dtl">
                                            <h2><?php echo $item->name; ?></h2>
                                            <h6>Model: <span><?php echo $item->code; ?></span></h6>
                                            <ul class="rating">
                                                <li><i class="icon-star icons"></i></li>
                                                <li><i class="icon-star icons"></i></li>
                                                <li><i class="icon-star icons"></i></li>
                                                <li class="old"><i class="icon-star icons"></i></li>
                                                <li class="old"><i class="icon-star icons"></i></li>
                                            </ul>
                                            <ul  class="pro__prize">
                                                <li>Rp <?php echo number_format($item->price); ?></li>
                                            </ul>
                                            <!-- <p class="pro__info">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.  Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan</p> -->
                                            <div class="ht__pro__desc">
                                                <div class="sin__desc">
                                                    <p><span>Availability:</span> In Stock</p>
                                                </div>
                                                <div class="sin__desc align--left">
                                                    <p><span>size</span></p>
                                                    <select class="select__size" style="width: max-content;" required id="size" onchange="getStock(this)">
                                                        <?php echo ($item->one_size == NULL ? '<option value="" selected disabled>--Selected--</option>' : ''); ?>
                                                        <option value="S" <?php echo ($item->s == NULL ? 'hidden' : ''); ?> data-stock="<?= $item->s; ?>">S</option>
                                                        <option value="M" <?php echo ($item->m == NULL ? 'hidden' : ''); ?> data-stock="<?= $item->m; ?>">M</option>
                                                        <option value="L" <?php echo ($item->l == NULL ? 'hidden' : ''); ?> data-stock="<?= $item->l; ?>">L</option>
                                                        <option value="XL" <?php echo ($item->xl == NULL ? 'hidden' : ''); ?> data-stock="<?= $item->xl; ?>">XL</option>
                                                        <option value="XXL" <?php echo ($item->xxl == NULL ? 'hidden' : ''); ?> data-stock="<?= $item->xxl; ?>">XXL</option>
                                                        <option value="One Size" <?php echo ($item->one_size == NULL ? 'hidden' : 'Selected'); ?> data-stock="<?= $item->one_size; ?>">One Size</option>
                                                    </select>
                                                </div>
                                                <div class="sin__desc align--left">
                                                    <p><span>Quantity</span></p>
                                                    <input type="number" value="1" id="quantity" onchange="funcQuantity()" class="form-control" style="margin-left:10px; width: 100px;">
                                                    <input type="hidden" id="code" value="<?= $item->code; ?>">
                                                    <input type="hidden" id="stock">
                                                </div>
                                                <div class="sin__desc align--left">
                                                    <p><span>Categories:</span></p>
                                                    <ul class="pro__cat__list">
                                                        <li><?php echo $item->category; ?></li>
                                                    </ul>
                                                </div>

                                                <div class="sin__desc product__share__link">
                                                    <p><span>Description :</span></p>
                                                    <ul class="pro__share">
                                                        <li><?= $item->description; ?></li>
                                                    </ul>
                                                </div>
                                                <div class="sin__desc align--left">
                                                    <div class="send__btn">
                                                        <a href="javascript:void(0);" class="fr__btn"><i class="icon-handbag icons" onclick="tambahKeranjang()"> Masukan Keranjang</i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <!-- End Product View -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Grid -->
        <!-- Start Brand Area -->
        <!-- End Brand Area -->
    </div>

        
    <a href="https://api.whatsapp.com/send?phone=6285157552214&text=Hallo%20Agan%20Colonizer.co" target="_blank" class="icon-whatsapp">
        <img src="<?php echo base_url();?>assets/images/logo/whatsapp.png" alt="icon whatsapp" id="whatsapp" >
    </a>

    <footer id="htc__footer" style="margin-top: 100px;">
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

        function getStock(ele){
            let stock = $(ele).find('option:selected').attr('data-stock');
            $('#stock').val(stock);
        }

        function funcQuantity(){
            let quantity = $('#quantity').val();
            let stock = $('#stock').val();

            if(parseInt(quantity) < 1){
                Swal.fire({
                    icon: 'error',
                    text: 'Quantity minimal 1'
                });

                $('#quantity').val(1);
            }
            
            if(parseInt(stock) < parseInt(quantity)){
                Swal.fire({
                    icon: 'error',
                    text: 'Quantity melebihi jumlah stock'
                });

                $('#quantity').val(1);
               
            }
        }

        function tambahKeranjang(){
            let url = "<?php echo base_url(); ?>cart/tambah";
            let size = $('#size').val();

            if(size == null){
                Swal.fire({
                    icon: 'error',
                    text: 'Size belum dipilih'
                });

            } else {

                $.ajax({
                    type : 'POST',
                    url : url,
                    data : {
                        code : $('#code').val(),
                        size : $('#size').val(),
                        quantity : $('#quantity').val()
                    },
                    success : function(res){
                        let msg = JSON.parse(res).success;
                        let cart = JSON.parse(res).total_cart;
                        let link = JSON.parse(res).link;

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2000
                        });
    
                        Toast.fire({
                            type: 'success',
                            title: msg
                        }); 

                        setTimeout(function(){// wait for 5 secs(2)
                            window.location.href = "<?= base_url(); ?>"+link;
                        }, 2000); 
    
                    }, error : function(err){
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        Toast.fire({
                            type: 'error',
                            title: err,
                            timer : 3000
                        })
                    } 
                    
                })
            }
            
        }

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