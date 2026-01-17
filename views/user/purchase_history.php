<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History - Vending Machine System</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .navbar {
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><i class="bi bi-shop"></i> Vending Machine System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="navbar-brand" href="/"><i class="bi bi-house-door"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand" href="/products"><i class="bi bi-grid"></i> Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand active" aria-current="page" href="/purchase/history"><i class="bi bi-receipt"></i> Order History</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> My Account
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person"></i> Profile</a></li>
                            <li><a class="dropdown-item" href="/orders"><i class="bi bi-receipt"></i> Order History</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/logout"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-1"><i class="bi bi-receipt me-2"></i>My Order History</h1>
                <p class="text-muted mb-0">View your past purchases</p>
            </div>
        </div>

        <?php if (empty($transactions)): ?>
            <div class="text-center py-5">
                <i class="bi bi-receipt fs-1 text-muted mb-3"></i>
                <h4 class="text-muted">No orders yet</h4>
                <p class="text-muted">Your order history will appear here once you make a purchase.</p>
                <a href="/products" class="btn btn-primary"><i class="bi bi-grid me-2"></i>Browse Products</a>
            </div>
        <?php else: ?>
            <div class="row">
                <?php foreach ($transactions as $transaction): ?>
                    <div class="col-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <h5 class="card-title"><?php echo htmlspecialchars($transaction['product_name']); ?></h5>
                                        <p class="card-text text-muted">Quantity: <?php echo htmlspecialchars($transaction['quantity']); ?> | Price: $<?php echo htmlspecialchars(number_format($transaction['price'], 2)); ?></p>
                                        <small class="text-muted">Purchased on: <?php echo htmlspecialchars($transaction['created_at']); ?></small>
                                    </div>
                                    <div class="col-md-4 text-end">
                                        <span class="h5 text-primary">$<?php echo htmlspecialchars(number_format($transaction['total_amount'], 2)); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <footer class="bg-dark text-light py-4">
        <div class="container text-center">
            <p>&copy; 2023 Vending Machine System. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>
