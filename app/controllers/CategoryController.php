<?php
require_once __DIR__ . '/../models/Category.php';

class CategoryController {
    private $categoryModel;

    public function __construct() {
        $this->categoryModel = new Category();
    }

    public function index() {
        $categories = $this->categoryModel->getAllCategories();
        include __DIR__ . '/../views/categories/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->categoryModel->createCategory($_POST['name']);
            header("Location: index.php");
        } else {
            include __DIR__ . '/../views/categories/create.php';
        }
    }

    public function update($id) {
        $product = $this->categoryModel->getCategoryById($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->categoryModel->updateCategory($_POST['id'], $_POST['name']);
            header("Location: index.php");
        } else {
            include __DIR__ . '/../views/categories/update.php';
        }
    }

    public function delete($id) {
        $this->categoryModel->deleteCategory($id);
        header("Location: index.php");
    }
}
