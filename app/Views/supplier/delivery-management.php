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
                
                <a class="menu-item active" href="<?= site_url('supplier/delivery-management') ?>" data-section="delivery-management">
                    <span class="icon">🚚</span>
                    <span class="label">Delivery Management</span>
                </a>
                
                <a class="menu-item" href="<?= site_url('supplier/invoices') ?>" data-section="invoices">
                    <span class="icon">📋</span>
                    <span class="label">Invoices</span>
                </a>
                
                <a class="menu-item" href="<?= site_url('supplier/product-catalog') ?>" data-section="product-catalog">
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
                        <h2>Delivery Management</h2>
                        <p>Track and manage all deliveries to branches.</p>
                    </div>
                    <div class="header-actions">
                        <button class="btn secondary">Export Report</button>
                        <button class="btn primary">Schedule Delivery</button>
                    </div>
                </div>

                <!-- Navigation Tabs -->
                <div class="delivery-tabs">
                    <button class="tab-btn <?= $active_tab === 'active' ? 'active' : '' ?>" data-tab="active">
                        Active Deliveries
                    </button>
                    <button class="tab-btn <?= $active_tab === 'completed' ? 'active' : '' ?>" data-tab="completed">
                        Completed
                    </button>
                </div>

                <!-- KPI Cards -->
                <div class="kpi-grid">
                    <?php foreach ($kpis as $key => $kpi): ?>
                    <div class="kpi-card kpi-<?= $kpi['color'] ?>">
                        <div class="kpi-icon"><?= $kpi['icon'] ?></div>
                        <div class="kpi-content">
                            <div class="kpi-value"><?= $kpi['value'] ?></div>
                            <div class="kpi-label"><?= $kpi['label'] ?></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- Active Deliveries Section -->
                <div class="deliveries-section" id="active-deliveries" style="<?= $active_tab === 'active' ? 'display: block;' : 'display: none;' ?>">
                    <div class="section-header">
                        <h3>Active Deliveries (<?= count($active_deliveries) ?>)</h3>
                    </div>

                    <?php if ($msg = session()->getFlashdata('message')): ?>
                        <div class="alert alert-success">
                            <?= esc($msg) ?>
                        </div>
                    <?php endif; ?>

                    <div class="deliveries-list">
                        <?php foreach ($active_deliveries as $delivery): ?>
                        <div class="delivery-card">
                            <div class="delivery-header">
                                <div class="delivery-id">
                                    <div class="delivery-number"><?= esc($delivery['id']) ?></div>
                                    <div class="order-reference">Order: <?= esc($delivery['order_id']) ?></div>
                                </div>
                                <div class="delivery-status">
                                    <span class="status-badge status-<?= $delivery['status_class'] ?>"><?= esc($delivery['status']) ?></span>
                                </div>
                            </div>
                            
                            <div class="delivery-details">
                                <div class="detail-item">
                                    <div class="detail-label">Branch:</div>
                                    <div class="detail-value"><?= esc($delivery['branch']) ?></div>
                                </div>
                                <div class="detail-item">
                                    <div class="detail-label">Driver:</div>
                                    <div class="detail-value"><?= esc($delivery['driver']) ?></div>
                                </div>
                                <div class="detail-item">
                                    <div class="detail-label">Items / Weight:</div>
                                    <div class="detail-value"><?= esc($delivery['items_weight']) ?></div>
                                </div>
                                <div class="detail-item">
                                    <div class="detail-label">Scheduled Time:</div>
                                    <div class="detail-value"><?= esc($delivery['scheduled_time']) ?></div>
                                </div>
                            </div>
                            
                            <div class="delivery-progress">
                                <div class="progress-container">
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: <?= $delivery['progress'] ?>%"></div>
                                    </div>
                                    <div class="progress-text"><?= $delivery['progress_text'] ?></div>
                                </div>
                            </div>
                            
                            <div class="delivery-actions">
                                <a href="<?= site_url('supplier/delivery-management/track/' . $delivery['id']) ?>" class="action-link track">Track Location</a>
                                <a href="<?= site_url('supplier/delivery-management/update/' . $delivery['id']) ?>" class="action-link update">Update Status</a>
                                <a href="<?= site_url('supplier/delivery-management/mark-delivered/' . $delivery['id']) ?>" class="action-link delivered">Mark Delivered</a>
                            </div>
                            
                            <div class="delivery-tools">
                                <button class="tool-btn" title="Location">
                                    <span class="icon">📍</span>
                                </button>
                                <button class="tool-btn" title="Call Driver">
                                    <span class="icon">📞</span>
                                </button>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Completed Deliveries Section -->
                <div class="deliveries-section" id="completed-deliveries" style="<?= $active_tab === 'completed' ? 'display: block;' : 'display: none;' ?>">
                    <div class="section-header">
                        <h3>Completed Deliveries (<?= count($completed_deliveries) ?>)</h3>
                    </div>

                    <div class="deliveries-list">
                        <?php foreach ($completed_deliveries as $delivery): ?>
                        <div class="delivery-card completed">
                            <div class="delivery-header">
                                <div class="delivery-id">
                                    <div class="delivery-number"><?= esc($delivery['id']) ?></div>
                                    <div class="order-reference">Order: <?= esc($delivery['order_id']) ?></div>
                                </div>
                                <div class="delivery-status">
                                    <span class="status-badge status-<?= $delivery['status_class'] ?>"><?= esc($delivery['status']) ?></span>
                                </div>
                            </div>
                            
                            <div class="delivery-details">
                                <div class="detail-item">
                                    <div class="detail-label">Branch:</div>
                                    <div class="detail-value"><?= esc($delivery['branch']) ?></div>
                                </div>
                                <div class="detail-item">
                                    <div class="detail-label">Driver:</div>
                                    <div class="detail-value"><?= esc($delivery['driver']) ?></div>
                                </div>
                                <div class="detail-item">
                                    <div class="detail-label">Items / Weight:</div>
                                    <div class="detail-value"><?= esc($delivery['items_weight']) ?></div>
                                </div>
                                <div class="detail-item">
                                    <div class="detail-label">Delivered Time:</div>
                                    <div class="detail-value"><?= esc($delivery['delivered_time']) ?></div>
                                </div>
                            </div>
                            
                            <div class="delivery-progress">
                                <div class="progress-container">
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: <?= $delivery['progress'] ?>%"></div>
                                    </div>
                                    <div class="progress-text"><?= $delivery['progress_text'] ?></div>
                                </div>
                            </div>
                            
                            <div class="delivery-tools">
                                <button class="tool-btn" title="View Details">
                                    <span class="icon">👁️</span>
                                </button>
                                <button class="tool-btn" title="Download Receipt">
                                    <span class="icon">📄</span>
                                </button>
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

        // Tab functionality
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const tab = this.getAttribute('data-tab');
                
                // Update active tab
                document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                // Show/hide sections
                document.getElementById('active-deliveries').style.display = tab === 'active' ? 'block' : 'none';
                document.getElementById('completed-deliveries').style.display = tab === 'completed' ? 'block' : 'none';
                
                // Update URL without page reload
                const url = new URL(window.location);
                url.searchParams.set('tab', tab);
                window.history.pushState({}, '', url);
            });
        });

        // Tool button actions
        document.querySelectorAll('.tool-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const action = this.title;
                alert(`${action} action clicked`);
            });
        });
    </script>
</body>
</html>
