<?php
require_once __DIR__ . '/../models/Product.php';

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product();
    }

    public function index() {
        $products = $this->productModel->getAllProducts();
        include __DIR__ . '/../views/product/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->productModel->createProduct($_POST['name'], $_POST['price'], $_POST['stock'], $_POST['category_id']);
            header("Location: index.php");
        } else {
            include __DIR__ . '/../views/product/create.php';
        }
    }

    public function update($id) {
        $product = $this->productModel->getProductById($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->productModel->updateProduct($_POST['id'], $_POST['name'], $_POST['price'], $_POST['stock'], $_POST['category_id']);
            header("Location: index.php");
        } else {
            include __DIR__ . '/../views/product/update.php';
        }
    }

    public function delete($id) {
        $this->productModel->deleteProduct($id);
        header("Location: index.php");
    }
}
