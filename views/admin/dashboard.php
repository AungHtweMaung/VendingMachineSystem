<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../dist/style.css">
    
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
            <a href="/admin/dashboard" class="sidebar-link active">
                <i class="bi bi-house-door"></i>
                <span>Dashboard</span>
            </a>
            <a href="/admin/products" class="sidebar-link">
                <i class="bi bi-box-seam"></i>
                <span>Products</span>
            </a>
            <!-- <a href="#" class="sidebar-link">
                <i class="bi bi-bar-chart"></i>
                <span>Analytics</span>
            </a>
            <a href="#" class="sidebar-link">
                <i class="bi bi-people"></i>
                <span>Users</span>
            </a>
            <a href="#" class="sidebar-link">
                <i class="bi bi-cart"></i>
                <span>Orders</span>
            </a>
            <a href="#" class="sidebar-link">
                <i class="bi bi-box-seam"></i>
                <span>Products</span>
            </a>
            <a href="#" class="sidebar-link">
                <i class="bi bi-wallet2"></i>
                <span>Finance</span>
            </a>
            <a href="#" class="sidebar-link">
                <i class="bi bi-chat-left-text"></i>
                <span>Messages</span>
                <span class="badge bg-danger ms-auto">3</span>
            </a> -->
            
            <!-- Divider -->
            <hr class="text-white-50 mx-3 my-4">
            
            <h6 class="text-white-50 px-3 mb-3">Settings</h6>
            
            <!-- <a href="#" class="sidebar-link">
                <i class="bi bi-gear"></i>
                <span>Settings</span>
            </a>
            <a href="#" class="sidebar-link">
                <i class="bi bi-question-circle"></i>
                <span>Help & Support</span>
            </a> -->
            <a href="#" class="sidebar-link">
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
                        <input type="text" class="form-control border-start-0" placeholder="Search...">
                    </div>
                </div>
                
                <!-- Navbar Right Side -->
                <div class="navbar-nav ms-auto align-items-center">
                    <!-- Notifications -->
                    <!-- <div class="nav-item dropdown me-3">
                        <a class="nav-link position-relative" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-bell fs-5"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                5
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <h6 class="dropdown-header">Notifications</h6>
                            <a class="dropdown-item" href="#">
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary bg-opacity-10 rounded p-2 me-3">
                                        <i class="bi bi-cart text-primary"></i>
                                    </div>
                                    <div>
                                        <small>New order received</small>
                                        <div class="text-muted">2 min ago</div>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="#">
                                <div class="d-flex align-items-center">
                                    <div class="bg-success bg-opacity-10 rounded p-2 me-3">
                                        <i class="bi bi-person-plus text-success"></i>
                                    </div>
                                    <div>
                                        <small>New user registered</small>
                                        <div class="text-muted">5 min ago</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    
                    <div class="nav-item dropdown me-3">
                        <a class="nav-link position-relative" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-envelope fs-5"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning">
                                3
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <h6 class="dropdown-header">Messages</h6>
                            <a class="dropdown-item" href="#">
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/40" class="rounded-circle me-3" alt="User">
                                    <div>
                                        <strong>John Doe</strong>
                                        <div class="text-muted">Hello, are you available...</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div> -->
                    
                    <!-- User Profile -->
                    <div class="nav-item dropdown">
                        <a class="nav-link d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                            <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center me-2" 
                                 style="width: 35px; height: 35px;">
                                <span class="text-white">JD</span>
                            </div>
                            <span class="d-none d-md-inline">John Doe</span>
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
                            <a class="dropdown-item" href="#">
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
                    <h4 class="mb-1">Welcome back, John!</h4>
                    <p class="text-muted mb-0">Here's what's happening with your store today.</p>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-primary">
                        <i class="bi bi-plus-circle me-2"></i> Add New
                    </button>
                    <button class="btn btn-outline-secondary">
                        <i class="bi bi-download me-2"></i> Export
                    </button>
                </div>
            </div>
            
            <!-- Stats Cards -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary bg-opacity-10 rounded p-3 me-3">
                                    <i class="bi bi-box-seam text-primary fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="card-title mb-0">Total Products</h6>
                                    <h4 class="mb-0">0</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="bg-success bg-opacity-10 rounded p-3 me-3">
                                    <i class="bi bi-cart text-success fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="card-title mb-0">Total Orders</h6>
                                    <h4 class="mb-0">0</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="bg-warning bg-opacity-10 rounded p-3 me-3">
                                    <i class="bi bi-people text-warning fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="card-title mb-0">Total Users</h6>
                                    <h4 class="mb-0">0</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="bg-info bg-opacity-10 rounded p-3 me-3">
                                    <i class="bi bi-currency-dollar text-info fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="card-title mb-0">Revenue</h6>
                                    <h4 class="mb-0">$0</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products Management Section -->
            <div class="row">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0"><i class="bi bi-box-seam me-2"></i>Product Management</h5>
                                <div>
                                    <a href="/admin/products" class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-eye me-1"></i>View All
                                    </a>
                                    <a href="/admin/products/create" class="btn btn-primary btn-sm">
                                        <i class="bi bi-plus-circle me-1"></i>Add Product
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th><i class="bi bi-hash"></i> ID</th>
                                            <th><i class="bi bi-tag"></i> Name</th>
                                            <th><i class="bi bi-file-text"></i> Description</th>
                                            <th><i class="bi bi-cash"></i> Price</th>
                                            <th><i class="bi bi-boxes"></i> Quantity</th>
                                            <th><i class="bi bi-calendar"></i> Created</th>
                                            <th><i class="bi bi-gear"></i> Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Recent Products will be loaded here -->
                                        <tr>
                                            <td colspan="7" class="text-center text-muted py-4">
                                                <i class="bi bi-box-seam fs-1 mb-2"></i>
                                                <br>
                                                No products found. <a href="/admin/products/create" class="text-primary">Add your first product</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white">
                            <h6 class="mb-0"><i class="bi bi-lightning me-2"></i>Quick Actions</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <a href="/admin/products/create" class="btn btn-outline-primary w-100 h-100 d-flex flex-column align-items-center justify-content-center p-3">
                                        <i class="bi bi-plus-circle fs-2 mb-2"></i>
                                        <span>Add Product</span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/admin/products" class="btn btn-outline-success w-100 h-100 d-flex flex-column align-items-center justify-content-center p-3">
                                        <i class="bi bi-list-ul fs-2 mb-2"></i>
                                        <span>View Products</span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-outline-warning w-100 h-100 d-flex flex-column align-items-center justify-content-center p-3" disabled>
                                        <i class="bi bi-graph-up fs-2 mb-2"></i>
                                        <span>View Reports</span>
                                    </button>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-outline-info w-100 h-100 d-flex flex-column align-items-center justify-content-center p-3" disabled>
                                        <i class="bi bi-gear fs-2 mb-2"></i>
                                        <span>Settings</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="../../dist/index.js"></script>
</body>
</html>