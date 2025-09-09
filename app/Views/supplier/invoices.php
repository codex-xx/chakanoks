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
                
                <a class="menu-item active" href="<?= site_url('supplier/invoices') ?>" data-section="invoices">
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
                        <h2>Invoices</h2>
                        <p>Manage your invoices and payments</p>
                    </div>
                    <div class="header-actions">
                        <select class="filter-select">
                            <option value="all">All Invoices</option>
                            <option value="paid">Paid</option>
                            <option value="pending">Pending</option>
                            <option value="overdue">Overdue</option>
                            <option value="draft">Draft</option>
                        </select>
                        <button class="btn primary">Create Invoice</button>
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

                <!-- Invoices Section -->
                <div class="invoices-section">
                    <div class="section-header">
                        <h3>Invoices (<?= count($invoices) ?>)</h3>
                    </div>

                    <?php if ($msg = session()->getFlashdata('message')): ?>
                        <div class="alert alert-success">
                            <?= esc($msg) ?>
                        </div>
                    <?php endif; ?>

                    <div class="invoices-table-container">
                        <table class="invoices-table">
                            <thead>
                                <tr>
                                    <th>INVOICE ID</th>
                                    <th>ORDER ID</th>
                                    <th>BRANCH</th>
                                    <th>AMOUNT</th>
                                    <th>STATUS</th>
                                    <th>ISSUE DATE</th>
                                    <th>DUE DATE</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($invoices as $invoice): ?>
                                <tr class="invoice-row">
                                    <td>
                                        <a href="<?= site_url('supplier/invoices/view/' . $invoice['id']) ?>" class="invoice-link">
                                            <?= esc($invoice['id']) ?>
                                        </a>
                                    </td>
                                    <td><?= esc($invoice['order_id']) ?></td>
                                    <td><?= esc($invoice['branch']) ?></td>
                                    <td class="amount"><?= esc($invoice['amount']) ?></td>
                                    <td>
                                        <span class="status-badge status-<?= $invoice['status_class'] ?>">
                                            <?= esc($invoice['status']) ?>
                                        </span>
                                    </td>
                                    <td><?= esc($invoice['issue_date']) ?></td>
                                    <td><?= esc($invoice['due_date']) ?></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="action-btn" title="View" onclick="viewInvoice('<?= $invoice['id'] ?>')">
                                                <span class="icon">👁️</span>
                                            </button>
                                            <button class="action-btn" title="Download" onclick="downloadInvoice('<?= $invoice['id'] ?>')">
                                                <span class="icon">⬇️</span>
                                            </button>
                                            <button class="action-btn" title="Send" onclick="sendInvoice('<?= $invoice['id'] ?>')">
                                                <span class="icon">📤</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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
            const rows = document.querySelectorAll('.invoice-row');
            
            rows.forEach(row => {
                if (filter === 'all') {
                    row.style.display = 'table-row';
                } else {
                    const statusClass = row.querySelector('.status-badge').classList.contains('status-' + filter);
                    row.style.display = statusClass ? 'table-row' : 'none';
                }
            });
        });

        // Action button functions
        function viewInvoice(invoiceId) {
            window.location.href = '<?= site_url('supplier/invoices/view/') ?>' + invoiceId;
        }

        function downloadInvoice(invoiceId) {
            window.location.href = '<?= site_url('supplier/invoices/download/') ?>' + invoiceId;
        }

        function sendInvoice(invoiceId) {
            window.location.href = '<?= site_url('supplier/invoices/send/') ?>' + invoiceId;
        }
    </script>
</body>
</html>
