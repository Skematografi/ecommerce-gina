<section class="top__rated__area bg__white pt--100 pb--110">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="bradcaump__inner">
          <nav class="bradcaump-inner">
            <div class="image">
              <img src="<?php echo base_url();?>assets/images/avatar/user.png" style="width: 200px; height: 200px;" class="img-circle elevation-2" alt="User Image">
            </div></br>
            <h2 class="title__line--6">Profil</h2>
            <h3 class="card-title"><?php echo $this->session->flashdata('message'); ?></h3>
          </nav>
        </div>
      </div>
    </div>


    <div class="row mx-auto d-block">
      <div class="col-xl-8">
      <?php foreach($profil as $row): ?>
        <form action="<?php echo site_url(); ?>account/update" method="post" autocomplete="off">
        <div class="col-sm-6" >
          <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?php echo $row['id_user']; ?>">
            <input type="hidden" class="form-control" id="id_pelanggan" name="id_pelanggan" value="<?php echo $row['id_pelanggan']; ?>">
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>
          </div>                              
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required>
          </div>
        </div>
        <div class="col-sm-6" >
          <div class="form-group">
            <label for="exampleInputEmail1">Jenis Kelamin</label>
            <select style="height: 30px;" name="jenis_kelamin" required>
                <option value="<?php echo $row['jenis_kelamin']; ?>" selected><?php echo $row['jenis_kelamin']; ?></option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
          </div>                              
          <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
        </div>
      </div>
    </div>
    <div class="row mx-auto d-block">
      <div class="col-xl-8">
        <div class="col-sm-6" >                              
          <div class="form-group">
            <label for="exampleInputEmail1">Telpon</label>
            <input type="number" class="form-control" id="telpon" name="telpon" value="<?php echo $row['telpon']; ?>" required>
          </div>                              
          <div class="form-group">
            <label for="exampleInputEmail1">Kabupaten</label>
            <input type="text" name="kabupaten" id="kabupaten" value="Lebak" readonly>
          </div>
        </div>
        <div class="col-sm-6" >                              
          <div class="form-group">
            <label for="exampleInputEmail1">Provinsi</label>
            <input type="text" name="provinsi" id="provinsi" value="Banten" readonly>
          </div>                              
          <div class="form-group">
            <label for="exampleInputEmail1">Kecamatan</label>
            <select style="height: 30px;" name="kecamatan" required>
                <option value="<?php echo $row['kecamatan']; ?>" selected><?php echo $row['kecamatan']; ?></option>
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
      </div>
    </div>
    <div class="row mx-auto d-block">
      <div class="col-xl-8">
        <div class="col-sm-6" >
          <div class="form-group">
            <label for="exampleInputEmail1">Kode Pos</label>
            <input type="number" class="form-control" id="kode_pos" name="kode_pos" placeholder="Enter email" value="<?php echo $row['kode_pos']; ?>" required>
          </div>
        </div>
        <div class="col-sm-6" >
          <div class="form-group">
            <label for="exampleInputEmail1">Alamat</label>
            <textarea style="background: white;" name="alamat" required><?php echo $row['alamat']; ?></textarea>
          </div>
          <div style="float: right;">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?php echo base_url();?>auth/logout" class="btn btn-default">Keluar</a>
          </div>
        </div>
      </div>
    </div>
                        
        </form>
        <?php endforeach; ?>
  </div>
</section>
