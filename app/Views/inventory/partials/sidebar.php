<aside class="sidebar">
	<div class="brand">
		<span class="dot"></span> 
		<span class="brand-text">CHAKANOKS</span>
	</div>
	
	<nav class="menu">
		<a class="menu-item <?= ($active ?? '') === 'inventory_dashboard' ? 'active' : '' ?>" 
		   href="<?= site_url('inventory/dashboard') ?>" 
		   data-section="inventory_dashboard">
			<span class="icon">🏠</span>
			<span class="label">Dashboard</span>
		</a>
		
		<a class="menu-item <?= ($active ?? '') === 'inventory' ? 'active' : '' ?>" 
		   href="<?= site_url('inventory/items') ?>" 
		   data-section="inventory">
			<span class="icon">📦</span>
			<span class="label">Items</span>
		</a>
	</nav>
</aside>

<script>
document.addEventListener('DOMContentLoaded', function() {
	const menuItems = document.querySelectorAll('.menu-item');
	menuItems.forEach(item => {
		item.addEventListener('click', function() {
			menuItems.forEach(mi => mi.classList.remove('active'));
			this.classList.add('active');
			const section = this.getAttribute('data-section');
			if (section) localStorage.setItem('inv_activeSection', section);
		});
		item.addEventListener('mouseenter', function() { this.style.transform = 'translateX(5px)'; });
		item.addEventListener('mouseleave', function() { this.style.transform = 'translateX(0)'; });
	});
	const activeSection = localStorage.getItem('inv_activeSection');
	if (activeSection) {
		const activeItem = document.querySelector(`[data-section="${activeSection}"]`);
		if (activeItem) activeItem.classList.add('active');
	}
});
</script>

