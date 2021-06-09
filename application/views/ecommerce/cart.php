<?php
    if ($cart = $this->cart->contents())
        {
 ?>
     <!-- cart-main-area start -->
        <div class="cart-main-area ptb--100 bg__white next-pay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="<?php echo base_url()?>cart/ubah_cart" method="post" name="frmShopping" id="frmShopping" class="form-horizontal form-cart" enctype="multipart/form-data">               
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">No.</th>
                                            <th class="product-thumbnail">Produk</th>
                                            <th class="product-name">Nama Produk</th>
                                            <th class="product-name">Size</th>
                                            <th class="product-price">Harga</th>
                                            <th class="product-quantity">Jumlah</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php

                                            $grand_total = 0;
                                            $i = 1;

                                            foreach ($cart as $item):
                                            $grand_total = $grand_total + $item['subtotal'];
                                            ?>
                                            <input type="hidden" name="cart[<?php echo $item['id'];?>][id]" value="<?php echo $item['id'];?>" />
                                            <input type="hidden" name="cart[<?php echo $item['id'];?>][rowid]" value="<?php echo $item['rowid'];?>" />
                                            <input type="hidden" name="cart[<?php echo $item['id'];?>][name]" value="<?php echo $item['name'];?>" />
                                            <input type="hidden" name="cart[<?php echo $item['id'];?>][size]" value="<?php echo $item['size'];?>" />
                                            <input type="hidden" name="cart[<?php echo $item['id'];?>][price]" value="<?php echo $item['price'];?>" />
                                            <input type="hidden" name="cart[<?php echo $item['id'];?>][gambar]" value="<?php echo $item['gambar'];?>" />
                                            <input type="hidden" name="cart[<?php echo $item['id'];?>][qty]" value="<?php echo $item['qty'];?>" />
                                            <input type="hidden" id="stok" name="cart[<?php echo $item['id'];?>][stock]" value="<?php echo $item['stock'];?>" />
                                            <input type="hidden" name="id_produk" id="id_produk" value="<?php echo $item['id'];?>">
                                            <input type="hidden" name="sisa" id="sisa">
                                            <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><img class="img-responsive" style="width: 100px; height: 100px;" src="<?php echo base_url() . 'assets/produk/'.$item['gambar']; ?>"/></td>
                                            <td><?php echo $item['name']; ?></td>
                                            <td><?php echo $item['size']; ?></td>
                                            <td><?php echo number_format($item['price'], 0,",","."); ?></td>
                                            <td>
                                                <input type="number" min="1" max="<?php echo $item['stock'];?>" class="form-control input-sm" id="jumlah" name="cart[<?php echo $item['id'];?>][qty]" value="<?php echo $item['qty'];?>" />
                                            </td>
                                            <td><?php echo number_format($item['subtotal'], 0,",",".") ?></td>
                                            <td>
                                                <a href="<?php echo base_url()?>cart/hapus/<?php echo $item['rowid'];?>" title="Hapus produk dari keranjang" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                            </td>
                                            <?php endforeach; ?>
                                        </tr>
                                        <tr>
                                            <td colspan="8">
                                                <b style="font-size: 18pt; font-family: helvetica; color: black;">Total : Rp <?php echo number_format($grand_total, 0,",","."); ?></b>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="buttons-cart--inner">
                                        <div class="buttons-cart--inner">
                                        </div>
                                        <div class="buttons-cart">
                                            <input type="submit" value="UPDATE CART">
                                            <input type="button" class="kurangi_stok" value="CHECK OUT">                       
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php
                                }
                            else
                                {
                                    echo "<h2 style='text-align:center; margin:20px;'><i style='color:gray; padding:20px; font-size: 50pt;' class='fas fa-shopping-cart'></i><br>Keranjang kosong</h2>"; 
                                }   
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
    <div class="pembayaran">
                            
    </div>     

    <a href="https://api.whatsapp.com/send?phone=6285157552214&text=Hallo%20Agan%20Colonizer.co" target="_blank" class="icon-whatsapp">
        <img src="<?php echo base_url();?>assets/images/logo/whatsapp.png" alt="icon whatsapp" id="whatsapp" >
    </a>
        
    </div>

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


    <script>
         $(document).ready(function(){
            var stok = parseInt($("#stok").val());
            var jumlah = parseInt($("#jumlah").val());
            var hasil = stok-jumlah;
            $("#sisa").val(hasil);            

          });

        $(document).ready(function(){
          $("#jumlah").change(function(){
            var stok = parseInt($("#stok").val());
            var jumlah = parseInt($("#jumlah").val());
            var hasil = stok-jumlah;
            $("#sisa").val(hasil);            

          });

        });
    </script>

    <script>
        $(document).ready(function(){
          $(".kurangi_stok").click(function(){
                
                var data = $('.form-cart').serialize();

                $.ajax({
                    type : 'POST',
                    url : '<?php echo base_url(); ?>cart/check_out',
                    data :  data,
                    success : function(){
                        $('.next-pay').hide();
                        $('.pembayaran').load('<?php echo base_url(); ?>cart/pembayaran');
                    }
                });
            });  

        });
    </script>
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

</body>

</html>