<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
	<div class="h1">Logistics Management</div>
	<div class="subtitle">Track shipments, manage delivery routes, and monitor logistics performance</div>

	<div class="kpis">
		<div class="card kpi">
			<div class="badge success">🚚</div>
			<div class="label">Active Deliveries</div>
			<div class="value">12</div>
			<div class="delta positive">On schedule</div>
		</div>
		<div class="card kpi">
			<div class="badge warning">⏳</div>
			<div class="label">In Transit</div>
			<div class="value">8</div>
			<div class="delta">2 delayed</div>
		</div>
		<div class="card kpi">
			<div class="badge success">✅</div>
			<div class="label">Completed Today</div>
			<div class="value">15</div>
			<div class="delta positive">100% success rate</div>
		</div>
		<div class="card kpi">
			<div class="badge info">📍</div>
			<div class="label">Active Routes</div>
			<div class="value">6</div>
			<div class="delta">Optimized</div>
		</div>
	</div>

	<div class="card">
		<div class="section-title">Delivery Map & Tracking</div>
		<div class="placeholder">Logistics tracking interface will be implemented here</div>
	</div>
<?= $this->endSection() ?>

