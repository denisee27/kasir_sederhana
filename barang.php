<?php 
require 'function.php';

if(isset($_POST["submit"])) {
    if (tambah ($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Ditambahkan!');    
                document.location.href = 'barang.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Data Berhasil Ditambahkan!');    
                document.location.href = 'barang.php';
            </script>
            ";
    }
}
$data_barang = query ("SELECT * FROM barang");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/barang.css">
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
        <h1>List Barang</h1>
    </div>
<div>
<form action="" method="post">
    <ul style="list-style: none;">
        <li>
            <lebel for="kode_barang">Kode Barang = </lebel>
            <input type="text" name="kode_barang" id="kode_barang" required>
        </li>
        <li>
            <lebel for="nama_barang">Nama Barang = </lebel>
            <input type="text" name="nama_barang" id="nama_barang" required>
        </li>
        <li>
            <lebel for="harga_barang">Harga Barang = </lebel>
            <input type="text" name="harga_barang" id="harga_barang" required>
        </li>
        <li>
            <button type="submit" name="submit">Tambah Barang</button>
        </li>
    </ul>

</form>
<table border="1" cellpadding="10" width="100%">
    <tr>
        <th width="5%">No.</th>
        <th width="20%">Kode Barang</th>
        <th width="20%">Nama Barang</th>       
        <th width="20%">Harga Satuan</th>
        <th width="20%">Action</th>       
    </tr>
    <?php $i= 1; ?>
    <?php foreach ($data_barang as $row) : ?>
    <?php $harga = number_format($row["harga_barang"],0,",",".");?>
    <tr>
        <td><?= $i;?></td>
        <td><?= $row["kode_barang"]; ?></td>
        <td><?= $row["nama_barang"]; ?></td>
        <td>Rp <?= $harga ?></td>
        <td>
            <a href="hapus.php?kode=<?= $row["kode_barang"];?>"><i class='far fa-trash-alt' style='font-size:25px'> Hapus</i></a>
        </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
</table>
</body>
</html>