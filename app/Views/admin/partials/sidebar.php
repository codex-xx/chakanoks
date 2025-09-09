<aside class="sidebar">
	<div class="brand">
		<span class="dot"></span> 
		<span class="brand-text">CHAKANOKS</span>
	</div>
	
	<nav class="menu">
		<a class="menu-item <?= ($active ?? '') === 'dashboard' ? 'active' : '' ?>" 
		   href="<?= site_url('admin/dashboard') ?>" 
		   data-section="dashboard">
			<span class="icon">🏠</span>
			<span class="label">Dashboard</span>
		</a>
		
		<a class="menu-item <?= ($active ?? '') === 'inventory' ? 'active' : '' ?>" 
		   href="<?= site_url('admin/inventory') ?>" 
		   data-section="inventory">
			<span class="icon">📦</span>
			<span class="label">Inventory</span>
		</a>
		
		<a class="menu-item <?= ($active ?? '') === 'purchasing' ? 'active' : '' ?>" 
		   href="<?= site_url('admin/purchasing') ?>" 
		   data-section="purchasing">
			<span class="icon">🧾</span>
			<span class="label">Purchasing</span>
		</a>
		
		<a class="menu-item <?= ($active ?? '') === 'suppliers' ? 'active' : '' ?>" 
		   href="<?= site_url('admin/suppliers') ?>" 
		   data-section="suppliers">
			<span class="icon">🤝</span>
			<span class="label">Suppliers</span>
		</a>
		
		<a class="menu-item <?= ($active ?? '') === 'logistics' ? 'active' : '' ?>" 
		   href="<?= site_url('admin/logistics') ?>" 
		   data-section="logistics">
			<span class="icon">🚚</span>
			<span class="label">Logistics</span>
		</a>
		
		<a class="menu-item <?= ($active ?? '') === 'franchising' ? 'active' : '' ?>" 
		   href="<?= site_url('admin/franchising') ?>" 
		   data-section="franchising">
			<span class="icon">🏬</span>
			<span class="label">Franchising</span>
		</a>
		
		<a class="menu-item <?= ($active ?? '') === 'reports' ? 'active' : '' ?>" 
		   href="<?= site_url('admin/reports') ?>" 
		   data-section="reports">
			<span class="icon">📊</span>
			<span class="label">Reports</span>
		</a>
		
		<div class="spacer"></div>
		
		<a class="menu-item <?= ($active ?? '') === 'users' ? 'active' : '' ?>" 
		   href="<?= site_url('admin/users') ?>" 
		   data-section="users">
			<span class="icon">👤</span>
			<span class="label">User Management</span>
		</a>
		
		<a class="menu-item <?= ($active ?? '') === 'settings' ? 'active' : '' ?>" 
		   href="<?= site_url('admin/settings') ?>" 
		   data-section="settings">
			<span class="icon">⚙️</span>
			<span class="label">Settings</span>
		</a>
	</nav>
</aside>

<script>
document.addEventListener('DOMContentLoaded', function() {
	// Get all menu items
	const menuItems = document.querySelectorAll('.menu-item');
	
	// Add click event listeners
	menuItems.forEach(item => {
		item.addEventListener('click', function(e) {
			// Remove active class from all items
			menuItems.forEach(menuItem => menuItem.classList.remove('active'));
			
			// Add active class to clicked item
			this.classList.add('active');
			
			// Store active section in localStorage for persistence
			const section = this.getAttribute('data-section');
			if (section) {
				localStorage.setItem('activeSection', section);
			}
		});
		
		// Add hover effects
		item.addEventListener('mouseenter', function() {
			this.style.transform = 'translateX(5px)';
		});
		
		item.addEventListener('mouseleave', function() {
			this.style.transform = 'translateX(0)';
		});
	});
	
	// Restore active state from localStorage
	const activeSection = localStorage.getItem('activeSection');
	if (activeSection) {
		const activeItem = document.querySelector(`[data-section="${activeSection}"]`);
		if (activeItem) {
			activeItem.classList.add('active');
		}
	}
});
</script>


