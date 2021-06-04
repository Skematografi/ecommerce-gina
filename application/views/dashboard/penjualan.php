<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Penjualan</h4>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <small><?php echo $this->session->flashdata('message'); ?></small>
          <div class="card">
            <div class="card-header">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal_tambah">
                Cetak Laporan
              </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>ID Pesanan</th>
                  <th>Tanggal</th>
                  <th>ID Pelanggan</th>
                  <th>Nama Pelanggan</th>
                  <th>Telepon</th>
                  <th>Kab.</th>
                  <th>Kec.</th>
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
                  <td><?php echo $row->kabupaten; ?></td>
                  <td><?php echo $row->kecamatan; ?></td>
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
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  <div class="modal fade" id="modal_tambah">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Laporan Penjualan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <form method="post" action="<?php echo base_url('dashboard/laporan'); ?>" autocomplete="off">
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Dari :</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                      <input type="text" id="datemask" name="dari" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Sampai :</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                      <input type="text" id="datemask2" name="sampai" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" name="submit" id="submit"><i class="fas fa-print"></i> Cetak</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="<?php echo base_url();?>">Toko Sinar Rangkasbitung</a>.</strong>
    All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>

<script src="<?php echo base_url();?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

<script src="<?php echo base_url();?>assets/plugins/moment/moment.min.js"></script>

<!-- page script -->
<script>
  $(function () {

    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>

<script>
  $(function () {

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('yyyy/mm/dd', { 'placeholder': 'yyyy/mm/dd' })
    $('#datemask2').inputmask('yyyy/mm/dd', { 'placeholder': 'yyyy/mm/dd' })

  })
</script>
</body>
</html>
