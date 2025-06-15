<?php
include '../conn.php';

$id = $_GET['id_pengeluaran'];
$result = $conn->query("SELECT * FROM pengeluaran_angpau WHERE id_pengeluaran=$id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deskripsi = $_POST['deskripsi_pengeluaran'];
    $jumlah = $_POST['jumlah'];
    $conn->query("UPDATE pengeluaran_angpau SET deskripsi_pengeluaran='$deskripsi', jumlah='$jumlah' WHERE id_pengeluaran=$id");
    header("Location: index.php");
}
?>

<form method="post">
    Deskripsi Pengeluaran: <input type="text" name="deskrips_pengeluaran" value="<?= $row['deskripsi_pengeluaran'] ?>" required><br>
    Jumlah: <input type="text" name="jumlah" value="<?= $row['jumlah'] ?>" required><br>
    <button type="submit">Update</button>
    <a href="index.php">Kembali</a>
</form>
