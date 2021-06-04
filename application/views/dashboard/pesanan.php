<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Pesanan</h4>
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
                  <th>Status</th>
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
                  <td class="text-center">
                   <?php echo anchor('dashboard/selesai/'.$row->id_pesanan, "<button class='btn btn-success'>Selesai</button>");
                  ?>
                </td>
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
</body>
</html>
