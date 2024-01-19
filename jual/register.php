<?php
include 'koneksi.php';

if(isset($_POST['daftar'])){
  $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $alamat = $_POST['username'];
    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
    $cek_login = mysqli_num_rows($query);

    if($cek_login > 0){
        echo "<script>
        alert('Gagal Daftar !');
        window.location = 'register.php'
        </script>";
    }else{
        mysqli_query($koneksi, "INSERT INTO user(email,username,password,alamat) VALUES('$email','$username','$password','$alamat')");
        echo "<script>
        alert('Berhasil !');
        window.location = 'index.php'
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
<form action="" method="post">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter email" name="email" required>

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter username" name="username" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password"required>

    <label for="alamat"><b>Alamat</b></label>
    <input type="text" placeholder="Enter alamat" name="alamat" required>

    <hr>

    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <input type="submit" name="daftar" value="register" class="registerbtn">
  </div>

  <div class="container signin">
    <p>Already have an account? Click <a href="loginform.php">Login</a>.</p>
  </div>
</form>
</body>
</html>