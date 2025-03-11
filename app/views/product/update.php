<?php
require_once __DIR__ . '/../../models/Product.php';

$product = new Product();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $product = $product->getProductById($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product->updateProduct($_POST['id'], $_POST['name'], $_POST['price'], $_POST['stock'], $_POST['category_id']);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Edit Product</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
        <div class="form-group">
            <label for="name">Nama Produk:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $product['name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="price">Harga:</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?php echo $product['price']; ?>" required>
        </div>
        <div class="form-group">
            <label for="stock">Stok:</label>
            <input type="number" class="form-control" id="stock" name="stock" value="<?php echo $product['stock']; ?>" required>
        </div>
        <div class="form-group mb-3">
            <label for="category_id">Kategori:</label>
            <select class="form-select" id="category_id" name="category_id" required>
                <option value="1" <?php echo $product['category_id'] == 1 ? 'selected' : ''; ?>>Makanan</option>
                <option value="2" <?php echo $product['category_id'] == 2 ? 'selected' : ''; ?>>Minuman</option>
                <option value="3" <?php echo $product['category_id'] == 3 ? 'selected' : ''; ?>>Snack</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
</body>
</html>