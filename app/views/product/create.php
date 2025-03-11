<?php
require_once __DIR__ . '/../../models/Product.php';

$product = new Product();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product->createProduct($_POST['name'], $_POST['price'], $_POST['stock'], $_POST['category_id']);
    header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <h1>Tambah Produk Baru</h1>
    <form action='' method="post">
        <div class="form-group mb-3">
            <label for="name">Nama Produk:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group mb-3">
            <label for="category_id">Kategori:</label>
            <select class="form-select" id="category_id" name="category_id" required>
                <option value="1">Makanan</option>
                <option value="2">Minuman</option>
                <option value="3">Snack</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="price">Harga:</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group mb-3">
            <label for="stock">Stok:</label>
            <input type="number" class="form-control" id="stock" name="stock" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambahkan</button>
    </form>
</div>
</body>
</html>