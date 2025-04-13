<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM pembayaran WHERE id = '$id'");
    $data = mysqli_fetch_assoc($query);
}
?>

<!DOCTYPE html>
<html>
<center>

    <body onload="window.print()">
        <h2>Bukti Pembayaran</h2>
        <p><strong>Nama:</strong> <?= $data['username']; ?></p>
        <p><strong>Jumlah:</strong> Rp <?= ($data['jumlah']); ?></p>
        <p><strong>Tanggal:</strong> <?= $data['tanggal']; ?></p>
    </body>
</center>

</html>