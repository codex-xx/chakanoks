<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'SCMS Supplier Portal') ?></title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('public/favicon.ico') ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/css/supplier.css?v=' . time()) ?>">
</head>
<body>
    <div class="layout">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="brand">
                <span class="dot"></span> 
                <span class="brand-text">CHAKANOKS</span>
            </div>
            
            <nav class="menu">
                <a class="menu-item" href="<?= site_url('supplier/dashboard') ?>" data-section="dashboard">
                    <span class="icon">⊞</span>
                    <span class="label">Dashboard</span>
                </a>
                
                <a class="menu-item" href="<?= site_url('supplier/purchase-orders') ?>" data-section="purchase-orders">
                    <span class="icon">📋</span>
                    <span class="label">Purchase Orders</span>
                </a>
                
                <a class="menu-item" href="<?= site_url('supplier/delivery-management') ?>" data-section="delivery-management">
                    <span class="icon">🚚</span>
                    <span class="label">Delivery Management</span>
                </a>
                
                <a class="menu-item" href="<?= site_url('supplier/invoices') ?>" data-section="invoices">
                    <span class="icon">📋</span>
                    <span class="label">Invoices</span>
                </a>
                
                <a class="menu-item active" href="<?= site_url('supplier/product-catalog') ?>" data-section="product-catalog">
                    <span class="icon">📦</span>
                    <span class="label">Product Catalog</span>
                </a>
                
                <a class="menu-item" href="<?= site_url('supplier/contracts') ?>" data-section="contracts">
                    <span class="icon">📝</span>
                    <span class="label">Contracts & Terms</span>
                </a>
                
                <a class="menu-item" href="<?= site_url('supplier/performance-reports') ?>" data-section="performance-reports">
                    <span class="icon">📊</span>
                    <span class="label">Performance Reports</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <section class="main">
            <!-- Header -->
            <div class="topbar">
                <div class="search">
                    <input type="text" placeholder="Search orders, deliveries, products…" />
                </div>
                <div class="userbox" id="userbox">
                    <span class="top-icon">🔔</span>
                    <button class="profile-toggle" id="profileToggle" type="button" aria-haspopup="menu" aria-expanded="false">
                        <img class="avatar" src="<?= base_url('public/assets/images/icon.jpg') ?>" alt="Profile">
                        <div class="info">
                            <div class="name"><?= esc($company_name) ?></div>
                            <div class="role">Supplier</div>
                        </div>
                    </button>
                    <div class="profile-menu" role="menu" aria-label="Profile">
                        <a href="#" role="menuitem">Profile</a>
                        <a href="<?= base_url('logout') ?>" role="menuitem">Logout</a>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="content">
                <div class="content-header">
                    <div class="page-info">
                        <h2>Product Catalog</h2>
                        <p>Manage your product inventory and pricing</p>
                    </div>
                    <div class="header-actions product-catalog-header-actions">
                        <div class="view-toggle">
                            <button class="view-btn <?= $view_mode === 'grid' ? 'active' : '' ?>" data-view="grid">
                                Grid
                            </button>
                            <button class="view-btn <?= $view_mode === 'list' ? 'active' : '' ?>" data-view="list">
                                List
                            </button>
                        </div>
                        <button class="btn primary" onclick="addProduct()">Add Product</button>
                    </div>
                </div>

                <!-- KPI Cards -->
                <div class="kpi-grid">
                    <div class="product-kpi-card">
                        <div class="product-kpi-content">
                            <div class="product-kpi-label">Active Products</div>
                            <div class="product-kpi-value active">4</div>
                        </div>
                        <div class="product-kpi-icon active">✓</div>
                    </div>
                    <div class="product-kpi-card">
                        <div class="product-kpi-content">
                            <div class="product-kpi-label">Low Stock</div>
                            <div class="product-kpi-value low-stock">1</div>
                        </div>
                        <div class="product-kpi-icon low-stock">🏠</div>
                    </div>
                    <div class="product-kpi-card">
                        <div class="product-kpi-content">
                            <div class="product-kpi-label">Out of Stock</div>
                            <div class="product-kpi-value out-of-stock">1</div>
                        </div>
                        <div class="product-kpi-icon out-of-stock">✕</div>
                    </div>
                    <div class="product-kpi-card">
                        <div class="product-kpi-content">
                            <div class="product-kpi-label">Total Value</div>
                            <div class="product-kpi-value total-value">$14,965</div>
                        </div>
                        <div class="product-kpi-icon total-value">$</div>
                    </div>
                </div>

                <!-- Products Section -->
                <div class="products-section">
                    <?php if ($msg = session()->getFlashdata('message')): ?>
                        <div class="alert alert-success">
                            <?= esc($msg) ?>
                        </div>
                    <?php endif; ?>

                    <!-- Grid View -->
                    <div class="products-grid" id="grid-view" style="<?= $view_mode === 'grid' ? 'display: grid;' : 'display: none;' ?>">
                        <?php foreach ($products as $product): ?>
                        <div class="product-card">
                            <div class="product-image">
                                <div class="image-placeholder">
                                    <span class="placeholder-icon">📦</span>
                                </div>
                                <div class="product-status">
                                    <span class="status-badge status-<?= $product['status_class'] ?>">
                                        <?= ucwords(str_replace('_', ' ', $product['status'])) ?>
                                    </span>
                                </div>
                            </div>
                            
                            <div class="product-info">
                                <div class="product-name"><?= esc($product['name']) ?></div>
                                <div class="product-category"><?= esc($product['category']) ?></div>
                                <div class="product-sku">SKU: <?= esc($product['sku']) ?></div>
                                
                                <div class="product-details">
                                    <div class="detail-row">
                                        <span class="detail-label">Price:</span>
                                        <span class="detail-value price"><?= esc($product['price']) ?></span>
                                    </div>
                                    <div class="detail-row">
                                        <span class="detail-label">Stock:</span>
                                        <span class="detail-value stock-<?= $product['status_class'] ?>"><?= $product['stock'] ?> units</span>
                                    </div>
                                    <div class="detail-row">
                                        <span class="detail-label">Weight:</span>
                                        <span class="detail-value"><?= esc($product['weight']) ?></span>
                                    </div>
                                </div>
                                
                                <div class="product-actions">
                                    <button class="action-btn edit" onclick="editProduct('<?= $product['id'] ?>')">
                                        <span class="icon">✏️</span>
                                        Edit
                                    </button>
                                    <button class="action-btn delete" onclick="deleteProduct('<?= $product['id'] ?>')">
                                        <span class="icon">🗑️</span>
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- List View -->
                    <div class="products-list" id="list-view" style="<?= $view_mode === 'list' ? 'display: block;' : 'display: none;' ?>">
                        <div class="list-header">
                            <div class="list-column">Product</div>
                            <div class="list-column">Category</div>
                            <div class="list-column">Price</div>
                            <div class="list-column">Stock</div>
                            <div class="list-column">Status</div>
                            <div class="list-column">Actions</div>
                        </div>
                        
                        <?php foreach ($products as $product): ?>
                        <div class="list-item">
                            <div class="list-cell product-info">
                                <div class="product-image-small">
                                    <span class="placeholder-icon">📦</span>
                                </div>
                                <div class="product-details">
                                    <div class="product-name"><?= esc($product['name']) ?></div>
                                    <div class="product-sku">SKU: <?= esc($product['sku']) ?></div>
                                </div>
                            </div>
                            <div class="list-cell"><?= esc($product['category']) ?></div>
                            <div class="list-cell price"><?= esc($product['price']) ?></div>
                            <div class="list-cell stock-<?= $product['status_class'] ?>"><?= $product['stock'] ?> units</div>
                            <div class="list-cell">
                                <span class="status-badge status-<?= $product['status_class'] ?>">
                                    <?= ucwords(str_replace('_', ' ', $product['status'])) ?>
                                </span>
                            </div>
                            <div class="list-cell">
                                <div class="action-buttons">
                                    <button class="action-btn edit" onclick="editProduct('<?= $product['id'] ?>')" title="Edit">
                                        <span class="icon">✏️</span>
                                    </button>
                                    <button class="action-btn delete" onclick="deleteProduct('<?= $product['id'] ?>')" title="Delete">
                                        <span class="icon">🗑️</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        // Profile menu toggle
        document.addEventListener('click', function (e) {
            var box = document.getElementById('userbox');
            var toggle = document.getElementById('profileToggle');
            if (!box) return;
            if (toggle && toggle.contains(e.target)) {
                var open = box.classList.toggle('open');
                toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
                return;
            }
            if (!box.contains(e.target)) {
                box.classList.remove('open');
                if (toggle) toggle.setAttribute('aria-expanded', 'false');
            }
        });

        // Menu item active state
        document.querySelectorAll('.menu-item').forEach(item => {
            item.addEventListener('click', function() {
                document.querySelectorAll('.menu-item').forEach(i => i.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // View toggle functionality
        document.querySelectorAll('.view-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const view = this.getAttribute('data-view');
                
                // Update active button
                document.querySelectorAll('.view-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                // Show/hide views
                document.getElementById('grid-view').style.display = view === 'grid' ? 'grid' : 'none';
                document.getElementById('list-view').style.display = view === 'list' ? 'block' : 'none';
                
                // Update URL without page reload
                const url = new URL(window.location);
                url.searchParams.set('view', view);
                window.history.pushState({}, '', url);
            });
        });

        // Action functions
        function addProduct() {
            window.location.href = '<?= site_url('supplier/product-catalog/add') ?>';
        }

        function editProduct(productId) {
            window.location.href = '<?= site_url('supplier/product-catalog/edit/') ?>' + productId;
        }

        function deleteProduct(productId) {
            if (confirm('Are you sure you want to delete this product?')) {
                window.location.href = '<?= site_url('supplier/product-catalog/delete/') ?>' + productId;
            }
        }
    </script>
</body>
</html>
