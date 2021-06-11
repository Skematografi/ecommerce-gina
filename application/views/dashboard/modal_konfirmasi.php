
  <div class="modal fade" id="modal_konfirmasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
            <form method="post" action="<?php echo base_url('Dashboard/konfirmasi_pesanan'); ?>" autocomplete="off">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nomor Resi <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="resi" maxlength="50" name="resi" required>
                    <input type="hidden" id="order_id" name="order_id">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Konfirmasi">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>