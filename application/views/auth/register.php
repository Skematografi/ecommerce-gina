
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card">
    <div class="card-body register-card-body">
      <img src="<?php echo base_url();?>assets/images/logo/logo.png" alt="AdminLTE Logo" class="brand-image mb-3 mx-auto d-block" style=" width:200px; height:70px; opacity: .8;">
      <p class="login-box-msg">Daftar Member</p>
      <?php echo $this->session->flashdata('message'); ?>
      <form action="<?php echo base_url();?>auth/register" method="post" autocomplete="off">
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo set_value('Email'); ?>" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password1" name="password1" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password2" name="password2" placeholder="Ulangi Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
        <p>
          <a href="<?php echo base_url();?>auth"> Masuk</a>
        </p>
        <p>
          <a style="color: #cc3399;" href="<?php echo base_url();?>" class="text-center"><i class="fa fa-sign-out"></i> Kembali</a>
        </p>
      
      
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

