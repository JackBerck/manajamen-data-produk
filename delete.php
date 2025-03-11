<?php
include 'includes/db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare('DELETE FROM products WHERE id = :id');
$stmt->execute(['id' => $id]);

header('Location: index.php');
?>