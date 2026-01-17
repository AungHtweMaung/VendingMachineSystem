<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product - Vending Machine System</title>
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

                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="d-none d-md-flex">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/admin/products">Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                    </ol>
                </nav>

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
                    <h4 class="mb-1">Edit Product</h4>
                    <p class="text-muted mb-0">Update product information</p>
                </div>
                <a href="/admin/products" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-2"></i> Back to Products
                </a>
            </div>

            <!-- Edit Product Form -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white">
                            <h6 class="mb-0"><i class="bi bi-pencil me-2"></i>Product Information</h6>
                        </div>
                        <div class="card-body">
                            <form action="/admin/products/<?php echo $product['id']; ?>" method="POST">
                                <input type="hidden" name="_method" value="PUT">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">
                                            <i class="bi bi-tag me-1"></i>Product Name <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="name" name="name"
                                               value="<?php echo htmlspecialchars($product['name']); ?>" required
                                               placeholder="Enter product name">
                                        <div class="form-text">Enter a descriptive name for the product</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="price" class="form-label">
                                            <i class="bi bi-cash me-1"></i>Price <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="number" step="0.01" min="0" class="form-control" id="price" name="price"
                                                   value="<?php echo htmlspecialchars($product['price']); ?>" required
                                                   placeholder="0.00">
                                        </div>
                                        <div class="form-text">Enter the price in dollars</div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">
                                        <i class="bi bi-file-text me-1"></i>Description
                                    </label>
                                    <textarea class="form-control" id="description" name="description" rows="4"
                                              placeholder="Enter product description"><?php echo htmlspecialchars($product['description']); ?></textarea>
                                    <div class="form-text">Provide a detailed description of the product</div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="quantity" class="form-label">
                                            <i class="bi bi-boxes me-1"></i>Quantity <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" min="0" class="form-control" id="quantity" name="quantity"
                                               value="<?php echo htmlspecialchars($product['quantity']); ?>" required
                                               placeholder="0">
                                        <div class="form-text">Enter the current stock quantity</div>
                                    </div>
                                </div>

                                <div class="d-flex gap-2 pt-3 border-top">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-circle me-2"></i>Update Product
                                    </button>
                                    <a href="/admin/products" class="btn btn-outline-secondary">
                                        <i class="bi bi-x-circle me-2"></i>Cancel
                                    </a>
                                </div>
                            </form>
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
