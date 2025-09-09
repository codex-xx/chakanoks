<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
	<div class="h1">Inventory Management</div>
	<div class="subtitle">Manage your inventory items, stock levels, and product information</div>

	<div class="kpis">
		<div class="card kpi">
			<div class="badge danger">⚠</div>
			<div class="label">Low Stock Items</div>
			<div class="value">24</div>
			<div class="delta danger">↑ 3 from yesterday</div>
		</div>
		<div class="card kpi">
			<div class="badge warning">📦</div>
			<div class="label">Total Products</div>
			<div class="value">1,247</div>
			<div class="delta">↑ 12 this week</div>
		</div>
		<div class="card kpi">
			<div class="badge success">✓</div>
			<div class="label">In Stock</div>
			<div class="value">1,089</div>
			<div class="delta positive">93% availability</div>
		</div>
		<div class="card kpi">
			<div class="badge info">ℹ</div>
			<div class="label">Categories</div>
			<div class="value">18</div>
			<div class="delta">Well organized</div>
		</div>
	</div>

	<div class="card">
		<div class="section-title">Inventory Overview</div>
		<div class="placeholder">Inventory management interface will be implemented here</div>
	</div>
<?= $this->endSection() ?>

