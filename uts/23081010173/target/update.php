<?php
include '../conn.php';

$id = $_GET['id_target'];
$result = $conn->query("SELECT * FROM target WHERE id_target=$id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jumlah = $_POST['jumlah_target'];
    $conn->query("UPDATE 'target' SET jumlah_target='$jumlah' WHERE id_target=$id");
    header("Location: index.php");
}
?>

<form method="post">
    Jumlah: <input type="text" name="jumlah_target" value="<?= $row['jumlah_target'] ?>" required><br>
    <button type="submit">Update</button>
    <a href="index.php">Kembali</a>
</form>
