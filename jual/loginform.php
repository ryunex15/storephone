<?php
session_start();
include 'koneksi.php';

$konek = mysqli_query($koneksi, "SELECT * FROM user");
$id = mysqli_fetch_assoc($konek);
if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query= mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    if(mysqli_num_rows($query)>0){
        $_SESSION['user'] = $_POST['username'];
        $_SESSION['pass'] = $_POST['password'];
        echo "<script>
        alert('Berhasil login!')
        window.location = 'index.php';
        </script>";
    }else{
        echo "<script>
        alert('Username atau Password tidak sesuai!')
        window.location = 'loginform.php';
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/loginform.css">
    <style>
      body {
        min-width: 80%;
      }
    </style>
</head>
<body>
<form action="" method="post">
  <div class="container">
    <h1>Login</h1>
    <p>Please fill in this form to login.</p>
    <hr>

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter username" name="username" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password"required>

    <hr>
    <input type="submit" name="login" value="Login" class="loginbtn">
  </div>

  <div class="container login">
    <p>Dont have an account? Click <a href="register.php">Register</a>.</p>
  </div>
</form>
</body>
</html>