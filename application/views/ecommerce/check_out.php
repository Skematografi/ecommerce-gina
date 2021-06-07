
<?php
$grand_total = 0;
$member_id = $this->session->userdata('member_id');

$CI =& get_instance();
$CI->load->model('Model_Location');

$locations = $CI->Model_Location->getState();

if ($cart = $this->cart->contents()){
        foreach ($cart as $item){
            $grand_total = $grand_total + $item['subtotal'];
        }  
?>
     <!-- cart-main-area start -->
        <div class="cart-main-area ptb--50 bg__white">
            <div class="container">
                <div class="row" style="margin : auto; padding: 5px; ">
                    <div class="col-md-12">
                        <form action="<?php echo base_url()?>cart/proses_order" method="post" autocomplete="off">
                            <input type="hidden" name="member_id" id="member_id" maxlength="50" value="<?php echo ($member_id == '' ? '' : $member_id) ; ?>" required>

                            <div class="row">
                                <div class="htc__cart__total">
                                    <div class="col-sm-6"> 
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" name="name" id="name" maxlength="50" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6"> 
                                        <div class="form-group">
                                            <label>Provinsi</label>
                                            <select style="height: 30px;" name="state" id="state" onchange="getCity(this)" required>
                                                <option selected disabled>--Pilih Provinsi--</option>
                                                <?php foreach($locations as $row): ?>
                                                    <option value="<?= $row['state']; ?>" data-state-id="<?= $row['state_id']; ?>"><?= $row['state']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="htc__cart__total">
                                    <div class="col-sm-6"> 
                                        <div class="form-group">
                                            <label>Telepon</label>
                                            <input type="text" name="phone" id="phone" maxlength="15" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6"> 
                                        <div class="form-group">
                                            <label>Kabupaten</label>
                                            <select style="height: 30px;" name="city" id="city" onchange="getDistrict(this)" required disabled>
                                                <option selected disabled>--Pilih Kabupaten/Kota--</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                            <div class="htc__cart__total">
                                <div class="col-sm-6"> 
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" id="email" required>
                                    </div>
                                </div>
                                <div class="col-sm-6"> 
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <select style="height: 30px;" name="district" id="district" onchange="getCost()" required disabled>
                                            <option selected disabled>--Pilih Kecamatan--</option>
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
                                        <?php
                                            if($member_id != ''){
                                                echo '<li>DISKON</li>';
                                            }
                                        ?>
                                    </ul>
                                    <ul class="cart__price">
                                        <li class="text-right">Rp <input type="text" style="border: none; float: right; text-align: right; width: 100px;" id="grand_total" name="grand_total" value="<?php echo $grand_total; ?>" readonly></li>
                                        <li class="text-right">Rp <input type="text" style="border: none; float: right; text-align: right; width: 100px;" id="ongkir" name="ongkir" readonly required></li>
                                        <?php
                                            if($member_id != ''){
                                                echo '<li class="text-right"><input type="text" style="border: none; float: right; text-align: right; width: 100px;" id="discount" name="discount" value="Potongan 5%" readonly required></li>';
                                            }
                                        ?>
                                        
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
    } else {
        echo "<h5>Shopping Cart masih kosong</h5>"; 
    }
?>
                    </div>
                </div>
            </div>
        </div>

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

     <!-- Body main wrapper end -->
     <script>

        function getCity(ele){
            let state_id = $(ele).find('option:selected').attr('data-state-id');
            let url = "<?php echo base_url(); ?>cart/getCityByState";


            $.ajax({
                type : 'POST',
                url : url,
                data : { state_id : state_id},
                success : function(res){

                    let array_city = JSON.parse(res);

                    $('#city').empty().append('<option selected disabled>--Pilih Kabupaten/Kota--</option>');
                    
                    array_city.forEach(function(entry){
                        $('#city').append('<option value="'+entry['city']+'" data-city-id="'+entry['city_id']+'">'+entry['full_city']+'</option>');
                    });

                    $('#city').attr('disabled', false);
                    $('#district').empty().append('<option selected disabled>--Pilih Kecamatan--</option>');
                    $('#district').attr('disabled', true);

                }, error : function(err){
                   console.log(err)
                } 
                
            })
        }

        function getDistrict(ele){
            let city_id = $(ele).find('option:selected').attr('data-city-id');
            let url = "<?php echo base_url(); ?>cart/getDistrictByCity";


            $.ajax({
                type : 'POST',
                url : url,
                data : { city_id : city_id},
                success : function(res){

                    let array_district = JSON.parse(res);

                    $('#district').empty().append('<option selected disabled>--Pilih Kabupaten/Kota--</option>');
                    
                    array_district.forEach(function(entry){
                        $('#district').append('<option value="'+entry['district']+'" data-district-id="'+entry['district_id']+'">'+entry['district']+'</option>');
                    });

                    $('#district').attr('disabled', false);

                }, error : function(err){
                   console.log(err)
                } 
                
            })
        }

        function getCost(){
            let city_id = $('#city').find('option:selected').attr('data-city-id');
            let url = "<?php echo base_url(); ?>ecommerce/getCost";


            $.ajax({
                type : 'POST',
                url : url,
                data : { city_id : city_id},
                success : function(res){

                    let raja_ongkir = JSON.parse(res);
                    let cost = parseInt(raja_ongkir.cost)
                    let grand_total = parseInt($('#grand_total').val());
                    let member_id = $('#member_id').val();

                    $('#ongkir').val(cost);

                    if(member_id == ''){
                        $('#total').val(cost+grand_total);
                    } else {
                       let discount = (grand_total/100) * 5;
                       let total_after_discount = grand_total - discount;
                       $('#total').val(cost+total_after_discount);

                    }


                }, error : function(err){
                   console.log(err)
                } 
                
            })
        }
    </script>
 