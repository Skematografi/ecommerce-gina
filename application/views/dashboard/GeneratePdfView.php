<!DOCTYPE html>
<html>
<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta charset="utf-8">
    <title>Laporan Penjualan Colonizer.co</title>
    <style>
    *{
    font-family:'Courier New', Courier, monospace;
    }
    #customers {
    /* font-family: Arial, Helvetica, sans-serif; */
    border-collapse: collapse;
    width: 100%;
    font-size: 12px;
    }

    #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #c43b68 ;
    color: white;
    }
    
</style>
</head>
<body>
<!-- <img src="<?= base_url();?>assets/images/logo/logo.png" style="width:200px; hight:auto;"> -->

    <h2 style="text-align: center;">LAPORAN PENJUALAN</h2>
    <div style="display: flex; white-space: nowrap; font-size:15px;">
        <div style="text-align: left;">
            <small>Nama Perusahaan : Colonizer.co</small>
        </div>
        <div style="text-align: right;">
        <?php
            $start =date_create($start);
            $end =date_create($end);
        ?>
            <small>Periode : <?= date_format($start,"d/m/Y").' - '.date_format($end,"d/m/Y"); ?></small>
        </div>
    </div>
    <div style="display: flex; white-space: nowrap; font-size:15px;">
        <div style="text-align: left;">
            <small>Admin : <?= $admin; ?></small>
        </div>
        <div style="text-align: right;">
            <small>Tanggal Laporan : <?= date('d/m/Y'); ?></small>
        </div>
    </div>
    <table id="customers" class="table table-bordered table-striped table-responsive">
        <thead class="text-center">
        <tr>
            <th>No.</th>
            <th>No. Invoice</th>
            <th>Tanggal</th>
            <th>Pembeli</th>
            <th>Produk</th>
            <th>Jumlah</th>
        </tr>
        </thead>
        <tbody>
        <?php 
            $i=1; 
            if(isset($orders)):
            foreach($orders as $row): ?>
        <tr>
            <td style="text-align: center;"><?= $i++; ?></td>
            <td><?= $row['invoice']; ?></td>
            <td><?= $row['date']; ?></td>
            <td><?= $row['buyer']; ?></td>
            <td><?= $row['product']; ?></td>
            <td style="text-align: right;"><?= $row['nominal']; ?></td>
        </tr>
        <?php
            endforeach; 
            endif;
        ?>
        
        <tr style="text-align: right;">
            <td colspan="4" ><b>Total Penjualan : </b></td>
            <td colspan="2" style="color:red;"><b>Rp <?= number_format($total); ?></b></td>
        </tr>
        <tr style="text-align: right;">
            <td colspan="4" ><b>Produk Terjual : </b></td>
            <td colspan="2" style="color:red;"><b><?= ($total_sale == null ? '0' : $total_sale); ?> Pcs</b></td>
        </tr>
        </tbody>
    </table>
</body>
</html>