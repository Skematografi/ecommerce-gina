<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Data Pelanggan</h4>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="pelanggan" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>Id User</th>
                  <th>Id Pelanggan</th>
                  <th>Nama Pelanggan</th>
                  <th>Jenis Kelamin</th>
                  <th>Status</th>
                  <th>Telpon</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>Provinsi</th>
                  <th>Kabupaten</th>
                  <th>Kecamatan</th>
                  <th>Kode Pos</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($pelanggan as $row): ?>
                <tr>
                  <td><?php echo $row->id_user; ?></td>
                  <td><?php echo $row->id_pelanggan; ?></td>
                  <td><?php echo $row->nama; ?></td>
                  <td><?php echo $row->jenis_kelamin; ?></td>
                  <td><?php echo $row->status; ?></td>
                  <td><?php echo $row->telpon; ?></td>
                  <td><?php echo $row->email; ?></td>
                  <td><?php echo $row->alamat; ?></td>
                  <td><?php echo $row->provinsi; ?></td>
                  <td><?php echo $row->kabupaten; ?></td>
                  <td><?php echo $row->kecamatan; ?></td>
                  <td><?php echo $row->kode_pos; ?></td>
                  <td class="text-center">
                   <?php echo anchor('dashboard/ban_pelanggan/'.$row->id_user, "<button class='btn btn-warning'><i class='fas fa-ban'></i></button>");
                  ?>
                  </td>
                </tr>
                <?php endforeach;?>
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
    $('#pelanggan').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    });
  });
</script>
</body>
</html>
