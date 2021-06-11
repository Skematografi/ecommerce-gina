<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <small><?php echo $this->session->flashdata('message'); ?></small>
          <div class="card">

            <div class="card-header">
              <div class="row">
                <div class="col-md-6">
                  <h3>List Promo</h3>
                </div>
                <div class="col-md-6">
                  <?php if($promo->aktif == 0): ?>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_tambah"  style="float:right;" onclick="cleanForm()">Tambah</button>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <table id="tablePromo" class="table table-bordered table-striped table-responsive">
                    <thead>
                      <tr class="text-center">
                        <th>No.</th>
                        <th>Kode Promo</th>
                        <th>Nama Promo</th>
                        <th>Deskripsi</th>
                        <th>Diskon (%)</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Akhir</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; foreach($promotions as $row): ?>
                      <tr>
                        <td class="text-center"><?php echo $i++; ?></td>
                        <td><?php echo $row['code']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['discount']; ?></td>
                        <td><?php echo $row['start_date']; ?></td>
                        <td><?php echo $row['end_date']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td class="text-center"><?php echo $row['action']; ?></td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
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
    <strong>Copyright &copy; 2021 <a href="<?php echo base_url();?>" target="_blank">Clothing Brand Colonizer.co</a>.</strong>
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
    $("#tablePromo").DataTable();
  });

  function editPromo(ele){

    let id = $(ele).attr('data-id');
    let url = '<?= base_url(); ?>Dashboard/edit_promo';

    $.ajax({
      url : url,
      method : 'POST',
      data: {id: id},
      dataType: 'json',
      success : function(res){

        cleanForm();
        $('#title_modal_promo').empty().append('Update Promo');

        $('#code').val(res[0].code).attr('readonly', true);
        $('#name').val(res[0].name);
        $('#description').val(res[0].description);
        $('#category').val(res[0].category);
        $('#start_date').val(res[0].start_date);
        $('#end_date').val(res[0].end_date);
        $('#discount').val(res[0].discount);
        $('#promo_id').val(res[0].id);
        $('#submit').val('Update');

        $('#modal_tambah').modal('show');

      }, error : function(err){
        console.log(err)
      }
    });
  }

  function deletePromo(ele){

    let id = $(ele).attr('data-id');
    let url = '<?= base_url(); ?>Dashboard/hapus_promo';

    $.ajax({
      url : url,
      method : 'POST',
      data: {id: id},
      dataType: 'json',
      success : function(res){
        window.location.href = "<?= base_url(); ?>"+res.link;
      }, error : function(err){
        console.log(err)
      }
    });
  }

  function cleanForm(){
    $('#code').attr('readonly', false);
    $('#code, #name, #description,#start_date,#end_date,#discount,#promo_id').val('');
    $('#title_modal_promo').empty().append('Tambah Promo');
    $('#submit').val('Simpan');
  }
</script>
</body>
</html>
