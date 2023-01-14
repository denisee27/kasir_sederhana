<?php require 'function.php' ?>
<?php session_start(); ?>
<?php $totalprice = 0 ; ?>
<?php foreach($_SESSION['cart'] as $k=> $row): ?>
<?php if($row['qty'] != 0): ?>
        <?php $itotal = $row['price'] * $row['qty']; ?>
    </tr>
<?php endif;?>
<?php $totalprice = $totalprice + $itotal; ?>
<?php endforeach; ?>
<?php 
    global $conn;
    $nama = "";
    $alamat = "";
    $telepon = "";
    $total = $totalprice;
    $t = date("Y-m-d");
    $sql1 = "INSERT INTO transaksi VALUES ('','$t','','$nama','$alamat','$telepon',$total)";
    mysqli_query($conn, $sql1);
    $ordersid = mysqli_insert_id($conn); 
   
    foreach($_SESSION['cart'] as $k=> $row):
        if($row['qty'] != 0):
            $kode = $row['kode'];
            $nama_barang = $row['product'];
            $qty = $row['qty'];
            $t = date("Y-m-d");
            $itotal = $row['price'] * $row['qty'];
            $sql2 = "INSERT INTO detail_trans VALUES ('', $ordersid, '$t', '$kode', '$nama_barang',$qty, $itotal)";
            mysqli_query($conn, $sql2);
        endif;
    endforeach;
    unset($_SESSION['cart']);    
    header("location:riwayat.php");

?>

