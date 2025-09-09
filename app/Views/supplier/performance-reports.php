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
                
                <a class="menu-item" href="<?= site_url('supplier/product-catalog') ?>" data-section="product-catalog">
                    <span class="icon">📦</span>
                    <span class="label">Product Catalog</span>
                </a>
                
                <a class="menu-item" href="<?= site_url('supplier/contracts') ?>" data-section="contracts">
                    <span class="icon">📝</span>
                    <span class="label">Contracts & Terms</span>
                </a>
                
                <a class="menu-item active" href="<?= site_url('supplier/performance-reports') ?>" data-section="performance-reports">
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
                        <h2>Performance Reports</h2>
                        <p>Track your supplier performance metrics and analytics.</p>
                    </div>
                    <div class="header-actions">
                        <select class="period-select" id="periodSelect">
                            <option value="monthly" <?= $report_period === 'monthly' ? 'selected' : '' ?>>Monthly</option>
                            <option value="quarterly" <?= $report_period === 'quarterly' ? 'selected' : '' ?>>Quarterly</option>
                            <option value="yearly" <?= $report_period === 'yearly' ? 'selected' : '' ?>>Yearly</option>
                        </select>
                        <button class="btn primary" onclick="generateReport()">Generate Report</button>
                    </div>
                </div>

                <!-- KPI Cards -->
                <div class="kpi-grid">
                    <?php foreach ($kpis as $key => $kpi): ?>
                    <div class="kpi-card kpi-<?= $kpi['color'] ?>">
                        <div class="kpi-icon"><?= $kpi['icon'] ?></div>
                        <div class="kpi-content">
                            <div class="kpi-value"><?= $kpi['value'] ?></div>
                            <div class="kpi-label"><?= $kpi['label'] ?></div>
                            <div class="kpi-target">Target: <?= $kpi['target'] ?></div>
                            <div class="kpi-change <?= strpos($kpi['change'], '+') === 0 ? 'positive' : 'negative' ?>">
                                <?= $kpi['change'] ?>
                            </div>
                        </div>
                        <div class="kpi-progress">
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: <?= $kpi['progress'] ?>%"></div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- Navigation Tabs -->
                <div class="performance-tabs">
                    <button class="tab-btn <?= $active_tab === 'overview' ? 'active' : '' ?>" data-tab="overview">
                        Overview
                    </button>
                    <button class="tab-btn <?= $active_tab === 'branch' ? 'active' : '' ?>" data-tab="branch">
                        Branch Performance
                    </button>
                    <button class="tab-btn <?= $active_tab === 'product' ? 'active' : '' ?>" data-tab="product">
                        Product Analysis
                    </button>
                </div>

                <!-- Overview Tab -->
                <div class="overview-section" id="overview-tab" style="<?= $active_tab === 'overview' ? 'display: block;' : 'display: none;' ?>">
                    <div class="overview-grid">
                        <!-- Monthly Performance Trend -->
                        <div class="trend-card">
                            <div class="card-header">
                                <h3>Monthly Performance Trend</h3>
                                <button class="btn secondary small" onclick="exportReport('trend')">Export</button>
                            </div>
                            <div class="trend-list">
                                <?php foreach ($monthly_trends as $trend): ?>
                                <div class="trend-item">
                                    <div class="trend-icon trend-<?= $trend['color'] ?>"><?= $trend['icon'] ?></div>
                                    <div class="trend-content">
                                        <div class="trend-metric"><?= $trend['metric'] ?></div>
                                        <div class="trend-change positive"><?= $trend['change'] ?></div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Key Metrics Summary -->
                        <div class="metrics-card">
                            <div class="card-header">
                                <h3>Key Metrics Summary</h3>
                                <button class="btn secondary small" onclick="exportReport('metrics')">Export</button>
                            </div>
                            <div class="metrics-list">
                                <?php foreach ($key_metrics as $metric): ?>
                                <div class="metric-item">
                                    <div class="metric-icon metric-<?= $metric['color'] ?>"><?= $metric['icon'] ?></div>
                                    <div class="metric-content">
                                        <div class="metric-value"><?= $metric['value'] ?></div>
                                        <div class="metric-label"><?= $metric['label'] ?></div>
                                    </div>
                                    <div class="metric-bar">
                                        <div class="bar-fill bar-<?= $metric['color'] ?>" style="height: <?= $metric['bar_height'] ?>%"></div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Branch Performance Tab -->
                <div class="branch-section" id="branch-tab" style="<?= $active_tab === 'branch' ? 'display: block;' : 'display: none;' ?>">
                    <div class="section-header">
                        <h3>Branch Performance Analysis</h3>
                    </div>
                    <div class="branch-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Branch</th>
                                    <th>Orders</th>
                                    <th>Fulfillment</th>
                                    <th>Delivery</th>
                                    <th>Quality</th>
                                    <th>Satisfaction</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($branch_performance as $branch): ?>
                                <tr>
                                    <td class="branch-name"><?= esc($branch['branch']) ?></td>
                                    <td><?= $branch['orders'] ?></td>
                                    <td>
                                        <div class="metric-cell">
                                            <span class="metric-value"><?= $branch['fulfillment'] ?>%</span>
                                            <div class="metric-bar-small">
                                                <div class="bar-fill bar-blue" style="width: <?= $branch['fulfillment'] ?>%"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="metric-cell">
                                            <span class="metric-value"><?= $branch['delivery'] ?>%</span>
                                            <div class="metric-bar-small">
                                                <div class="bar-fill bar-green" style="width: <?= $branch['delivery'] ?>%"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="metric-cell">
                                            <span class="metric-value"><?= $branch['quality'] ?>%</span>
                                            <div class="metric-bar-small">
                                                <div class="bar-fill bar-purple" style="width: <?= $branch['quality'] ?>%"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="metric-cell">
                                            <span class="metric-value"><?= $branch['satisfaction'] ?>/5</span>
                                            <div class="metric-bar-small">
                                                <div class="bar-fill bar-orange" style="width: <?= ($branch['satisfaction'] / 5) * 100 ?>%"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Product Analysis Tab -->
                <div class="product-section" id="product-tab" style="<?= $active_tab === 'product' ? 'display: block;' : 'display: none;' ?>">
                    <div class="section-header">
                        <h3>Product Performance Analysis</h3>
                    </div>
                    <div class="product-grid">
                        <?php foreach ($product_analysis as $product): ?>
                        <div class="product-card">
                            <div class="product-header">
                                <h4><?= esc($product['product']) ?></h4>
                                <div class="product-rating"><?= $product['rating'] ?>/5 ⭐</div>
                            </div>
                            <div class="product-metrics">
                                <div class="product-metric">
                                    <span class="metric-label">Orders:</span>
                                    <span class="metric-value"><?= $product['orders'] ?></span>
                                </div>
                                <div class="product-metric">
                                    <span class="metric-label">Revenue:</span>
                                    <span class="metric-value">$<?= number_format($product['revenue']) ?></span>
                                </div>
                                <div class="product-metric">
                                    <span class="metric-label">Growth:</span>
                                    <span class="metric-value positive"><?= $product['growth'] ?></span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Quick Report Actions -->
                <div class="quick-actions">
                    <div class="section-header">
                        <h3>Quick Report Actions</h3>
                    </div>
                    <div class="actions-grid">
                        <?php foreach ($quick_actions as $action): ?>
                        <button class="action-card action-<?= $action['color'] ?>" onclick="handleAction('<?= $action['action'] ?>')">
                            <div class="action-icon"><?= $action['icon'] ?></div>
                            <div class="action-title"><?= $action['title'] ?></div>
                        </button>
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
                document.getElementById('overview-tab').style.display = tab === 'overview' ? 'block' : 'none';
                document.getElementById('branch-tab').style.display = tab === 'branch' ? 'block' : 'none';
                document.getElementById('product-tab').style.display = tab === 'product' ? 'block' : 'none';
                
                // Update URL without page reload
                const url = new URL(window.location);
                url.searchParams.set('tab', tab);
                window.history.pushState({}, '', url);
            });
        });

        // Period select change
        document.getElementById('periodSelect').addEventListener('change', function() {
            const period = this.value;
            const url = new URL(window.location);
            url.searchParams.set('period', period);
            window.location.href = url.toString();
        });

        // Action functions
        function generateReport() {
            window.location.href = '<?= site_url('supplier/performance-reports/generate') ?>';
        }

        function exportReport(type) {
            window.location.href = '<?= site_url('supplier/performance-reports/export') ?>/' + type;
        }

        function handleAction(action) {
            window.location.href = '<?= site_url('supplier/performance-reports') ?>/' + action;
        }
    </script>
</body>
</html>
