<?php

include "koneksi.php";

  
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .body {
            font-family: sans-serif;
            font-weight: bold;
            min-height: max-content;
           
        }
        .btn{
          position: center;
          margin-top: 7rem;
          height: 40px;
          width: 120px;
          position: text-center;
          font-family: Impact;
        }
        
    </style>
</head>
<body>
<?php 
    
    if(isset($_GET['id'])){
      $id = $_GET['id'];
      
      $query = "SELECT * FROM produk where id = $id";
      $sql = mysqli_query($koneksi, $query);
      $result = mysqli_fetch_assoc($sql);
    }
    ?>
<center>
<div class="card mb-5 mt-5">
  <div class="row g-0">
    <div class="col-md-4">
      <div class="border; name="border">
      <img src="img/<?php echo $result['foto']; ?>" class="img-fluid rounded-start;  mt-4 mb-4">
      </div>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $result['nama']; ?></h5>
        <div class="display; mb-4"><span>Rp. <?php echo $result['harga']; ?></span></div>
        <p class="card-text"><?php echo $result['desk']; ?></p>
        <a href="check.php?id=<?=$result['id']?>" class="btn btn-warning d-block text-center">Checkout Now</a>
      </div>
    </div>
  </div>
</div>
<center>
</body>
</html>