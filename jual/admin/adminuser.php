<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img{
    width: 200px;
    height: 200px;
    content: center;
    
}
    table{
        table-layout: -80%;
        min-width: 100%;
    }

    
    </style>
</head>
<body>
    <a href="../index.php">kembali ke home</a><br><br>
    <a href="adminbarang.php">kembali ke admin produk</a><br><br>
    <center>
    <table class="table caption-top">
        <hr>
   <caption><h3>List of users</h3><hr></caption>
   
   <thead>
    <th >no</th>
    <th>username</th>
    <th>password</th>
    <th>foto</th>
    <th>aksi</th>
    </thead>
    

<?php
    include "koneksi.php";
    if(isset($_GET['aksi'])) {
        if($_GET['aksi']=="edit"){
            $result = mysqli_query($koneksi,"SELECT * FROM admin where id='$_GET[id]'");
            while ($query = mysqli_fetch_array($result)){
                $username = $query['username'];
                $password = $query['password'];
                $foto = $query['foto'];
            }
        }else if($_GET['aksi']=="hapus"){
                $hapus = mysqli_query($koneksi,"DELETE FROM admin where id='$_GET[id]'");
               if($hapus){
                header("Location: adminuser.php");
               }
            }
        }  
           ?>
    <?php

$no=1;
$query = mysqli_query($koneksi, "SELECT * FROM admin");
while($data=mysqli_fetch_array($query)){
    echo "<tr>";
    echo "<td>".$no; $no++."</td";
    echo "<td>".$data['username']."</td>";
    echo "<td>".$data['password']."</td>";
    echo "<td><img src='img/".$data['foto']."'></td>";
    ?>
   
    <td style="text-align: center;"><a href="adminuser.php?aksi=edit&id=<?=$data['id']?>">edit</a></td>
    <td style="text-align: center;"><a href="adminuser.php?aksi=hapus&id=<?=$data['id']?>">hapus</a></td>

    </tr>
<?php } ?>
   </table>
   <?php
    if(isset($_POST['submit'])){
        if(isset($_GET['aksi']) && $_GET['aksi']=="edit"){
            $id = $_GET['id'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $foto = $_FILES['foto']['name'];
            $file_tmp = $_FILES['foto']['tmp_name'];
            move_uploaded_file($file_tmp,'img/'.$foto);
            $edit = mysqli_query($koneksi, "UPDATE admin SET username='$username',password='$password',foto='$foto' where id='$id'");
        if ($edit){
            header("Location: adminuser.php");
        }
        }else{
            $username = $_POST['username'];
            $password = $_POST['password'];
            $foto = $_FILES['foto']['name'];
            $file_tmp = $_FILES['foto']['tmp_name'];
            move_uploaded_file($file_tmp,'img/'.$foto);
            $result = mysqli_query($koneksi, "INSERT INTO admin (username,password,foto) VALUES('$username','$password','$foto')");
            if($result > 0){
                header("Location: adminuser.php");
               }
        }
    }
   ?>
</body>

<form action="" method="post" enctype="multipart/form-data">
    
    <table class="table caption-top">
  <thead>
  <hr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"></th>
      <tr>
            <td>username</td>
            <td><input type="text" name="username" value=<?=@$username?> ></td>
        </tr>
        <tr>
            <td>password</td>
            <td><input type="text" name="password" value=<?=@$password?> ></td>
        </tr>
        <tr>
            <td>foto</td>
            <td><input type="file" name="foto" value=<?=@$foto?> ></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="tambah"></td>
        </tr>
    </tr>
  </tbody>
</table>
</form>
</center>

</html>