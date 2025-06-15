<?php
include '../conn.php';
$id = $_GET['id_angpau'];
$conn->query("DELETE FROM angpau WHERE id_angpau =$id");
header("Location: index.php");
?>