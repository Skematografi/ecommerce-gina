
  <div class="modal fade" id="modal_tolak" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
            <form method="post" action="<?php echo base_url('Dashboard/tolak_pesanan'); ?>" autocomplete="off">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Penyebab <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="because" rows="5" name="because" required></textarea>
                    <input type="hidden" id="order_id_tolak" name="order_id_tolak">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Tolak Pesanan">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>