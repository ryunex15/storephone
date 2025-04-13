<h2>Daftar Siswa</h2>
<table border="1" cellpadding="10" cellspacing="0" style="width: 100%; text-align: left; border-collapse: collapse;">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th>No</th>
            <th>Username</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>

        <?php
        include 'koneksi.php';

        if (isset($_GET['aksi'])) {
            if ($_GET['aksi'] == "edit") {
                $result = mysqli_query($conn, "SELECT * FROM users WHERE id='$_GET[id]' ");
                while ($query = mysqli_fetch_array($result)) {
                    $username = $query['username'];
                }
            } elseif ($_GET['aksi'] == "hapus") {
                $hapus = mysqli_query($conn, "DELETE FROM users WHERE id='$_GET[id]' ");
                if ($hapus) {
                    header("Location: crud.php");
                    exit;
                }
            }
        }
        ?>

        <?php
        include 'koneksi.php';
        $no = 1;
        $query = mysqli_query($conn, "SELECT * FROM users");

        while ($data = mysqli_fetch_array($query)) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . ($data['username']) . "</td>";
            echo "<td style='text-align: center;'>
                    <a href='crud.php?aksi=edit&id=" . $data['id'] . "' style='margin-right: 10px; color: blue;'>Edit</a>
                    <a href='crud.php?aksi=hapus&id=" . $data['id'] . "' style='color: red;' onclick=\"return confirm('Yakin ingin hapus data ini?')\">Hapus</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<?php
if (isset($_POST['submit'])) {
    if (isset($_GET['aksi']) && $_GET['aksi'] == "edit") {
        $id = $_GET['id'];
        $username = $_POST['username'];
        $edit = mysqli_query($conn, "UPDATE users SET username='$username' where id='$id'");
        if ($edit) {
            header("Location: crud.php");
        }
    } else {
        $username = $_POST['username'];
        $result = mysqli_query($conn, "INSERT INTO users (username) VALUES('$username')");
        if ($result > 0) {
            header("Location: crud.php");
        }
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">

    <table class="table caption-top">
        <thead>
            <hr>
        </thead>
        <tbody>
            <tr>
                <th scope="row"></th>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" value=<?= @$username ?>></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Edit"></td>
            </tr>
            </tr>
        </tbody>
    </table>
</form>

<?php

if (isset($_POST['daftar'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    mysqli_query($conn, "INSERT INTO users(username,password) VALUES('$username','$password')");
    echo "<script>
        alert('Berhasil !');
        window.location = 'crud.php'
        </script>";
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