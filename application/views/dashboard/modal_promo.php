
  <div class="modal fade" id="modal_tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="title_modal_promo"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <form method="post" id="form_elastis" action="<?php echo base_url('dashboard/tambah_promo'); ?>" autocomplete="off">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kode Promo <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="code" name="code" maxlength="7" required>
                    <input type="hidden" id="promo_id" name="promo_id">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Promo <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" maxlength="100" autofocus required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Deskripsi <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Gunakan tanda (,) koma untuk pemisah" required></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Mulai <span class="text-danger">*</span></label>
                    <input type="date" class="form-control datepicker" id="start_date" name="start_date" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Akhir <span class="text-danger">*</span></label>
                    <input type="date" class="form-control datepicker" id="end_date" name="end_date" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Diskon <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="discount" min="1" max="100" name="discount" required>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Simpan">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>