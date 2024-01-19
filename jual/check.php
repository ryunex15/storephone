<?php
session_start();
include "koneksi.php"

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="Chechout page is one of the main page in ecommerce website, And it's necessary for all shopping and bussiness website"
    />
    <meta name="keywords" content="Checkout page" />
    <meta name="author" content="Su Myat Aung" />

    <!-- Css link  -->
    <link rel="stylesheet" href="css/checkstyle.css" />
    <!-- favicon -->
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon" />
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <!-- font awesome icon kit -->
    <script
      src="https://kit.fontawesome.com/9f5c644af7.js"
      crossorigin="anonymous"
    ></script>
    <!-- fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates&display=swap"
      rel="stylesheet"
    />
    <!-- title -->
    <title>Checkout</title>
  </head>

  <body>
    <?php
    if(!isset($_SESSION['user'])){
      header('Location:loginform.php');
    }

    if(isset($_GET['id'])){
      $id = $_GET['id'];
    }

   



    $query = "SELECT * FROM user where id_user='$id'";
    $kacau = "SELECT * FROM produk where id='$id'";
    $result = mysqli_query($koneksi,$query);
    $data= mysqli_fetch_assoc($result);
    $barang = mysqli_query($koneksi,$kacau);
    $oi= mysqli_fetch_assoc($barang);

    $user = mysqli_query($koneksi,"SELECT * FROM user where username='$_SESSION[user]'");
    $person = mysqli_fetch_assoc($user);

    $produk = mysqli_query($koneksi,"SELECT * FROM produk where id = '$id'");
    $product = mysqli_fetch_assoc($produk);

    if(isset($_POST['melanjutkan'])){
      $name=$_POST['name'];
      $nohp=$_POST['phone'];
      $email=$_POST['email'];
      $alamat=$_POST['address'];
      $date=date("Y-m-d");
      $_SESSION['nohp']=$_POST['phone'];
      $_SESSION['email']=$_POST['email'];
      $_SESSION['alamat']=$_POST['address'];
      $_SESSION['nama']=$product['nama'];
      $_SESSION['harga']=$product['harga'];
      $_SESSION['date']=$date;

      $query=mysqli_query($koneksi, "INSERT INTO data(email,nohp,alamat,date) VALUES('$email','$nohp','$alamat','$date')");
      echo "<script>
        window.location='struck.php'
      </script>";
    }
    
    ?>

    <form action="" method="POST">
    <div class="con">
      <div class="box1">
        <h2 class="title">Checkout</h2>
        <!-- info  -->
        <div class="info">
          <h3>Contact information</h3>

          <p class="label">E-mail</p>

          <div class="input-box" >
            <input required
              type="text"
              name="email"
              placeholder="Enter Your Email .. "
            />
            <i class="fa-solid fa-envelope"></i>
          </div>

          <p class="label">Phone</p>

          <div class="input-box">
            <input required
              type="text"
              name="phone"
              placeholder="Enter Your Phone ..  "
            />
            <i class="fa-solid fa-phone"></i>
          </div>
        </div>
        <!-- end of  info  -->

        <!-- shipping  -->
        <div class="shipping">
          <h3>Alamat Pengiriman</h3>

          <p class="label">Username</p>

          <div class="input-box">
            <input required
              type="text"
              name="name"
              placeholder=""
              value="<?=$person['username']?>"
            />
            <i class="fa-solid fa-user"></i>
          </div>
          
         
          <p class="label">Alamat</p>

          <div class="input-box">
            <input required  
            type="text" name="address" placeholder="Alamat Kamu .. " />
            <i class="fa-solid fa-house"></i>
          </div>


          <!-- last  -->

          

          <!-- end of  last  -->

          <input type="checkbox" name="check" id="check" />
          <label for="check"> Save this information for next time</label>
        </div>
        <!--end of  shipping  -->
      </div>
      <!-- end of box-1 -->
      <?php
     
      ?>
      <!-- box-2 -->
      <div class="box2">
        <div class="card">
          <div class="item">
            <img src="img/<?= $product['foto']?>">
            <div class="count">
              <p class="item-name"><?=$product['nama']?></p>
            </div>
          </div>
          
          <div class="end">
            <hr>
            <div class="total">
              <p>Total </p>
              <p>Rp.<?=$product['harga']?></p>
            </div>
          </div>
        </div>
        <button name="melanjutkan" class="btn btn-warning d-block text-center">Melanjutkan</button>
        
      </div>
      <!-- end of box-2 -->
    </div>
    <!-- js link  -->
    </form>
    <script src="js/check.js"></script>
  </body>
</html>