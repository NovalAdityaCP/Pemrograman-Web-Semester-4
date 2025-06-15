<?php
include '../conn.php';

$id = $_GET['id_angpau'];
$result = $conn->query("SELECT * FROM angpau WHERE id_angpau=$id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tanggal = $_POST['tanggal'];
    $pemberi = $_POST['nama_pemberi'];
    $jumlah = $_POST['jumlah'];
    $conn->query("UPDATE angpau SET tanggal='$tanggal', nama_pemberi='$pemberi', jumlah='$jumlah' WHERE id_angpau=$id");
    header("Location: index.php");
}
?>

<form method="post">
    Tanggal: <input type="text" name="tanggal" value="<?= $row['tanggal'] ?>" required><br>
    Nama Pemberi Angpau: <input type="text" name="nama_pemberi" value="<?= $row['nama_pemberi'] ?>" required><br>
    Jumlah: <input type="text" name="jumlah" value="<?= $row['jumlah'] ?>" required><br>
    <button type="submit">Update</button>
    <a href="index.php">Kembali</a>
</form>
