<?php
include 'koneksi.php';

if(isset($_POST['simpan'])){
    $tanggal = $_POST['tanggal'];
    $jenis = $_POST['jenis'];
    $nominal = $_POST['nominal'];
    $keterangan = $_POST['keterangan'];

    mysqli_query($conn,"INSERT INTO keuangan
    (tanggal, jenis_transaksi, nominal, keterangan)
    VALUES
    ('$tanggal','$jenis','$nominal','$keterangan')");

    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-box">
<h2>Tambah Transaksi</h2>

<form method="POST">
    <input type="date" name="tanggal" required>

    <select name="jenis" required>
        <option>Pemasukan</option>
        <option>Pengeluaran</option>
    </select>

    <input type="number" name="nominal" placeholder="Nominal" required>

    <textarea name="keterangan" placeholder="Keterangan"></textarea>

    <button type="submit" name="simpan">Simpan</button>
</form>

</div>
</body>
</html>