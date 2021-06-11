<section class="htc__contact__area bg__white">
    <div class="container">
        <hr><h2 class="text-center">KONFIRMASI PEMBAYARAN</h2><hr>
        <div class="row" style="margin-bottom:100px; margin-top:50px;">
            <h3 class="card-title"><?php echo $this->session->flashdata('message'); ?></h3>
            <div class="col-md-12">
                <form action="<?php echo site_url(); ?>ecommerce/confirmation_payment" method="post" autocomplete="off" enctype="multipart/form-data">
                
                <div class="row">
                    <div class="col-md-4" >
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kode Transaksi</label>
                            <input type="text" class="form-control" id="code" name="code" required>
                        </div>  
                        <div class="form-group">
                            <label for="exampleInputEmail1">Atas Nama</label>
                            <input type="text" class="form-control" id="account_name" name="account_name" required>
                        </div>
                    </div>
                    <div class="col-md-4" >
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nomor Rekening</label>
                            <input type="number" class="form-control" id="account_number" name="account_number" required>
                        </div>   
                    </div>
                    <div class="col-md-4" >
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nominal Pembayaran</label>
                            <input type="number" class="form-control" id="nominal" name="nominal" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bukti Transfer/Struk</label>
                            <input type="file" class="form-control" id="evidence_transfer" name="evidence_transfer" required>
                            <small style="color:red;">* Maksimal file 1 MB (jpg,jpeg,png)</small>
                        </div>   
                    </div>
                </div>
                <div class="send__btn text-center">
                    <button type="submit" class="fr__btn" style="width:100%; border:none;">Konfirmasi</button>
                </div>
        
                </form>
            </div>
        </div>
    </div>
</section>

<a href="https://api.whatsapp.com/send?phone=6281315052884&text=Hallo%20Agan%20Colonizer.co" target="_blank" class="icon-whatsapp">
    <img src="<?php echo base_url();?>assets/images/logo/whatsapp.png" alt="icon whatsapp" id="whatsapp" >
</a>
        