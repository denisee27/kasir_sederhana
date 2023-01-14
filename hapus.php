<?php 
require 'function.php';
if (isset($_GET['kode'])) {
    mysqli_query($conn,"DELETE FROM barang WHERE kode_barang='$_GET[kode]'");
    echo "
    <script>
        alert('Data Berhasil Dihapus!');    
        document.location.href = 'barang.php';
    </script>
    ";
    } else {
    echo "
    <script>
        alert('Data Gagal Dihapus!');    
        document.location.href = 'barang.php';
    </script>
    ";
 }
?>
