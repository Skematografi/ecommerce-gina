
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <img src="<?php echo base_url();?>assets/images/logo/logo.png" alt="AdminLTE Logo" class="brand-image mb-3 mx-auto d-block" style=" width:200px; height:70px; opacity: .8;">
      <p class="login-box-msg">Silahkan Masuk</p>
      <?php echo $this->session->flashdata('message'); ?>
      <form action="<?php echo base_url();?>auth" method="post" autocomplete="off">
        <div class="input-group mb-3">
          <input type="email" id="email" name="email" class="form-control" placeholder="Email" autofocus="autofocus" value="<?php echo set_value('Email'); ?>" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <!-- <?php echo form_error('email','<small class="text-danger pl-3">','</small>'); ?> -->
        </div>
        <div class="input-group mb-3">
          <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="">
          <!-- <?php echo form_error('password','<small class="text-danger pl-3">','</small>'); ?> -->
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <p class="mb-1">
        <a href="<?php echo base_url();?>auth/forget">Lupa Password?</a>
      </p> -->
      <p class="mb-0">
        <a href="<?php echo base_url();?>auth/register" class="text-center">Daftar Member</a><br>
        <a href="<?php echo base_url();?>auth/forget_password">Lupa password?</a><br>
      </p>
      <p class="mt-3">
        <a style="color: #cc3399;" href="<?php echo base_url();?>" class="text-center"><i class="fa fa-sign-out"></i> Kembali</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

