<?php
include 'koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM keuangan ORDER BY tanggal DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Catatan Keuangan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Catatan Pemasukan & Pengeluaran</h2>

    <a href="tambah.php" class="btn">+ Tambah Data</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Tanggal</th>
            <th>Jenis</th>
            <th>Nominal</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
        <div class="foto-bg"></div>

        <?php while($row = mysqli_fetch_assoc($data)){ ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['tanggal']; ?></td>
            <td><?= $row['jenis_transaksi']; ?></td>
            <td>Rp <?= number_format($row['nominal']); ?></td>
            <td><?= $row['keterangan']; ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> |
                <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>