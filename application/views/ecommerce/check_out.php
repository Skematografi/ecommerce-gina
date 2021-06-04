
<?php
$grand_total = 0;
if ($cart = $this->cart->contents())
    {
        foreach ($cart as $item)
            {
                $grand_total = $grand_total + $item['subtotal'];
            }  
?>
     <!-- cart-main-area start -->
        <div class="cart-main-area ptb--50 bg__white">
            <div class="container">
                <div class="row" style="margin : auto; padding: 5px; ">
                    <div class="col-md-12">
                        <form action="<?php echo base_url()?>cart/proses_order" method="post" autocomplete="off">
                            <input type="hidden" name="id_pelanggan" id="id_pelanggan" maxlength="50" value="<?php echo $profil->id; ?>" required>

                            <div class="row">
                            <div class="htc__cart__total">
                                <div class="col-sm-6"> 
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" id="nama" maxlength="50" required>
                                    </div>
                                </div>
                                <div class="col-sm-6"> 
                                    <div class="form-group">
                                        <label>Telpon</label>
                                        <input type="text" name="telpon" id="telpon" required>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="htc__cart__total">
                                <div class="col-sm-6"> 
                                    <div class="form-group">
                                        <label>Kabupaten</label>
                                        <input type="text" name="kabupaten" id="kabupaten" value="Lebak" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6"> 
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <select style="height: 30px;" name="kecamatan" id="kecamatan">
                                            <option selected disabled>Pilihan</option>
                                            <option value="banjarsari">Banjarsari</option>
                                            <option value="bayah">Bayah</option>
                                            <option value="bojongmanik">Bojongmanik</option>
                                            <option value="cibadak">Cibadak</option>
                                            <option value="cibeber">Cibeber</option>
                                            <option value="cigemblong">Cigemblong</option>
                                            <option value="cihara">Cihara</option>
                                            <option value="cijaku">Cijaku</option>
                                            <option value="cikulur">Cikulur</option>
                                            <option value="cileles">Cileles</option>
                                            <option value="cilogran">Cilogran</option>
                                            <option value="cimarga">Cimarga</option>
                                            <option value="cipanas">Cipanas</option>
                                            <option value="cirinten">Cirinten</option>
                                            <option value="curugbitung">Curugbitung</option>
                                            <option value="gunungkencana">Gunungkencana</option>
                                            <option value="kalang_anyar">Kalang Anyar</option>
                                            <option value="lebak_gedong">Lebak Gedong</option>
                                            <option value="leuwidamar">Leuwidamar</option>
                                            <option value="maja">Maja</option>
                                            <option value="malingping">Malingping</option>
                                            <option value="muncang">Muncang</option>
                                            <option value="panggarang">Panggarangan</option>
                                            <option value="rangkasbitung">Rangkasbitung</option>
                                            <option value="sajira">Sajira</option>
                                            <option value="sobang">Sobang</option>
                                            <option value="wanasalam">Wanasalam</option>
                                            <option value="warunggunung">Warunggunung</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12"> 
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea style="background-color: white; border-color: black;" name="alamat" id="alamat" required></textarea>
                                    </div>
                                </div> 
                            </div>
                            </div>
                            <div class="htc__cart__total">                          
                                <h6 class="text-center">Total Belanja</h6>
                                <div class="cart__desk__list">
                                    <ul class="cart__desc">
                                        <li>Total</li>
                                        <li>Pengiriman</li>
                                    </ul>
                                    <ul class="cart__price">
                                        <li class="text-right">Rp <input type="text" style="border: none; float: right; text-align: right; width: 100px;" id="grand_total" name="grand_total" value="<?php echo $grand_total; ?>" readonly></li>
                                        <li class="text-right">Rp <input type="text" style="border: none; float: right; text-align: right; width: 100px;" id="ongkir" name="ongkir" readonly required></li>
                                    </ul>
                                </div><hr>
                                <div class="cart__desk__list">
                                    <ul class="cart__price">
                                        <li>TOTAL BELANJA</li>
                                    </ul>
                                    <ul class="cart__price">
                                        <li class="text-right">Rp <input type="text" style="border: none; float: right; text-align: right; width: 100px;" id="total" name="total" readonly></li>
                                    </ul>
                                </div>
                                <ul class="payment__btn">
                                    <li class="active"><a><button type="submit" style="background: transparent; border: none; font-size: 12pt;"><b>PEMBAYARAN</b></button></a></li>
                                </ul>
                            </div>
                            
                        </form>
                        <?php
                        }
                        else
                            {
                                echo "<h5>Shopping Cart masih kosong</h5>"; 
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <!-- Body main wrapper end -->
    <script>
        $(document).ready(function(){
          $("#kecamatan").click(function(){
            var kec = $('#kecamatan').val();

            if(kec == 'rangkasbitung'){
                $('#ongkir').val(0);
            }else{
                $('#ongkir').val(10000);
            }
            

          });

          $("#kecamatan").click(function(){
            var grand = $('#grand_total').val(); 
            var ongkir = $('#ongkir').val();

            var total = parseInt(grand)+parseInt(ongkir);
            $('#total').val(total);

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
 