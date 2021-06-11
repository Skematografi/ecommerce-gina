<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <small><?php echo $this->session->flashdata('message'); ?></small>
          <div class="card">
            <div class="card-header">
              <h3>Pesanan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead class="text-center">
                <tr>
                  <th>No.</th>
                  <th>Kode Transaksi</th>
                  <th>Tanggal</th>
                  <th>Pembeli</th>
                  <th>Produk</th>
                  <th>Struk</th>
                  <th>Pengirim</th>
                  <th>Ongkir</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                  $i=1; 
                  if(isset($orders)):
                  foreach($orders as $row): ?>
                <tr>
                  <td class="text-center"><?php echo $i++; ?></td>
                  <td><?php echo $row['code']; ?></td>
                  <td><?php echo $row['date']; ?></td>
                  <td><?php echo $row['buyer']; ?></td>
                  <td><?php echo $row['product']; ?></td>
                  <td class="text-center"><?php echo $row['evidence_transfer']; ?></td>
                  <td><?php echo $row['sender']; ?></td>
                  <td><?php echo $row['shipping_cost']; ?></td>
                  <td class="text-center"><?php echo $row['action']; ?></td>
                </tr>
                <?php
                  endforeach; 
                  endif;
                ?>
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
    $("#example1").DataTable();
  });

  function confOrder(ele){
    let id = $(ele).attr('data-id');
    $('#order_id').val(id);
  }

  function cancelOrder(ele){
    let id = $(ele).attr('data-id');
    $('#order_id_tolak').val(id);
  }

  function showStruck(ele){
    let img = $(ele).attr('data-struck');
    $('#img_struck').attr('src', '<?= base_url(); ?>assets/struk/'+img)
  }
  
</script>
</body>
</html>
