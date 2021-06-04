
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambah Produk</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
              <div class="card-body">
                <!-- /.card-header -->
                <!-- form start -->
                <?php foreach ($data as $row): ?>
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('dashboard/update_produk'); ?>">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">ID Produk</label>
                        <input type="text" class="form-control" id="id_produk" name="id_produk" value="<?php echo $row->id_produk; ?>" readonly>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Nama Produk</label>
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" maxlength="255" value="<?php echo $row->nama_produk; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Kategori</label>
                        <textarea class="form-control" id="kategori" name="kategori" maxlength="255" rows="3" required><?php echo $row->kategori; ?></textarea>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" maxlength="255" rows="3" required><?php echo $row->deskripsi; ?></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputFile">Gambar</label>
                            <input type="file" id="gambar" name="gambar" required><br>
                            <small class="text-danger">* Upload ulang gambar (Max. 2 MB [jpg/jpeg/png])</small>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Harga</label>
                        <input type="number" class="form-control" id="harga" min="1000" name="harga" value="<?php echo $row->harga; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Berat</label>
                        <input type="number" class="form-control" id="berat" min="1" max="100" name="berat" value="<?php echo $row->berat; ?>" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Stok</label>
                        <input type="number" class="form-control" id="stok" min="1"> name="stok" value="<?php echo $row->stok; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Update">
                  </div>
                </form>
              <?php endforeach; ?>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
        <!-- /.row -->

        <!-- /.row -->

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 