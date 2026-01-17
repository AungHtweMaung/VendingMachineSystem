<?php

require_once __DIR__ . '/../Middleware/adminMiddleware.php';
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
        adminAuth();

        // Pagination parameters
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
        $page = max(1, $page); // Ensure page is at least 1
        $limit = max(1, $limit); // Ensure limit is at least 1

        $offset = ($page - 1) * $limit;
        var_dump($limit, $offset);

        $products = $this->productModel->getAllPaginated($limit, $offset);
        $totalCount = $this->productModel->getTotalCount();
        $totalPages = ceil($totalCount / $limit);

        require __DIR__ . '/../views/admin/products/index.php';
    }

    public function create()
    {
        adminAuth();

        require __DIR__ . '/../views/admin/products/create.php';
    }

    public function store()
    {
        adminAuth();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $errors = $this->checkValidation($_POST);
            // var_dump($errors);
            if (!empty($errors)) {
                // Handle validation errors
                require __DIR__ . '/../views/admin/products/create.php';
                return;
            }

            $imagePath = null;
            if (isset($_FILES['image'])) {
                $imagePath = $this->uploadImage($_FILES['image']);
                if (!$imagePath) {
                    $errors['image'] = "Failed to upload image.";
                    require __DIR__ . '/../views/admin/products/create.php';
                    return;
                }
            }

            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'quantity' => $_POST['quantity'],
                'image' => $imagePath
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
        adminAuth();

        $product = $this->productModel->getById($id);   
        if (!$product) {
            echo "Product not found.";
            return;
        }

        require __DIR__ . '/../views/admin/products/edit.php';
    }

    public function update($id)
    {
        adminAuth();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = $this->checkValidation($_POST);
            if (!empty($errors)) {
                // Handle validation errors
                $product = $this->productModel->getById($id);
                require __DIR__ . '/../views/admin/products/edit.php';
                return;
            }

            $product = $this->productModel->getById($id);
            $imagePath = $product['image']; // Keep existing image by default

            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $newImagePath = $this->uploadImage($_FILES['image']);
                if (!$newImagePath) {
                    $errors['image'] = "Failed to upload image.";
                    $product = $this->productModel->getById($id);
                    require __DIR__ . '/../views/admin/products/edit.php';
                    return;
                }
                // Delete old image if exists
                if ($imagePath) {
                    $this->deleteImage($imagePath);
                }
                $imagePath = $newImagePath;
            }

            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'quantity' => $_POST['quantity'],
                'image' => $imagePath
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
        adminAuth();
        if ($this->productModel->delete($id)) {
            header('Location: /admin/products');
            exit;
        } else {
            echo "Error deleting product.";
        }
    }

    public function userIndex()
    {
        // Pagination parameters
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 12; // More items per page for users
        $page = max(1, $page);
        $limit = max(1, $limit);

        $offset = ($page - 1) * $limit;

        $products = $this->productModel->getAllPaginated($limit, $offset);
        $totalCount = $this->productModel->getTotalCount();
        $totalPages = ceil($totalCount / $limit);

        require __DIR__ . '/../views/user/products.php';
    }

    public function purchase()
    {
        // Implement purchase logic
        echo "Purchase functionality";
    }


    private function uploadImage($file)
    {
        $uploadDir = __DIR__ . '/../uploads/products/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
        if (!in_array($file['type'], $allowedTypes)) {
            return false;
        }

        $maxSize = 5 * 1024 * 1024; // 5MB
        if ($file['size'] > $maxSize) {
            return false;
        }

        $fileName = uniqid() . '_' . basename($file['name']);
        $targetPath = $uploadDir . $fileName;

        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            return 'uploads/products/' . $fileName;
        }

        return false;
    }

    private function deleteImage($imagePath)
    {
        $fullPath = __DIR__ . '/../' . $imagePath;
        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
    }

    private function checkValidation($data)
    {
        $errors = [];

        if (empty($data['name'])) {
            $errors['name'] = "Name is required.";
        }

        if (empty($data['price']) || !is_numeric($data['price']) || $data['price'] <= 0) {
            $errors['price'] = "Valid price is required.";
        }

        if (empty($data['quantity']) || !is_numeric($data['quantity']) || $data['quantity'] < 0) {
            $errors['quantity'] = "Valid quantity is required.";
        }

        return $errors;
    }
}
