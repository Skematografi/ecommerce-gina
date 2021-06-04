<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4><?php echo $stok; ?></h4>
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
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_tambah">
                Tambah
              </button>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id Produk</th>
                  <th>Nama Produk</th>
                  <th>Kategori</th>
                  <th>Deskripsi</th>
                  <th>Gambar</th>
                  <th>Harga</th>
                  <th>Berat</th>
                  <th>Stok</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($produk as $row): ?>
                <tr>
                  <td><?php echo $row->id_produk; ?></td>
                  <td><?php echo $row->nama_produk; ?></td>
                  <td><?php echo $row->kategori; ?></td>
                  <td><?php echo $row->deskripsi; ?></td>
                  <td><img src="<?php echo base_url();?>assets/produk/<?php echo $row->gambar;?>" style="width:50px; height: 50px;"></td>
                  <td><?php echo $row->harga; ?></td>
                  <td><?php echo $row->berat; ?></td>
                  <td><?php echo $row->stok; ?></td>
                  <td class="text-center">
                   <?php echo anchor('dashboard/edit_produk/'.$row->id_produk, "<button class='btn btn-primary'><i class='far fa-edit'></i></button>");
                  ?>
                  <?php echo anchor('dashboard/hapus_produk/'.$row->id_produk, "<button class='btn btn-danger'><i class='far fa-trash-alt'></i></button>");
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

  <div class="modal fade" id="modal_tambah">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Produk</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <form method="post" enctype="multipart/form-data" action="<?php echo base_url('dashboard/do_upload'); ?>" autocomplete="off">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">ID Produk</label>
                    <input type="text" class="form-control" id="id_produk" name="id_produk" value="<?= $auto;?>" readonly>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Produk</label>
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" maxlength="255" autofocus required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Kategori</label>
                    <textarea class="form-control" id="kategori" name="kategori" maxlength="255" rows="3" required></textarea>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" maxlength="255" rows="3" required></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleInputFile">Gambar</label>
                        <input type="file" id="gambar" name="gambar" required><br>
                        <small class="text-danger">* Max. 2 MB (jpg/jpeg/png)</small>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Harga</label>
                    <input type="number" class="form-control" id="harga" min="1000" name="harga" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Berat</label>
                    <input type="number" class="form-control" id="berat" min="1" max="100" name="berat" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Stok</label>
                    <input type="number" class="form-control" id="stok" min="1" name="stok" required>
                  </div>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Simpan">
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
