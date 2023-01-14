<?php require 'function.php';
?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/proses.css">
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
        <h1 style="text-align:center;">Proses Order</h1>
    </div>
    <div class="banner">
        <ul>
            <li style="float: left;"><h1>Transaksi</h1></li>
            <li style="float:right;"><h1>Nomor Faktur : <?php echo inv() ?></h1></li>
        </ul>
    </div>
    <div class="awal">
       <form action="cart/data.php?q=addtocart" method="post">
        <label for="kode_barang">Nama Barang :</label>
        <select name="product" style="width:160px;">
        <?php
            $query=mysqli_query($conn, "SELECT * FROM barang GROUP BY nama_barang ORDER BY nama_barang");
            while ($data = mysqli_fetch_array($query)) {
            ?>
            <option value="<?=$data['kode_barang'];?>"><?php echo $data['nama_barang'];?></option>
            <?php
            }
            ?>
        </select>
                <br>
            <form action="" method="get">
            <label for="qty">Quantity :</label>
            <input type="number" id="qty" name="qty" required>
            <h1 style="float: right"><?php  ?></h1>
            <br>
        <input type="submit" value="Tambahkan Barang">
       </form>
    </div>
    </div>
    <div class="isi">
        <ul>
            </li>
            <li><a href="tambah_trans.php" style="text-decoration: none;">
                Bayar
                </a>
            </li> 
            <li style="background-color:#D82020;">
                <a href="cart/data.php?q=emptycart" style="text-decoration: none;">
                Batal
                </a>
            </li>
        </ul>
    </div>
    <?php $i=1 ?>
    <div class="hasil">
        
    <table border="1" cellpadding="10" width=90%>
        <tr style="background-color:#407999">
            <th width="3%">No.</th>
            <th width="10%">Kode Barang</th>
            <th width="10%">Nama Barang</th>
            <th width="5%">Quantity</th>              
            <th width="10%">Harga Satuan</th>
            <th width="10%">Total</th>
        </tr>
        <form action="" method="GET">
            <tbody>
            <?php if(isset($_SESSION['cart'])){ ?>                
            <?php 
            $i=1;
            foreach($_SESSION['cart'] as $k=> $row): ?>
            <?php if($row['qty'] != 0): ?>
                    <?php $itotal = $row['price'] * $row['qty']; ?>
                    <td><?php echo $i;?></td>
                    <td ><?php echo $row['kode'];?></td>
                    <td ><?php echo $row['product'];?></td>
                    <td ><?php echo $row['qty'];?></td>
                    <td >Rp <?php echo $row['price'];?></td>
                    <td >Rp <?php echo $itotal; ?></td>
                </tr>
            <?php endif;?>
            <?php   $i++;?>
        <?php endforeach; ?>
        <?php } ?>
        </tbody>
                <tbody>
                    <td>
                    </td>
                </tbody>
    </table>

        </form>
    </div> 

    
</body>
</html>