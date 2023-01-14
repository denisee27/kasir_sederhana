<?php 
session_start();
date_default_timezone_set('Asia/Manila');
ini_set('display_errors', 1);
$jim = new Shopping();
$q = $_GET['q'];

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array(); 
    $_SESSION['kode'] = 0;
}
if($q == 'addtocart'){
    $product = $_POST['product'];
    $qty = $_POST['qty'];
    include('../db.php');
    $q = "SELECT * FROM barang WHERE kode_barang='".$product."'";
    $result = mysqli_query($conn,$q);
    while($row = $result->fetch_assoc()) {
        $kode = $row["kode_barang"];
        $product = $row["nama_barang"];
        $price = $row["harga_barang"];
      }
    $jim->addtocart($kode,$product,$price,$qty);
    header("location: ../proses.php", true, 301);
}else if($q == 'emptycart'){
    unset($_SESSION['cart']); 
    unset($_SESSION['kode']); 
    header("location:../proses.php");
}else if($q == 'removefromcart'){
    $id = $_GET['id'];
    $jim->removefromcart($id);
}else if($q == 'updatecart'){
    $id = $_GET['id'];
    $qty = $_POST['qty'];
    $product = $_GET['product'];
    $jim->updatecart($id,$qty,$product);
}else if($q == 'countcart'){
    $jim->countcart();
}else if($q == 'countorder'){
    $jim->countorder();
}else if($q == 'countproducts'){
    $jim->countproducts();
}else if($q == 'countcategory'){
    $jim->countcategory();
}else if($q == 'checkout'){
    $jim->checkout();
}else if($q == 'verify'){
    $jim->verify();   
}
/*$_SESSION['cart'];
$product = 'product101';
$price ='300';
$jim->addtocart($product, $price);*/
class Shopping {
    private $conn;
    public function __construct() {
    include('../db.php');
    $this->conn = $conn;
    }
    function addtocart($kode,$product, $price, $qty){
        $cart = array(
            'kode' => $kode,
            'product' => $product,
            'price' => $price,
            'qty' => $qty
        );
        if(!isset($_SESSION['cart'][$product]))
            $_SESSION['cart'][$product]= $cart;
        else
             $_SESSION['cart'][$product]['qty'] +=1; 
        $_SESSION['kode'] = $_SESSION['kode'] + 1;
        
        return true;
    }
    
    function removefromcart($id){        
        $_SESSION['cart'][$id]['qty'] = 0;
        header("location:../cart.php");
    }
    
    function updatecart($id,$qty,$product){
        $_SESSION['cart'][$product]['qty'] = $qty;
       
        
       header("location:../cart.php");
    }
    
    function countcart(){
        $count = 0;
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart']:array();
        foreach($cart as $row):
            if($row['qty']!=0){
                $count = $count + $row['qty'];
            }            
        endforeach;

        echo $count;   
    }
    function countorder(){
        $q = "select * from dbgadget.order where status='unconfirmed'";
        $result = mysqli_query($this->conn,$q);
        echo mysqli_num_rows($result);
    }
    function countproducts(){
        $q = "select * from dbgadget.products";
        $result = mysqli_query($this->conn,$q);
        echo mysqli_num_rows($result);
    }
    function countcategory(){
        $q = "select * from dbgadget.category";
        $result = mysqli_query($this->conn,$q);
        echo mysqli_num_rows($result);
    }
    function checkout(){
        include('../db.php');
        $fname = $_POST['fname'];   
        $lname = $_POST['lname'];   
        $contact = $_POST['contact'];   
        $email = $_POST['email'];   
        $address = $_POST['address'];   
        $fullname = $fname.' '.$lname;
        $date = date('m/d/y h:i:s A');
        $item = '';
        foreach($_SESSION['cart'] as $row):
            if($row['qty'] != 0){
                $product = '('.$row['qty'].') '.$row['product'];
                $item = $product.', '.$item;
            }
        endforeach;
        $amount = $_SESSION['totalprice'];
        echo $q = "INSERT INTO dbgadget.order VALUES (NULL, '$fullname', '$contact', '$address', '$email', '$item', '$amount', 'unconfirmed', '$date', '')";

        mysqli_query($this->conn,$q);
        
        unset($_SESSION['cart']); 
        header("location:../success.php");
    }
    
    function verify(){
        $username = $_POST['username'];   
        $password = $_POST['password'];   
        
        $q = "SELECT * from dbgadget.user where username='$username' and password='$password'";
        $result = mysqli_query($this->conn,$q);
        $_SESSION['login']='yes';
        echo mysqli_num_rows($result);
    }
}

?>