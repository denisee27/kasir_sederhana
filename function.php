<?php
$conn = mysqli_connect("localhost","root","","tbrsi") or die("Could not connect database");
$result = mysqli_query($conn,"SELECT * FROM detail_trans");
$barang = mysqli_query($conn,"SELECT * FROM barang");

function tambah ($post) {
    global $conn;
    $kode_barang = htmlspecialchars ($post["kode_barang"]);
    $nama_barang = htmlspecialchars ($post["nama_barang"]);
    $harga_barang = htmlspecialchars ($post["harga_barang"]);
    
    $query ="INSERT INTO barang
                values
                ('$kode_barang','$nama_barang','$harga_barang')
            ";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}
function query ($list_barang){
    global $conn;
    $result = mysqli_query($conn,$list_barang);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function inv(){
    global $conn;
    $sql =mysqli_query($conn,"SELECT MAX(kode_orderan) as maxid FROM detail_trans");
    $data = mysqli_fetch_assoc($sql);

    $kode=$data["maxid"];
    $kode++;
    $id = 'ID';
    $ket = date("Ymd");
    $kodeauto =$id . $ket . sprintf($kode);
    return $kodeauto;
}

?>