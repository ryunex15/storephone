<?php
session_start();
include 'koneksi.php';

$konek = mysqli_query($conn, "SELECT * FROM users");
$id = mysqli_fetch_assoc($konek);
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password' ");
    if (mysqli_num_rows($query) > 0) {
        $_SESSION['user'] = $_POST['username'];
        $_SESSION['pass'] = $_POST['password'];
        echo "<script>
        alert('Login Berhasil');
        window.location = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('Username / Password salah !');
        window.location = 'login.php';
        </script>";
    }
}
?>

<h1>Form Login</h1>
<form action="" method="POST">
    <input type="text" name="username" placeholder="username">
    <br>
    <input type="password" name="password" placeholder="password">
    <input type="submit" name="login">
    <br>
</form>