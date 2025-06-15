<?php
include '../conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jumlah = $_POST['jumlah_target'];

    $conn->query("INSERT INTO 'target' (jumlah_target) VALUES ('$jumlah')");
    header("Location: index.php");
}
?>

<form method="post">
    Jumlah: <input type="text" name="jumlah" required><br>
    <button type="submit">Tambah</button>
</form>
