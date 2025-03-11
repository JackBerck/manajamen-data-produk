<?php
require_once __DIR__ . '/../../config/database.php';

class Product {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function getAllProducts() {
        $stmt = $this->pdo->query("SELECT * FROM products");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createProduct($name, $price, $stock, $category_id) {
        $stmt = $this->pdo->prepare("INSERT INTO products (name, price, stock, category_id) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$name, $price, $stock, $category_id]);
    }

    public function getProductById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProduct($id, $name, $price, $stock, $category_id) {
        $stmt = $this->pdo->prepare("UPDATE products SET name=?, price=?, stock=?, category_id=? WHERE id=?");
        return $stmt->execute([$name, $price, $stock, $category_id, $id]);
    }

    public function deleteProduct($id) {
        $stmt = $this->pdo->prepare("DELETE FROM products WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
