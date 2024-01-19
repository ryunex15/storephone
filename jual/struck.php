<?php 
  session_start();
  include "koneksi.php";
  
  
    if(!isset($_SESSION['user'])){
      header('Location:loginform.php');
    }

    if(isset($_GET['id'])){
      $id = $_GET['id'];
    }
    
    ?>

    <?php

echo "<script>
window.print();
</script>";

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/struck.php">
    <title>Info Pembayaran</title>
    <style>
      .end{
        width: 100vh;
        height: 90vh;
        background-position: center;
        
        margin-bottom: 2rem;
      }
      .footer{
        margin-top: 3rem;
      }
      
      .header{
        background-color: orange;
        color : white;
      }
    .invoice{
      text-align: left;
    }
    </style>
</head>
<body>
  <center>
    <div class="end">
    <div class="header">
    <br><h1>Poco<span>Store</h1></span><br>
    </div>
    <hr>
      <div class="invoice">
    <b><p class="label">Kode Transaksi : <?=rand()?></p></b>
    </div>
    <br>
    <div style="margin-top : 2rem">
      <h2>
        <p class="label">Tanggal Transaksi : <?=$_SESSION['date']?></p>
        <p class="label">Email : <?=$_SESSION['email']?></p>
        <p class="label">No Hp : <?=$_SESSION['nohp']?></p>
        <p class="label">Username : <?=$_SESSION['user']?></p>
        <p class="label">Produk : <?=$_SESSION['nama']?></p>
        <p class="label">Harga : Rp.<?=$_SESSION['harga']?></p>
        <p class="label">Alamat : <?=$_SESSION['alamat']?></p></h2>

    </div>
        
            <div class="footer">
              <hr>
            <h3><i>Barang akan dikirim ke alamat anda</i></h3>
            <h3><i>Terimakasih Telah Membeli</i></h3>
            </div>
            </div>
        </center>
        
</body>


</html>