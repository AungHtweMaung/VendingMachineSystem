<?php

session_start();

require('Controllers/AuthController.php');
require('Controllers/ProductController.php');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$authController = new AuthController();
$productController = new ProductController();

switch ($uri) {
    case '/':
        require __DIR__ . '/views/user/home.php';
        break;
    // case '/user/home':
    //     require __DIR__ . '/views/user/home.php';
    //     break;
    case '/login':
        if ($method === 'POST') {
            $authController->login();
        } else {
            $authController->loginPage();
        }
        break;
    case '/register':
        if ($method === 'POST') {
            $authController->register();
        } else {
            $authController->registerPage();
        }
        break;
    case '/logout':
        $authController->logout();
        break;
    case '/products':
        $productController->userIndex();
        break;
    case '/admin/products':
        if ($method === 'GET') {
            $productController->index();
        } elseif ($method === 'POST') {
            $productController->store();
        }
        break;
    case '/admin/products/create':
        $productController->create();
        break;
    case '/products/purchase':
        $productController->purchase();
        break;
    case '/purchase/history':
        $productController->purchaseHistory();
        break;
   
    default:
        // Handle regex-based routes
        if (preg_match('/^\/admin\/products\/(\d+)\/edit$/', $uri, $matches)) {
            if ($method === 'GET') {
                $productController->edit($matches[1]);
            }
        } elseif (preg_match('/^\/admin\/products\/(\d+)$/', $uri, $matches)) {
            if ($method === 'POST') {
                if (isset($_POST['_method']) && $_POST['_method'] === 'PUT') {
                    $productController->update($matches[1]);
                }
            }
        } elseif (preg_match('/^\/admin\/products\/(\d+)\/delete$/', $uri, $matches)) {
            if ($method === 'POST') {
                $productController->delete($matches[1]);
            }
        } else {
            // 404 Not Found
            http_response_code(404);
            echo "404 Not Found";
        }
        break;
}
