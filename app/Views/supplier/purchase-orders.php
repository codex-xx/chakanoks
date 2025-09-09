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
                
                <a class="menu-item active" href="<?= site_url('supplier/purchase-orders') ?>" data-section="purchase-orders">
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
                        <h2>Purchase Orders</h2>
                        <p>Manage incoming purchase requests from branches</p>
                    </div>
                    <div class="header-actions">
                        <select class="filter-select">
                            <option value="all">All Orders</option>
                            <option value="processing">Processing</option>
                            <option value="quoted">Quoted</option>
                            <option value="confirmed">Confirmed</option>
                        </select>
                        <button class="btn primary">Create Quote</button>
                    </div>
                </div>

                <!-- Recent Orders Section -->
                <div class="orders-section">
                    <div class="section-header">
                        <h3>Recent Orders (<?= count($orders) ?>)</h3>
                    </div>

                    <?php if ($msg = session()->getFlashdata('message')): ?>
                        <div class="alert alert-success">
                            <?= esc($msg) ?>
                        </div>
                    <?php endif; ?>

                    <div class="orders-list">
                        <?php foreach ($orders as $order): ?>
                        <div class="order-card">
                            <div class="order-icon">
                                <div class="icon-bg">
                                    <span class="icon">📄</span>
                                </div>
                            </div>
                            
                            <div class="order-main">
                                <div class="order-header">
                                    <div class="order-id"><?= esc($order['id']) ?></div>
                                    <div class="order-branch"><?= esc($order['branch']) ?></div>
                                </div>
                                
                                <div class="order-dates">
                                    <div class="date-item">
                                        <span class="date-label">Request Date:</span>
                                        <span class="date-value"><?= esc($order['request_date']) ?></span>
                                    </div>
                                    <div class="date-item">
                                        <span class="date-label">Required Date:</span>
                                        <span class="date-value"><?= esc($order['required_date']) ?></span>
                                    </div>
                                </div>
                                
                                <div class="order-actions">
                                    <a href="<?= site_url('supplier/purchase-orders/view/' . $order['id']) ?>" class="action-link view">View Details</a>
                                    <a href="<?= site_url('supplier/purchase-orders/quote/' . $order['id']) ?>" class="action-link quote">Send Quote</a>
                                    <a href="<?= site_url('supplier/purchase-orders/confirm/' . $order['id']) ?>" class="action-link confirm">Confirm Order</a>
                                </div>
                            </div>
                            
                            <div class="order-sidebar">
                                <div class="contact-info">
                                    <div class="contact-label">Contact Person:</div>
                                    <div class="contact-name"><?= esc($order['contact_person']) ?></div>
                                </div>
                                
                                <div class="order-status">
                                    <span class="status-badge status-<?= $order['status_class'] ?>"><?= esc($order['status']) ?></span>
                                </div>
                                
                                <div class="order-amount">
                                    <div class="amount-value"><?= esc($order['amount']) ?></div>
                                </div>
                                
                                <div class="order-tools">
                                    <button class="tool-btn" title="Download">
                                        <span class="icon">⬇️</span>
                                    </button>
                                    <button class="tool-btn" title="Call">
                                        <span class="icon">📞</span>
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

        // Filter functionality
        document.querySelector('.filter-select').addEventListener('change', function() {
            const filter = this.value;
            const orderCards = document.querySelectorAll('.order-card');
            
            orderCards.forEach(card => {
                if (filter === 'all') {
                    card.style.display = 'flex';
                } else {
                    const statusClass = card.querySelector('.status-badge').classList.contains('status-' + filter);
                    card.style.display = statusClass ? 'flex' : 'none';
                }
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
