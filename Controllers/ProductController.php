<?php
require_once __DIR__ . '/../Models/Product.php';

class ProductController
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new Product();
    }

    public function index()
    {
        // Check if user is admin
        // if (!isset($_SESSION['role']) || $_SESSION['role'] != 1) {
        //     header('Location: /login');
        //     exit;
        // }

        $products = $this->productModel->getAll();
        require __DIR__ . '/../views/admin/products/index.php';
    }

    public function create()
    {
        // Check if user is admin
        // if (!isset($_SESSION['role']) || $_SESSION['role'] != 1) {
        //     header('Location: /login');
        //     exit;
        // }

        require __DIR__ . '/../views/admin/products/create.php';
    }

    public function store()
    {
        // Check if user is admin
        // if (!isset($_SESSION['role']) || $_SESSION['role'] != 1) {
        //     header('Location: /login');
        //     exit;
        // }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'quantity' => $_POST['quantity']
            ];

            if ($this->productModel->create($data)) {
                header('Location: /admin/products');
                exit;
            } else {
                echo "Error creating product.";
            }
        }
    }

    public function edit($id)
    {
        // Check if user is admin
        // if (!isset($_SESSION['role']) || $_SESSION['role'] != 1) {
        //     header('Location: /login');
        //     exit;
        // }

        $product = $this->productModel->getById($id);
        if (!$product) {
            echo "Product not found.";
            return;
        }

        require __DIR__ . '/../views/admin/products/edit.php';
    }

    public function update($id)
    {
        // Check if user is admin
        // if (!isset($_SESSION['role']) || $_SESSION['role'] != 1) {
        //     header('Location: /login');
        //     exit;
        // }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'quantity' => $_POST['quantity']
            ];

            if ($this->productModel->update($id, $data)) {
                header('Location: /admin/products');
                exit;
            } else {
                echo "Error updating product.";
            }
        }
    }

    public function delete($id)
    {
        // Check if user is admin
        // if (!isset($_SESSION['role']) || $_SESSION['role'] != 1) {
        //     header('Location: /login');
        //     exit;
        // }

        if ($this->productModel->delete($id)) {
            header('Location: /products');
            exit;
        } else {
            echo "Error deleting product.";
        }
    }

    public function purchase()
    {
        // Implement purchase logic
        echo "Purchase functionality";
    }
}
