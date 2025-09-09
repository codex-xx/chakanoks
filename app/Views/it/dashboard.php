<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'SCMS IT Administrator Dashboard') ?></title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('public/favicon.ico') ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/css/it-admin.css?v=' . time()) ?>">
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
                <a class="menu-item" href="<?= site_url('it/dashboard') ?>" data-section="dashboard">
                    <span class="icon">⊞</span>
                    <span class="label">Dashboard Overview</span>
                </a>
                
                <a class="menu-item" href="<?= site_url('it/user-management') ?>" data-section="user-management">
                    <span class="icon">👥</span>
                    <span class="label">User Management</span>
                </a>
                
                <a class="menu-item" href="#" data-section="system-security">
                    <span class="icon">🛡️</span>
                    <span class="label">System Security</span>
                </a>
                
                <a class="menu-item" href="#" data-section="database-backup">
                    <span class="icon">🗄️</span>
                    <span class="label">Database Backup</span>
                </a>
                
                <a class="menu-item" href="<?= site_url('it/system-logs') ?>" data-section="system-logs">
                    <span class="icon">📋</span>
                    <span class="label">System Logs</span>
                </a>
                
                <a class="menu-item" href="#" data-section="performance-monitor">
                    <span class="icon">⏱️</span>
                    <span class="label">Performance Monitor</span>
                </a>
                
                <a class="menu-item" href="#" data-section="system-settings">
                    <span class="icon">⚙️</span>
                    <span class="label">System Settings</span>
                </a>
            </nav>

            <!-- System Status -->
            <div class="system-status">
                <div class="status-indicator">
                    <span class="status-dot online"></span>
                    <span class="status-text">All systems operational</span>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <section class="main">
            <!-- Header -->
            <div class="topbar">
                <div class="search">
                    <input type="text" placeholder="Search users, logs, system status…" />
                </div>
                <div class="userbox" id="userbox">
                    <span class="top-icon">🔔</span>
                    <button class="profile-toggle" id="profileToggle" type="button" aria-haspopup="menu" aria-expanded="false">
                        <img class="avatar" src="<?= base_url('public/assets/images/icon.jpg') ?>" alt="Profile">
                        <div class="info">
                            <div class="name"><?= esc($company_name) ?></div>
                            <div class="role">IT Administrator</div>
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
                <div class="page-header">
                    <h1>IT Administrator Dashboard</h1>
                    <p>Manage system operations and security</p>
                </div>
                
                <!-- KPI Cards -->
                <div class="kpi-grid">
                    <?php foreach ($kpis as $key => $kpi): ?>
                    <div class="kpi-card kpi-<?= $kpi['color'] ?>">
                        <div class="kpi-content">
                            <div class="kpi-value"><?= $kpi['value'] ?></div>
                            <div class="kpi-label"><?= $kpi['label'] ?></div>
                            <div class="kpi-change"><?= $kpi['change'] ?></div>
                        </div>
                        <div class="kpi-icon">
                            <span class="icon"><?= $kpi['icon'] ?></span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- Charts and Data Section -->
                <div class="dashboard-grid">
                    <!-- System Activity Chart -->
                    <div class="chart-card">
                        <div class="chart-header">
                            <h3>System Activity</h3>
                        </div>
                        <div class="chart-container">
                            <canvas id="systemActivityChart" width="400" height="200"></canvas>
                        </div>
                    </div>

                    <!-- Branch Status -->
                    <div class="branch-card">
                        <div class="branch-header">
                            <h3>Branch Status</h3>
                        </div>
                        <div class="branch-list">
                            <?php foreach ($branches as $branch): ?>
                            <div class="branch-item">
                                <div class="branch-info">
                                    <div class="branch-name"><?= esc($branch['name']) ?></div>
                                    <div class="branch-users"><?= esc($branch['active_users']) ?></div>
                                </div>
                                <div class="branch-status">
                                    <span class="status-dot <?= $branch['status_class'] ?>"></span>
                                    <div class="status-details">
                                        <div class="status-text"><?= esc($branch['status']) ?></div>
                                        <div class="status-time"><?= esc($branch['last_seen']) ?></div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Recent System Alerts -->
                <div class="alerts-section">
                    <div class="alerts-card">
                        <div class="alerts-header">
                            <h3>Recent System Alerts</h3>
                        </div>
                        <div class="alerts-list">
                            <?php foreach ($system_alerts as $alert): ?>
                            <div class="alert-item">
                                <span class="alert-dot alert-<?= $alert['color'] ?>"></span>
                                <div class="alert-content">
                                    <div class="alert-message"><?= esc($alert['message']) ?></div>
                                    <div class="alert-timestamp"><?= esc($alert['timestamp']) ?></div>
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
        // System Activity Chart
        const ctx = document.getElementById('systemActivityChart').getContext('2d');
        const systemActivityChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?= json_encode($system_activity['labels']) ?>,
                datasets: [{
                    label: 'System Load',
                    data: <?= json_encode($system_activity['data']) ?>,
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    tension: 0.4,
                    fill: true
                }, {
                    label: 'User Activity',
                    data: <?= json_encode($system_activity['data2']) ?>,
                    borderColor: '#10b981',
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    tension: 0.4,
                    fill: true
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
                        beginAtZero: true,
                        max: 2200,
                        ticks: {
                            stepSize: 550
                        }
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
        document.addEventListener('DOMContentLoaded', function() {
            const menuItems = document.querySelectorAll('.menu-item');
            
            menuItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    // Only handle active state if it's not a real link
                    if (this.getAttribute('href') === '#') {
                        e.preventDefault();
                        menuItems.forEach(menuItem => menuItem.classList.remove('active'));
                        this.classList.add('active');
                    }
                });
            });
            
            // Set active state based on current page
            const currentPath = window.location.pathname;
            
            // Remove all active classes first
            menuItems.forEach(item => item.classList.remove('active'));
            
            // Set active based on current page
            if (currentPath.includes('user-management')) {
                const userManagementItem = document.querySelector('[data-section="user-management"]');
                if (userManagementItem) {
                    userManagementItem.classList.add('active');
                }
            } else if (currentPath.includes('system-security')) {
                const systemSecurityItem = document.querySelector('[data-section="system-security"]');
                if (systemSecurityItem) {
                    systemSecurityItem.classList.add('active');
                }
            } else if (currentPath.includes('system-logs')) {
                const systemLogsItem = document.querySelector('[data-section="system-logs"]');
                if (systemLogsItem) {
                    systemLogsItem.classList.add('active');
                }
            } else if (currentPath.includes('dashboard') || currentPath === '/it/dashboard' || currentPath === '/it/dashboard/') {
                const dashboardItem = document.querySelector('[data-section="dashboard"]');
                if (dashboardItem) {
                    dashboardItem.classList.add('active');
                }
            }
        });
    </script>
</body>
</html>
