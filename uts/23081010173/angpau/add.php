<?php
include '../conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tanggal = $_POST['tanggal'];
    $pemberi = $_POST['nama_pemberi'];
    $jumlah = $_POST['jumlah'];

    $conn->query("INSERT INTO angpau (tanggal, nama_pemberi, jumlah) VALUES ('$tanggal', '$pemberi', '$jumlah')");
    header("Location: index.php");
}
?>

<form method="post">
    Tanggal: <input type="text" name="tanggal" required><br>
    Nama Pemberi Angpau: <input type="text" name="nama_pemberi" required><br>
    Jumlah: <input type="text" name="jumlah" required><br>
    <button type="submit">Tambah</button>
</form>
