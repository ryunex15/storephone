<?php 
  session_start();
  include "koneksi.php";
  

  $query = "SELECT * FROM produk";
  $sql = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PocoStore</title>
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <style>
      .navbar-brand{
        background-color: orange;
        border-radius: 10px;
      }

      .bg-dark{
        background-color: orange;
      }
      
      span{
        color: white;
      }

    </style>
    <!-- end of fonts -->
    
    <nav class="navbar fixed-top bg-body-tertiary" name="navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><b>POCO<span>STORE</span></b></a>
    <a href="logout.php">LogOut</a>
  </div>
  
</nav>

    <!-- Feather Icons! -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://unpkg.com/feather-icons"></script>
    
  </head>
  <body>
  
  <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="img/pocox5pro5gbanner.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="img/webbanner.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/pocof5banner.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="row">
<?php 
  while($result = mysqli_fetch_array($sql)){
?>
  <div class="col-4">
<div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
    <div class="bg-body-tertiary me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
      <div class="my-3 p-3">
        </div>
        <div class="bg-dark" style="width: 15rem; height: 15rem; border-radius: 21px 21px 0 0; border: radius 2rem;">
        <img src="img/<?php echo $result['foto']; ?> "style="width: 15rem; height: 15rem; border-radius: 21px 21px 0 0; border: radius 2rem; mt-5 mb-5"></img>
        </div>
        <div class="display-6"><span><?php echo $result['nama']; ?></span></div>
        <div class="display-5 mt-3">Rp. <?php echo $result['harga']; ?></div>
      <a href="produk.php?id=<?=$result['id']?>" class="btn btn-warning d-block text-center mt-5">Detail</a>
    </div>
    </div>
    </div>
    
    <?php } ?>
    </div>
    <?php
    include "footer.php";
    ?>
    <!-- Feather Icons! -->
    <script>
      feather.replace();
    </script>

    <!-- My JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="checkout-main/script.js"></script>
    <script src="const carousel = new bootstrap.Carousel('#myCarousel')"></script>
  </body>
</html>