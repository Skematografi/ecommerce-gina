
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card">
    <div class="card-body login-card-body">
      <img src="<?php echo base_url();?>assets/images/logo/logo.png" alt="AdminLTE Logo" class="brand-image mb-3 mx-auto d-block" style=" width:200px; height:70px; opacity: .8;">
      <p class="login-box-msg">Lupa password? Buat password baru disini.</p>

      <form action="#" method="post" autocomplete="off">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" id="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Permintaan Password Baru</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="<?php echo base_url();?>auth">Masuk</a>
      </p>
      <p>
          <a style="color: #cc3399;" href="<?php echo base_url();?>" class="text-center"><i class="fa fa-sign-out"></i> Kembali</a>
        </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

