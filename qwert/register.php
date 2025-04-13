<?php
include 'koneksi.php';

if (isset($_POST['daftar'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    $cek_login = mysqli_num_rows($query);

    if ($cek_login > 0) {
        echo "<script>
        alert('Gagal Daftar !');
        window.location = 'register.php'
        </script>";
    } else {
        mysqli_query($conn, "INSERT INTO users(username,password) VALUES('$username','$password')");
        echo "<script>
        alert('Berhasil !');
        window.location = 'index.php'
        </script>";
    }
}
?>

<head>
    <title>Tambah Siswa</title>
</head>

<body>
    <form action="" method="post">
        <div class="container">
            <h1>Tambah Siswa</h1>
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Username" name="username" required>
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Password" name="password" required>
            <input type="submit" name="daftar">
        </div>
    </form>
</body>