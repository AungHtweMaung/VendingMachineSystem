<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Management - Vending Machine System</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../../dist/style.css">
</head>
<body>
    <!-- Sidebar Overlay for Mobile -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar -->
    <aside id="sidebar">
        <!-- Sidebar Header -->
        <div class="sidebar-header d-flex align-items-center justify-content-between">
            <h3><i class="bi bi-speedometer2 me-2"></i> Vending Machine System</h3>
            <button class="btn btn-sm btn-outline-light d-none d-md-block" id="toggleCollapse">
                <i class="bi bi-chevron-left"></i>
            </button>
        </div>

        <!-- Sidebar Links -->
        <div class="sidebar-links">
            <a href="/admin/dashboard" class="sidebar-link">
                <i class="bi bi-house-door"></i>
                <span>Dashboard</span>
            </a>
            <a href="/admin/products" class="sidebar-link active">
                <i class="bi bi-box-seam"></i>
                <span>Products</span>
            </a>

            <!-- Divider -->
            <hr class="text-white-50 mx-3 my-4">

            <h6 class="text-white-50 px-3 mb-3">Settings</h6>

            <a href="/logout" class="sidebar-link">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main id="content">
        <!-- Navbar -->
        <nav class="main-navbar navbar navbar-expand-lg">
            <div class="container-fluid px-4">
                <!-- Mobile Toggle Button -->
                <button class="navbar-toggler" id="sidebarToggle" type="button">
                    <i class="bi bi-list"></i>
                </button>

                <!-- Search Bar (Hidden on mobile) -->
                <div class="d-none d-md-flex ms-3" style="width: 300px;">
                    <div class="input-group">
                        <span class="input-group-text bg-transparent border-end-0">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" class="form-control border-start-0" placeholder="Search products...">
                    </div>
                </div>

                <!-- Navbar Right Side -->
                <div class="navbar-nav ms-auto align-items-center">
                    <!-- User Profile -->
                    <div class="nav-item dropdown">
                        <a class="nav-link d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                            <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center me-2"
                                 style="width: 35px; height: 35px;">
                                <span class="text-white">A</span>
                            </div>
                            <span class="d-none d-md-inline">Admin</span>
                            <i class="bi bi-chevron-down ms-1 d-none d-md-inline"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">
                                <i class="bi bi-person me-2"></i> Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="bi bi-gear me-2"></i> Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/logout">
                                <i class="bi bi-box-arrow-right me-2"></i> Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div class="container-fluid p-4">
            <!-- Page Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="mb-1">Products Management</h4>
                    <p class="text-muted mb-0">Manage your vending machine products</p>
                </div>
                <div class="d-flex gap-2">
                    <a href="/admin/products/create" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-2"></i> Add Product
                    </a>
                    <button class="btn btn-outline-secondary">
                        <i class="bi bi-download me-2"></i> Export
                    </button>
                </div>
            </div>

            <!-- Products Table -->
            <div class="row">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white">
                            <h6 class="mb-0"><i class="bi bi-box-seam me-2"></i>All Products (<?php echo count($products); ?>)</h6>
                        </div>
                        <div class="card-body">
                            <?php if (empty($products)): ?>
                                <div class="text-center py-5">
                                    <i class="bi bi-box-seam fs-1 text-muted mb-3"></i>
                                    <h5 class="text-muted">No products found</h5>
                                    <p class="text-muted">Get started by adding your first product.</p>
                                    <a href="/admin/products/create" class="btn btn-primary">
                                        <i class="bi bi-plus-circle me-2"></i>Add First Product
                                    </a>
                                </div>
                            <?php else: ?>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th><i class="bi bi-hash"></i> ID</th>
                                                <th><i class="bi bi-tag"></i> Name</th>
                                                <th><i class="bi bi-file-text"></i> Description</th>
                                                <th><i class="bi bi-cash"></i> Price</th>
                                                <th><i class="bi bi-boxes"></i> Quantity</th>
                                                <th><i class="bi bi-gear"></i> Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($products as $product): ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($product['id']); ?></td>
                                                <td><?php echo htmlspecialchars($product['name']); ?></td>
                                                <td><?php echo htmlspecialchars(substr($product['description'], 0, 50)) . (strlen($product['description']) > 50 ? '...' : ''); ?></td>
                                                <td>$<?php echo htmlspecialchars(number_format($product['price'], 2)); ?></td>
                                                <td><?php echo htmlspecialchars($product['quantity']); ?></td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="/admin/products/<?php echo $product['id']; ?>/edit" class="btn btn-outline-warning btn-sm">
                                                            <i class="bi bi-pencil"></i>
                                                        </a>
                                                        <form action="/admin/products/<?php echo $product['id']; ?>/delete" method="POST" style="display:inline;">
                                                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="../../../dist/index.js"></script>
    
</body>
</html>
