<?php
require_once __DIR__ . '/../../models/Product.php';

$products = (new Product())->getAllProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajemen Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="container mt-5 mb-5">
    <h1>Daftar Produk</h1>
    <a href='create.php' class="btn btn-primary mb-3">Tambah Produk Baru</a>
    <table id="productsTable" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (isset($products) && is_array($products)) {
            foreach ($products as $product) {
                echo "<tr>
                    <td>{$product['id']}</td>
                    <td>{$product['name']}</td>
                    <td class='price'>{$product['price']}</td>
                    <td>{$product['stock']}</td>
                    <td>
                        <a href='update.php?id={$product['id']}' class='btn btn-warning btn-sm'>Edit</a>
                        <button class='btn btn-danger btn-sm delete-btn' data-id='{$product['id']}'>Hapus</button>
                    </td>
                  </tr>";
            }
        }
        ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#productsTable').DataTable();

        $('.delete-btn').on('click', function() {
            let productId = $(this).data('id');

            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "delete.php?id=" + productId;
                }
            });
        });
    });
</script>

<script src="js/script.js"></script>
</body>
</html>