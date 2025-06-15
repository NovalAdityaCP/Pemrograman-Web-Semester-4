<?php
include '../conn.php';
$id = $_GET['id_pengeluaran'];
$conn->query("DELETE FROM angpau WHERE id_pengeluaran =$id");
header("Location: index.php");
?>