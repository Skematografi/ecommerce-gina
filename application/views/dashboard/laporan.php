<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Laporan</title>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/images/favicon.ico">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <img src="<?php echo base_url();?>assets/images/logo/logo.png" alt="AdminLTE Logo" class="brand-image" style=" width:200px; height:70px; opacity: .8;">
          <small class="float-right">Tanggal : <?php echo date('d-m-Y'); ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        <address>
          <strong>Toko Sinar Rangkasbitung</strong>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <h2>LAPORAN PENJUALAN</h2>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
      </div>
      <!-- /.col -->
    </div><br>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12">
        <table class="table table-striped table-responsive text-center">
          <thead>
          <tr>
            <th>No.</th>
            <th>ID Pesanan</th>
            <th>Tanggal</th>
            <th>ID Pelanggan</th>
            <th>Nama Pelanggan</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>ID Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Ongkir</th>
            <th>Total</th>
          </tr>
          </thead>
          <tbody>
            <?php foreach($pesanan as $row): $i=1; ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $row->id_pesanan; ?></td>
              <td><?php echo $row->tanggal; ?></td>
              <td><?php echo $row->id_pelanggan; ?></td>
              <td><?php echo $row->nama_pelanggan; ?></td>
              <td><?php echo $row->telpon_pelanggan; ?></td>
              <td><?php echo $row->alamat; ?></td>
              <td><?php echo $row->id_produk; ?></td>
              <td><?php echo $row->jumlah; ?></td>
              <td><?php echo $row->harga; ?></td>
              <td><?php echo $row->ongkir; ?></td>
              <td><?php echo $row->total; ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">
      </div>
      <!-- /.col -->
      <div class="col-6">
        <p class="lead">Total Penjualan</p>
          <table class="table" style="font-size: 18pt;">
            <tr>
              <th>Total :</th>
              <td style="text-align: right;">Rp <?php echo number_format($total->penjualan); ?></td>
            </tr>
          </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>
