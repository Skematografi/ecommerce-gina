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
    <h3>Halo <?= $name;?>,</h3>
    <h3>Pembayaran tidak dapat diverifikasi.</h3> 
    <p>Mohon maaf, berikut detail pesananmu :</p>
    <hr>
    <h3>Ringkasan</h3>
    <table border="0">
        <tr>
            <td>Kode Transaksi</td>
            <td>:</td>
            <td><b><?= $code;?></b></td>
        </tr>
        <tr>
            <td>No. Invoice</td>
            <td>:</td>
            <td><b><?= $invoice;?></b></td>
        </tr>
        <tr>
            <td>Total Bayar</td>
            <td>:</td>
            <td><b style="color:red;">Rp <?= number_format($total_price); ?></b></td>
        </tr>
        <tr>
            <td>Metode Pembayaran</td>
            <td>:</td>
            <td><b>Transfer Bank</b></td>
        </tr>
        <tr>
            <td>Nomer Rekening</td>
            <td>:</td>
            <td><b><?= $account_number; ?></b></td>
        </tr>
        <tr>
            <td>Atas Nama</td>
            <td>:</td>
            <td><b><?= $account_name; ?></b></td>
        </tr>
    </table>
    <br/><hr>
    <h3>Penyebab Gagal Verifikasi</h3>
    <p style="color:red;"><?= $because; ?></p>
</body>
</html>