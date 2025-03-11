<?php
require_once __DIR__ . '/../../models/Product.php';

$product = new Product();

$product->deleteProduct($_GET['id']);

header('Location: index.php');

