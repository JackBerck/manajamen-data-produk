<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
</head>
<body>
    <h1>Create Product</h1>
    <form action="index.php?controller=product&action=create" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" required><br>

        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" required><br>

        <label for="category_id">Category ID:</label>
        <input type="number" id="category_id" name="category_id" required><br>

        <input type="submit" value="Create">
    </form>
</body>
</html>
