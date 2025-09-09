<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'IT Administrator - System Logs') ?></title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('public/assets/images/favicon.ico') ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/css/it-admin.css') ?>">
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
                
                <a class="menu-item" href="#" data-section="settings">
                    <span class="icon">⚙️</span>
                    <span class="label">System Settings</span>
                </a>
            </nav>
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
                            <div class="name">IT Administrator</div>
                            <div class="role">System Admin</div>
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
                    <h1>System Logs</h1>
                    <p>Monitor system activities and troubleshoot issues</p>
                </div>

                <!-- Log Stats KPI Cards -->
                <div class="kpi-grid">
                    <?php foreach ($log_stats as $key => $stat): ?>
                    <div class="kpi-card kpi-<?= $stat['color'] ?>">
                        <div class="kpi-content">
                            <div class="kpi-value"><?= $stat['value'] ?></div>
                            <div class="kpi-label"><?= ucfirst(str_replace('_', ' ', $key)) ?></div>
                        </div>
                        <div class="kpi-icon"><?= $stat['icon'] ?></div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- Log Filters and Controls -->
                <div class="logs-section">
                    <div class="logs-header">
                        <h2>System Logs</h2>
                        <div class="logs-controls">
                            <div class="log-filters">
                                <select class="log-filter" id="levelFilter">
                                    <?php foreach ($log_filters['levels'] as $level): ?>
                                    <option value="<?= strtolower($level) ?>"><?= $level ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <select class="log-filter" id="sourceFilter">
                                    <?php foreach ($log_filters['sources'] as $source): ?>
                                    <option value="<?= strtolower(str_replace(' ', '-', $source)) ?>"><?= $source ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <select class="log-filter" id="timeFilter">
                                    <?php foreach ($log_filters['time_ranges'] as $time): ?>
                                    <option value="<?= strtolower(str_replace(' ', '-', $time)) ?>"><?= $time ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="log-actions">
                                <button class="btn secondary" id="refreshLogs">
                                    <span class="btn-icon">🔄</span>
                                    Refresh
                                </button>
                                <button class="btn secondary" id="exportLogs">
                                    <span class="btn-icon">📥</span>
                                    Export
                                </button>
                                <button class="btn primary" id="clearLogs">
                                    <span class="btn-icon">🗑️</span>
                                    Clear Logs
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Logs Table -->
                    <div class="logs-table-container">
                        <table class="logs-table">
                            <thead>
                                <tr>
                                    <th>TIMESTAMP</th>
                                    <th>LEVEL</th>
                                    <th>MESSAGE</th>
                                    <th>SOURCE</th>
                                    <th>USER ID</th>
                                    <th>IP ADDRESS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recent_logs as $log): ?>
                                <tr class="log-row log-<?= $log['level_class'] ?>">
                                    <td class="log-timestamp"><?= esc($log['timestamp']) ?></td>
                                    <td class="log-level">
                                        <span class="level-badge level-<?= $log['level_class'] ?>">
                                            <?= esc($log['level']) ?>
                                        </span>
                                    </td>
                                    <td class="log-message"><?= esc($log['message']) ?></td>
                                    <td class="log-source"><?= esc($log['source']) ?></td>
                                    <td class="log-user"><?= esc($log['user_id']) ?></td>
                                    <td class="log-ip"><?= esc($log['ip_address']) ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="logs-pagination">
                        <div class="pagination-info">
                            Showing 1-10 of 12,847 logs
                        </div>
                        <div class="pagination-controls">
                            <button class="pagination-btn" disabled>Previous</button>
                            <button class="pagination-btn active">1</button>
                            <button class="pagination-btn">2</button>
                            <button class="pagination-btn">3</button>
                            <span class="pagination-ellipsis">...</span>
                            <button class="pagination-btn">1,285</button>
                            <button class="pagination-btn">Next</button>
                        </div>
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
        document.addEventListener('DOMContentLoaded', function() {
            const menuItems = document.querySelectorAll('.menu-item');
            
            menuItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    // Only handle active state if it's not a real link
                    if (this.getAttribute('href') === '#') {
                        e.preventDefault();
                        menuItems.forEach(menuItem => menuItem.classList.remove('active'));
                        this.classList.add('active');
                        
                        const section = this.getAttribute('data-section');
                        if (section) {
                            localStorage.setItem('activeSection', section);
                        }
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
            } else if (currentPath.includes('dashboard')) {
                const dashboardItem = document.querySelector('[data-section="dashboard"]');
                if (dashboardItem) {
                    dashboardItem.classList.add('active');
                }
            }
        });

        // Log filtering functionality
        document.addEventListener('DOMContentLoaded', function() {
            const levelFilter = document.getElementById('levelFilter');
            const sourceFilter = document.getElementById('sourceFilter');
            const timeFilter = document.getElementById('timeFilter');
            const logRows = document.querySelectorAll('.log-row');

            function filterLogs() {
                const selectedLevel = levelFilter.value;
                const selectedSource = sourceFilter.value;
                const selectedTime = timeFilter.value;

                logRows.forEach(row => {
                    let showRow = true;

                    // Filter by level
                    if (selectedLevel !== 'all levels') {
                        const rowLevel = row.querySelector('.level-badge').textContent.toLowerCase();
                        if (rowLevel !== selectedLevel) {
                            showRow = false;
                        }
                    }

                    // Filter by source
                    if (selectedSource !== 'all sources') {
                        const rowSource = row.querySelector('.log-source').textContent.toLowerCase().replace(/\s+/g, '-');
                        if (rowSource !== selectedSource) {
                            showRow = false;
                        }
                    }

                    row.style.display = showRow ? 'table-row' : 'none';
                });
            }

            levelFilter.addEventListener('change', filterLogs);
            sourceFilter.addEventListener('change', filterLogs);
            timeFilter.addEventListener('change', filterLogs);

            // Action buttons
            document.getElementById('refreshLogs').addEventListener('click', function() {
                showNotification('Logs refreshed successfully', 'success');
                // Here you would typically reload the logs from server
            });

            document.getElementById('exportLogs').addEventListener('click', function() {
                showNotification('Exporting logs...', 'info');
                // Here you would typically trigger log export
            });

            document.getElementById('clearLogs').addEventListener('click', function() {
                if (confirm('Are you sure you want to clear all logs? This action cannot be undone.')) {
                    showNotification('Logs cleared successfully', 'success');
                    // Here you would typically clear logs from server
                }
            });
        });

        // Notification function
        function showNotification(message, type) {
            const notification = document.createElement('div');
            notification.className = `notification notification-${type}`;
            notification.textContent = message;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.classList.add('show');
            }, 100);
            
            setTimeout(() => {
                notification.classList.remove('show');
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }
    </script>
</body>
</html>
