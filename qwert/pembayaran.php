<?php
include 'koneksi.php';

if (isset($_POST['bayar'])) {
    $username = $_POST['username'];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];
    $query = mysqli_query($conn, "SELECT * FROM pembayaran");

    if (mysqli_query($conn, "INSERT INTO pembayaran (username,jumlah,tanggal) VALUES('$username','$jumlah','$tanggal')")) {
        echo "<script>
            alert('Berhasil !');
            window.location = 'pembayaran.php';
        </script>";
    }
}

?>
<!DOCTYPE html>
<html>
<a href="data_bayar.php">Data Pembayaran</a>

<head>
    <title>Pembayaran</title>
</head>

<body>
    <form action="" method="post">
        <div class="container">
            <h1>Pembayaran</h1>

            <label for="username"><b>username</b></label>
            <input type="text" placeholder="username" name="username" required>

            <label for="jumlah"><b>Jumlah</b></label>
            <input type="number" placeholder="Jumlah" name="jumlah" required>

            <label for="tanggal"><b>Tanggal</b></label>
            <input type="date" name="tanggal" required>

            <input type="submit" name="bayar" value="Bayar">
        </div>
    </form>
</body>

</html>