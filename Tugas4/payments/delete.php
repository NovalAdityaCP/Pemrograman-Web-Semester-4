<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $conn->query("DELETE FROM payments WHERE id = '$id'");
}

header("Location: index.php");
?>
