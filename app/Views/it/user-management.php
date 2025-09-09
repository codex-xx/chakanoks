<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'IT Administrator - User Management') ?></title>
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
                    <h1>User Management</h1>
                    <p>Manage user accounts and permissions</p>
                </div>

                <!-- KPI Cards -->
                <div class="kpi-grid">
                    <?php foreach ($kpis as $key => $kpi): ?>
                    <div class="kpi-card kpi-<?= $kpi['color'] ?>">
                        <div class="kpi-content">
                            <div class="kpi-value"><?= $kpi['value'] ?></div>
                            <div class="kpi-label"><?= ucfirst(str_replace('_', ' ', $key)) ?></div>
                        </div>
                        <div class="kpi-icon"><?= $kpi['icon'] ?></div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- User List Section -->
                <div class="user-list-section">
                    <div class="user-list-header">
                        <h2>User List</h2>
                        <div class="user-list-controls">
                            <div class="search-controls">
                                <div class="search-input">
                                    <input type="text" placeholder="Search users..." />
                                    <span class="search-icon">🔍</span>
                                </div>
                                <select class="role-filter">
                                    <?php foreach ($roles as $role): ?>
                                    <option value="<?= strtolower(str_replace(' ', '-', $role)) ?>"><?= $role ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button class="btn primary add-user-btn">
                                <span class="btn-icon">👤</span>
                                Add New User
                            </button>
                        </div>
                    </div>

                    <div class="user-table-container">
                        <table class="user-table">
                            <thead>
                                <tr>
                                    <th>USER</th>
                                    <th>ROLE</th>
                                    <th>BRANCH</th>
                                    <th>STATUS</th>
                                    <th>LAST LOGIN</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user): ?>
                                <tr>
                                    <td class="user-info">
                                        <div class="user-details">
                                            <div class="user-name"><?= esc($user['name']) ?></div>
                                            <div class="user-email"><?= esc($user['email']) ?></div>
                                        </div>
                                    </td>
                                    <td class="user-role"><?= esc($user['role']) ?></td>
                                    <td class="user-branch"><?= esc($user['branch']) ?></td>
                                    <td class="user-status">
                                        <span class="status-badge status-<?= $user['status_class'] ?>">
                                            <?= esc($user['status']) ?>
                                        </span>
                                    </td>
                                    <td class="user-login"><?= esc($user['last_login']) ?></td>
                                    <td class="user-actions">
                                        <button class="action-btn edit-btn" title="Edit User">
                                            <span>✏️</span>
                                        </button>
                                        <button class="action-btn pause-btn" title="Pause User">
                                            <span>⏸️</span>
                                        </button>
                                        <button class="action-btn delete-btn" title="Delete User">
                                            <span>🗑️</span>
                                        </button>
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
    </script>
</body>
</html>
