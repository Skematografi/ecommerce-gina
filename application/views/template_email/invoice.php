<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    * {
        box-sizing: border-box;
    }

    .col {
        float: left;
        padding: 10px;
    }

    .row:after {
        content: "";
        display: table;
        clear: both;
    }
    
    body {
        margin:25px;
        background-color: #ececec;
    }
    
</style>
</head>
<body>
    <img src="<?php echo base_url();?>assets/images/logo/logo.png" style="width:200px; hight:auto;">
    <h3>Halo <?= $order['name'];?>,</h3>
    <h3>Menunggu pembayaran dengan Transfer Bank sebelum Tanggal <?= $order['expired_date']; ?></h3> 
    <hr><br/>
        <table border="0">
            <tr>
                <td>Kode Transaksi</td>
                <td>:</td>
                <td><b><?= $order['code'];?></b></td>
            </tr>
            <tr>
                <td>Total Bayar</td>
                <td>:</td>
                <td><b style="color:red;">Rp <?= number_format($order['total']); ?></b></td>
            </tr>
            <tr>
                <td>Nama Bank</td>
                <td>:</td>
                <td><b>BCA</b></td>
            </tr>
            <tr>
                <td>Nomer Rekening</td>
                <td>:</td>
                <td><b>8680035831</b></td>
            </tr>
            <tr>
                <td>Atas Nama</td>
                <td>:</td>
                <td><b>SUTRISNO</b></td>
            </tr>
        </table>
    <br/><hr>

    <h3>Rincian Pesanan</h3>
    <p>No. Invoice : <b><?= $order['invoice']; ?></b></p> 
    <hr> 
    <?php foreach($products as $item):  ?>
        <div class="row">
            <div class="col" style="width: 30%;">
                <img src="<?php echo base_url();?>assets/produk/<?php echo $item['image'];?>" style="width:150px; hight:auto;">
            </div>
            <div class="col" style="width: 70%;">
                <table border="0">
                    <tr>
                        <td>Nama Produk</td>
                        <td>:</td>
                        <td><b><?= $item['name']; ?></b></td>
                    </tr>
                    <tr>
                        <td>Ukuran</td>
                        <td>:</td>
                        <td><b><?= $item['size']; ?></b></td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td>:</td>
                        <td><b>Rp <?= number_format($item['price']); ?></b></td>
                    </tr>
                    <tr>
                        <td>Jumlah</td>
                        <td>:</td>
                        <td><b><?= $item['quantity']; ?></b></td>
                    </tr>
                </table>
            </div>
        </div>
        <hr>  
    <?php endforeach; ?>
        <table border="0">
            <tr>
                <td>Ongkos Kirim</td>
                <td>:</td>
                <td><b>Rp <?= number_format($order['shipping_cost']); ?></b></td>
            </tr>
            <tr>
                <td>Diskon Member</td>
                <td>:</td>
                <td><b>Rp <?= number_format($order['discount_member']); ?></b></td>
            </tr>
            <tr>
                <td>Voucher</td>
                <td>:</td>
                <td><b>Rp <?= number_format($order['discount_voucher']); ?></b></td>
            </tr>
            <tr>
                <td>Total Bayar</td>
                <td>:</td>
                <td><b>Rp <?= number_format($order['total']); ?></b></td>
            </tr>
        </table>
        <hr>
        <h3>Alamat Pengiriman </h3>
        <p><?= $order['name'];?></p>
        <p><?= $order['address'];?></p>
        <p><?= $order['phone'];?></p>
</body>
</html>