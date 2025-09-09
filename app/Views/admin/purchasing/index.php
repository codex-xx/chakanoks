<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
	<div class="h1">Purchasing Management</div>
	<div class="subtitle">Manage purchase orders, vendor relationships, and procurement processes</div>

	<div class="kpis">
		<div class="card kpi">
			<div class="badge warning">⏳</div>
			<div class="label">Pending Orders</div>
			<div class="value">18</div>
			<div class="delta">↓ 2 from yesterday</div>
		</div>
		<div class="card kpi">
			<div class="badge success">✓</div>
			<div class="label">Approved Today</div>
			<div class="value">7</div>
			<div class="delta positive">On track</div>
		</div>
		<div class="card kpi">
			<div class="badge info">💰</div>
			<div class="label">Monthly Spend</div>
			<div class="value">$45.2K</div>
			<div class="delta">↓ 8% vs last month</div>
		</div>
		<div class="card kpi">
			<div class="badge success">🤝</div>
			<div class="label">Active Vendors</div>
			<div class="value">23</div>
			<div class="delta">↑ 2 this month</div>
		</div>
	</div>

	<div class="card">
		<div class="section-title">Purchase Orders Overview</div>
		<div class="placeholder">Purchase order management interface will be implemented here</div>
	</div>
<?= $this->endSection() ?>

