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
                
                <a class="menu-item active" href="<?= site_url('supplier/contracts') ?>" data-section="contracts">
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
                        <h2>Contracts & Terms</h2>
                        <p>Manage your supplier contracts and business terms.</p>
                    </div>
                    <div class="header-actions contracts-header-actions">
                        <button class="btn secondary">Export All</button>
                        <button class="btn primary" onclick="createContract()">New Contract</button>
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
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- Navigation Tabs -->
                <div class="contracts-tabs">
                    <button class="tab-btn <?= $active_tab === 'contracts' ? 'active' : '' ?>" data-tab="contracts">
                        Contracts
                    </button>
                    <button class="tab-btn <?= $active_tab === 'terms' ? 'active' : '' ?>" data-tab="terms">
                        Terms & Policies
                    </button>
                </div>

                <!-- Contracts Section -->
                <div class="contracts-section" id="contracts-tab" style="<?= $active_tab === 'contracts' ? 'display: block;' : 'display: none;' ?>">
                    <div class="section-header">
                        <h3>Active Contracts (<?= count($contracts) ?>)</h3>
                    </div>

                    <?php if ($msg = session()->getFlashdata('message')): ?>
                        <div class="alert alert-success">
                            <?= esc($msg) ?>
                        </div>
                    <?php endif; ?>

                    <div class="contracts-list">
                        <?php foreach ($contracts as $contract): ?>
                        <div class="contract-card">
                            <div class="contract-header">
                                <div class="contract-info">
                                    <div class="contract-name"><?= esc($contract['name']) ?></div>
                                    <div class="contract-id">Contract ID: <?= esc($contract['id']) ?></div>
                                </div>
                                <div class="contract-status">
                                    <span class="status-badge status-<?= $contract['status_class'] ?>">
                                        <?= esc($contract['status']) ?>
                                    </span>
                                </div>
                            </div>
                            
                            <div class="contract-details">
                                <div class="detail-grid">
                                    <div class="detail-item">
                                        <div class="detail-label">Branch:</div>
                                        <div class="detail-value"><?= esc($contract['branch']) ?></div>
                                    </div>
                                    <div class="detail-item">
                                        <div class="detail-label">Start Date:</div>
                                        <div class="detail-value"><?= esc($contract['start_date']) ?></div>
                                    </div>
                                    <div class="detail-item">
                                        <div class="detail-label">End Date:</div>
                                        <div class="detail-value"><?= esc($contract['end_date']) ?></div>
                                    </div>
                                    <div class="detail-item">
                                        <div class="detail-label">Auto Renewal:</div>
                                        <div class="detail-value"><?= esc($contract['auto_renewal']) ?></div>
                                    </div>
                                    <div class="detail-item">
                                        <div class="detail-label">Value:</div>
                                        <div class="detail-value price"><?= esc($contract['value']) ?></div>
                                    </div>
                                </div>
                                
                                <div class="contract-products">
                                    <div class="products-label">Associated Products:</div>
                                    <div class="products-list">
                                        <?php foreach ($contract['products'] as $product): ?>
                                        <span class="product-tag"><?= esc($product) ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="contract-actions">
                                <a href="<?= site_url('supplier/contracts/view/' . $contract['id']) ?>" class="action-link view">View Details</a>
                                <a href="<?= site_url('supplier/contracts/download/' . $contract['id']) ?>" class="action-link download">Download</a>
                                <?php if ($contract['status_class'] === 'pending-renewal'): ?>
                                <a href="<?= site_url('supplier/contracts/renew/' . $contract['id']) ?>" class="action-link renew">Renew Contract</a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Terms & Policies Section -->
                <div class="terms-section" id="terms-tab" style="<?= $active_tab === 'terms' ? 'display: block;' : 'display: none;' ?>">
                    <div class="section-header">
                        <h3>Terms & Policies (<?= count($terms_policies) ?>)</h3>
                    </div>

                    <div class="terms-list">
                        <?php foreach ($terms_policies as $term): ?>
                        <div class="term-card">
                            <div class="term-header">
                                <div class="term-title"><?= esc($term['title']) ?></div>
                                <div class="term-type"><?= esc($term['type']) ?></div>
                            </div>
                            <div class="term-description">
                                <?= esc($term['description']) ?>
                            </div>
                            <div class="term-status">
                                <span class="status-badge status-active"><?= esc($term['status']) ?></span>
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
                document.getElementById('contracts-tab').style.display = tab === 'contracts' ? 'block' : 'none';
                document.getElementById('terms-tab').style.display = tab === 'terms' ? 'block' : 'none';
                
                // Update URL without page reload
                const url = new URL(window.location);
                url.searchParams.set('tab', tab);
                window.history.pushState({}, '', url);
            });
        });

        // Action functions
        function createContract() {
            window.location.href = '<?= site_url('supplier/contracts/create') ?>';
        }
    </script>
</body>
</html>
