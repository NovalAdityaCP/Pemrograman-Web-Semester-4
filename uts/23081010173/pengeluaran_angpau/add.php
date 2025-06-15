<?php
include '../conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deskripsi = $_POST['deskripsi_pengeluaran'];
    $jumlah = $_POST['jumlah'];

    $conn->query("INSERT INTO pengeluaran_angpau (deskripsi_pengeluaran, jumlah) VALUES ('$deskripsi', '$jumlah')");
    header("Location: index.php");
}
?>

<form method="post">
    Deskripsi: <input type="text" name="deskripsi_pengeluaran" required><br>
    Jumlah: <input type="text" name="jumlah" required><br>
    <button type="submit">Tambah</button>
</form>
