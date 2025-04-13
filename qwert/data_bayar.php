<?php
include "koneksi.php";

$query = mysqli_query($conn, "SELECT * FROM pembayaran");

$no = 1;
?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Pembayaran</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        th,
        td {
            border: 1px solid #888;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #eee;
        }

        h2 {
            text-align: center;
        }

        .back-link {
            display: block;
            width: fit-content;
            margin: 20px auto;
        }
    </style>
</head>

<body>

    <a href="pembayaran.php" class="back-link">&lt; Kembali</a>

    <h2>Data Pembayaran</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($row['username']); ?></td>
                    <td><?= $row['jumlah'] ?></td>
                    <td><?= $row['tanggal']; ?></td>
                    <td>
                        <a href="print.php?id=<?= $row['id']; ?>" target="_blank">Print</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</body>

</html>