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
                <a class="menu-item active" href="<?= site_url('supplier/dashboard') ?>" data-section="dashboard">
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
                        <h2>Supplier Dashboard</h2>
                        <p>Welcome back to your supplier portal</p>
                    </div>
                    <div class="header-actions">
                        <select class="period-select">
                            <option value="30">Last 30 days</option>
                            <option value="7">Last 7 days</option>
                            <option value="90">Last 90 days</option>
                        </select>
                        <button class="btn primary">Export Report</button>
                    </div>
                </div>

                <!-- KPI Cards -->
                <div class="kpi-grid">
                    <?php foreach ($kpis as $key => $kpi): ?>
                    <div class="kpi-card kpi-<?= $kpi['color'] ?>">
                        <div class="kpi-icon"><?= $kpi['icon'] ?></div>
                        <div class="kpi-content">
                            <div class="kpi-value"><?= $kpi['value'] ?></div>
                            <div class="kpi-label"><?= ucwords(str_replace('_', ' ', $key)) ?></div>
                            <div class="kpi-change positive"><?= $kpi['change'] ?></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- Charts and Data Section -->
                <div class="dashboard-grid">
                    <!-- Orders Trend Chart -->
                    <div class="chart-card">
                        <div class="chart-header">
                            <h3>Orders Trend</h3>
                            <div class="chart-legend">
                                <div class="legend-item">
                                    <span class="legend-dot orders"></span>
                                    <span>Orders</span>
                                </div>
                                <div class="legend-item">
                                    <span class="legend-dot revenue"></span>
                                    <span>Revenue</span>
                                </div>
                            </div>
                        </div>
                        <div class="chart-container">
                            <canvas id="ordersChart" width="400" height="200"></canvas>
                        </div>
                    </div>

                    <!-- Delivery Status -->
                    <div class="delivery-card">
                        <div class="delivery-header">
                            <h3>Delivery Status</h3>
                            <a href="#" class="track-all-link">Track All</a>
                        </div>
                        <div class="delivery-list">
                            <?php foreach ($deliveries as $delivery): ?>
                            <div class="delivery-item">
                                <div class="delivery-info">
                                    <div class="delivery-id"><?= esc($delivery['id']) ?></div>
                                    <div class="delivery-location"><?= esc($delivery['location']) ?></div>
                                    <div class="delivery-status status-<?= strtolower(str_replace(' ', '-', $delivery['status'])) ?>">
                                        <?= esc($delivery['status']) ?>
                                    </div>
                                </div>
                                <div class="delivery-details">
                                    <div class="delivery-eta">ETA: <?= esc($delivery['eta']) ?></div>
                                    <div class="delivery-driver">Driver: <?= esc($delivery['driver']) ?></div>
                                    <div class="delivery-items"><?= esc($delivery['items']) ?> items</div>
                                </div>
                                <div class="delivery-progress">
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: <?= $delivery['progress'] ?>%"></div>
                                    </div>
                                    <div class="progress-text"><?= $delivery['progress'] ?>% Complete</div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Orders Trend Chart
        const ctx = document.getElementById('ordersChart').getContext('2d');
        const ordersChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Orders',
                    data: [45, 52, 48, 61, 55, 67],
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    tension: 0.4,
                    fill: true
                }, {
                    label: 'Revenue',
                    data: [25000, 30000, 28000, 35000, 32000, 42000],
                    borderColor: '#10b981',
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    tension: 0.4,
                    fill: true,
                    yAxisID: 'y1'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        type: 'linear',
                        display: true,
                        position: 'left',
                        max: 100
                    },
                    y1: {
                        type: 'linear',
                        display: false,
                        position: 'right',
                        max: 50000
                    }
                }
            }
        });

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
    </script>
</body>
</html>
