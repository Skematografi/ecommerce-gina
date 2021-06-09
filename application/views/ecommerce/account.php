<section class="top__rated__area bg__white">
  <div class="container" style="margin-top:0px;">
    <h3 class="card-title" style="margin-bottom: 50px; margin-top:50px;"><?php echo $this->session->flashdata('message'); ?></h3>
    <div class="row" style="margin-bottom: 50px;">

      <div class="col-md-4">
        <div class="bradcaump__inner">
            <div class="image">
              <img src="<?php echo base_url();?>assets/images/avatar/user.png" style="width: 200px; height: 200px;" class="img-circle elevation-2" alt="User Image">
            </div></br>
            <h2 class="title__line--6">Profil</h2>
        </div>
        <a href="<?php echo base_url();?>auth/logout" class="btn btn-default" style="width:45%; margin-right:10px;">Keluar</a>
        <button type="button" class="btn btn-primary" style="width:45%;"  onclick="updateProfil()">Update</button>
      </div>

      <div class="col-md-8">
        <form action="" method="post" id="formProfil" autocomplete="off">
          <div class="row">
            <div class="col-sm-6" >
              <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $profil->name; ?>" required>
              </div>                              
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $profil->email; ?>" required>
              </div>
            </div>
            <div class="col-sm-6" >
              <div class="form-group">
                  <label>Provinsi</label>
                  <select style="height: 30px;" name="state" id="state" onchange="getCity(this)" required>
                      <option value="" selected disabled>--Pilih Provinsi--</option>
                      <?php foreach($locations as $row): ?>
                          <option value="<?= $row['state']; ?>" data-state-id="<?= $row['state_id']; ?>" <?= ($profil->state == $row['state'] ? 'selected' : ''); ?>><?= $row['state']; ?></option>
                      <?php endforeach; ?>
                  </select>
              </div>
              <div class="form-group">
                  <label>Kabupaten</label>
                  <select style="height: 30px;" name="city" id="city" onchange="getDistrict(this)" required disabled>
                      <option value="" selected disabled>--Pilih Kabupaten/Kota--</option>
                      <?php
                        if($profil->city != NULL){
                          echo '<option value="'.$profil->city.'" selected>'.$profil->city.'</option>';
                        }
                      ?>
                  </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6" >                              
              <div class="form-group">
                <label for="exampleInputEmail1">Telepon</label>
                <input type="number" class="form-control" id="phone" name="phone" value="<?php echo $profil->phone; ?>" required>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Jenis Kelamin</label>
                <select style="height: 30px;" name="gender" required>
                    <option value="" selected disabled>--Pilih Jenis Kelamin--</option>
                    <option value="Pria"<?= ($profil->gender == 'Pria' ? 'selected' : ''); ?>>Pria</option>
                    <option value="Wanita"<?= ($profil->gender == 'Wanita' ? 'selected' : ''); ?>>Wanita</option>
                </select>
              </div>  
            </div>
            <div class="col-sm-6" >  
              <div class="form-group">                            
                <label>Kecamatan</label>
                <select style="height: 30px;" name="district" id="district" required disabled>
                    <option selected disabled>--Pilih Kecamatan--</option>
                    <?php
                      if($profil->district != NULL){
                        echo '<option value="'.$profil->district.'" selected>'.$profil->district.'</option>';
                      }
                    ?>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Kode Pos</label>
                <input type="number" class="form-control" id="postal_code" name="postal_code" value="<?php echo $profil->postal_code; ?>" required>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-sm-12"> 
              <div class="form-group">
                  <label>Alamat</label>
                  <textarea style="background-color: white; border-color: black;" name="address" id="address" required><?php echo $profil->address; ?></textarea>
              </div>
            </div> 
          </div>             
        </form>
      </div>

    </div>

  </div>
</section>

<a href="https://api.whatsapp.com/send?phone=6285157552214&text=Hallo%20Agan%20Colonizer.co" target="_blank" class="icon-whatsapp">
    <img src="<?php echo base_url();?>assets/images/logo/whatsapp.png" alt="icon whatsapp" id="whatsapp" >
</a>

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

  function updateProfil(){
    var data = $('#formProfil').serialize();

    $.ajax({
        type : 'POST',
        url : '<?php echo site_url(); ?>account/update',
        data :  data,
        success : function(){
            window.location.href = '<?php echo base_url(); ?>account';
        }
    });
  }
</script>