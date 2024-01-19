<?php

include "koneksi.php";
if(isset($_GET['aksi'])){
    if($_GET['aksi']=="edit"){
        $result = mysqli_query($koneksi,"SELECT * FROM produk where id='$_GET[id]'");
        $query = mysqli_fetch_assoc($result);
            $nama = $query['nama'];
            $harga = $query['harga'];
            $foto = $query['foto'];
            $desk = $query['desk'];
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Produk</title>
    <link rel="stylesheet" href="./adminbarang.css">
    <style>
        img{
    width: 200px;
    height: 200px;
}

    </style>
</head>
<body>
    <a href="../index.php">kembali ke home</a><br><br>
    <a href="adminuser.php">kembali ke user</a><br><br>
    <form action="" method="post" enctype="multipart/form-data">
    <table width="25%" border=0>
        <tr>
            <td>Name</td>
            <td><input type="text" name="nama" value=<?=@$nama?> ></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type="text" name="harga" value=<?=@$harga?> ></td>
        </tr>
       
        <tr>
            <td>foto</td>
            <td><input type="file" name="foto" value=<?=@$foto?> ></td>
        </tr>
        
        <tr>
            <td>desk</td>
            <td><input type="text" name="desk" value=<?=@$desk?> ></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="tambah"></td>
        </tr>
    </table>
    </form>
   <table border="5">
   <thead>
    <th>No</th>
    <th>Nama</th>
    <th>Harga</th>
    <th>Foto</th>
    <th>Deskripsi</th>
    <th>Aksi</th>
    
    </thead>

<?php
    include "koneksi.php";
    if(isset($_GET['aksi'])){
        if($_GET['aksi']=="edit"){
            $result = mysqli_query($koneksi,"SELECT * FROM produk where id='$_GET[id]'");
            while ($query = mysqli_fetch_array($result)){
                $nama = $query['nama'];
                $harga = $query['harga'];
                $foto = $query['foto'];
                $desk = $query['desk'];
            }
        }else if($_GET['aksi']=="hapus"){
                $hapus = mysqli_query($koneksi,"DELETE FROM produk where id='$_GET[id]'");
               if($hapus){
                header("Location: adminbarang.php");
               }
            }
       }   
           ?>
    <?php

$no=1;
$query = mysqli_query($koneksi, "SELECT * FROM produk");
while($data=mysqli_fetch_array($query)){
    echo "<tr>";
    echo "<td>".$no; $no++."</td";
    echo "<td>".$data['nama']."</td>";
    echo "<td>".$data['harga']."</td>";
    echo "<td><img src='img/".$data['foto']."'></td>";
    echo "<td>".$data['desk']."</td>";
    ?>
    <td><a href="adminbarang.php?aksi=edit&id=<?=$data['id']?>">edit</a>
    <a href="adminbarang.php?aksi=hapus&id=<?=$data['id']?>">hapus</a></td>
    </tr>
<?php } ?>
   </table>
   <?php
    if(isset($_POST['submit'])){
        if(isset($_GET['aksi']) && $_GET['aksi']=="edit"){
            $id = $_GET['id'];
            $nama = $_POST['nama'];
            $harga = $_POST['harga'];
            $foto = $_FILES['foto']['name'];
            $file_tmp = $_FILES['foto']['tmp_name'];
            move_uploaded_file($file_tmp,'img/'.$foto);
            $desk = $_POST['desk'];
            $edit = mysqli_query($koneksi, "UPDATE produk SET nama='$nama',harga='$harga',foto='$foto',desk='$desk' where id='$id'");
        if ($edit){
            header("Location: adminbarang.php");
        }
        }else{
            $nama = $_POST['nama'];
            $harga = $_POST['harga'];
            $foto = $_FILES['foto']['name'];
            $file_tmp = $_FILES['foto']['tmp_name'];
            move_uploaded_file($file_tmp,'img/'.$foto);
            $desk = $_POST['desk'];
            $result = mysqli_query($koneksi, "INSERT INTO produk (nama,harga,foto,desk) VALUES('$nama','$harga','$foto','$desk')");
            if($result > 0){
                header("Location: adminbarang.php");
               }
        }
    }
   ?>
</body>
</html>