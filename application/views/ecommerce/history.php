<section class="htc__contact__area bg__white">
    <div class="container">
        <hr><h2 class="text-center">RIWAYAT BELANJA</h2><hr>
        <div class="row" style="margin-bottom:100px; margin-top:50px;">
            <div class="col-md-12">
                <table id="tableHistory" class="table table-bordered table-striped table-responsive">
                <thead>
                    <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">waktu</th>
                        <th class="text-center">Kode Transaksi</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Nomor Resi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach($riwayat as $row): ?>
                    <tr>
                        <td class="text-center"><?php echo $i++; ?></td>
                        <td class="text-center"><?php echo $row['created_at']; ?></td>
                        <td><?php echo $row['code']; ?></td>
                        <td class="text-right">Rp <?php echo number_format($row['total_price']); ?></td>
                        <td class="text-center">
                            <?php
                                if($row['status'] == 'Menunggu Pembayaran' || $row['status'] == 'Menunggu Verifikasi'){
                                    echo '<span class="badge badge-secondary" style="padding:5px 10px;">'.$row['status'].'</span>';
                                } elseif($row['status'] == 'Kadaluarsa' || $row['status'] == 'Ditolak'){
                                    echo '<span class="badge badge-danger" style="background:#d9534f; padding:5px 10px;">'.$row['status'].'</span>';
                                } else {
                                    echo '<span class="badge badge-success" style="background:#5cb85c; padding:5px 10px;">'.$row['status'].'</span>';
                                }
                            ?>
                        </td>
                        <td class="text-center"><?php echo ($row['resi'] == '' ? '-' : $row['resi']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<a href="https://api.whatsapp.com/send?phone=6285157552214&text=Hallo%20Agan%20Colonizer.co" target="_blank" class="icon-whatsapp">
    <img src="<?php echo base_url();?>assets/images/logo/whatsapp.png" alt="icon whatsapp" id="whatsapp" >
</a>
        