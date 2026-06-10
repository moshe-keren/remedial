<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn,"SELECT * FROM keuangan WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){
    mysqli_query($conn,"UPDATE keuangan SET
    tanggal='$_POST[tanggal]',
    jenis_transaksi='$_POST[jenis]',
    nominal='$_POST[nominal]',
    keterangan='$_POST[keterangan]'
    WHERE id='$id'");

    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-box">
<h2>Edit Transaksi</h2>

<form method="POST">
    <input type="date" name="tanggal" value="<?= $row['tanggal']; ?>">

    <select name="jenis">
        <option <?= ($row['jenis_transaksi']=="Pemasukan")?"selected":""; ?>>
            Pemasukan
        </option>
        <option <?= ($row['jenis_transaksi']=="Pengeluaran")?"selected":""; ?>>
            Pengeluaran
        </option>
    </select>

    <input type="number" name="nominal" value="<?= $row['nominal']; ?>">

    <textarea name="keterangan"><?= $row['keterangan']; ?></textarea>

    <button type="submit" name="update">Update</button>
</form>

</div>
</body>
</html>