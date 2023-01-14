<?php require 'function.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/riwayat.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>KASIR</title>
</head>
<body>
    <div class="button_home">
            <a class="link" href="home.php">
            <i class='fas fa-chevron-circle-left' style='font-size:36px'></i>
            </a>
            </div>  
    <div class="header">
        <h1>Riwayat Transaksi</h1>
    </div>
<table border="1" cellpadding="10" width="100%">
    <tr>
        <th width="8%">No</th>
        <th width="15%">Kode Orderan</th>
        <th width="15%">Tanggal</th> 
        <th width="15%">Kode Barang</th>
        <th width="15%">Nama Barang</th>       
        <th width="10%">Qty</th>        
        <th width="15%">Harga</th>
        <th width="15%">Total Harga</th>
    </tr>
    <?php $i=1; ?>
    <?php while ($trans = mysqli_fetch_assoc($result) ) : ?>
    <!-- <?php $harga = number_format($trans["harga_barang"],0,",",".");?> -->
    <?php $total = number_format($trans["subtotal"],0,",",".");?>
    <?php $harga = number_format($trans["subtotal"]/$trans["qty"],0,",",".")?>
    <?php 
    $tgl = $trans["tanggal"];
    $tgl = date("Ymd");
    ?>
    <tr>
        <td><?= $i; ?></td>
        <td>ID<?php echo $tgl?><?= $trans["kode_orderan"];?></td>
        <td><?= $trans["tanggal"]; ?></td>
        <td><?= $trans["kode_barang"]; ?></td>
        <td><?= $trans["nama_barang"]; ?></td>
        <td><?= $trans["qty"]; ?></td>
        <td>Rp.<?= $harga; ?> </td>
        <td>Rp.<?= $total ?></td>
    </tr>
    <?php $i++; ?>
    <?php endwhile; ?>

</table>
    
</body>
</html>