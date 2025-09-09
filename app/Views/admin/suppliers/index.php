<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
	<div class="h1">Supplier Management</div>
	<div class="subtitle">Manage supplier relationships, performance metrics, and vendor information</div>

	<div class="kpis">
		<div class="card kpi">
			<div class="badge success">🤝</div>
			<div class="label">Active Suppliers</div>
			<div class="value">23</div>
			<div class="delta">↑ 2 this month</div>
		</div>
		<div class="card kpi">
			<div class="badge success">⭐</div>
			<div class="label">Excellent Rating</div>
			<div class="value">8</div>
			<div class="delta positive">Top performers</div>
		</div>
		<div class="card kpi">
			<div class="badge warning">⚠</div>
			<div class="label">Needs Attention</div>
			<div class="value">3</div>
			<div class="delta">↓ 1 from last week</div>
		</div>
		<div class="card kpi">
			<div class="badge info">📊</div>
			<div class="label">Avg. Performance</div>
			<div class="value">4.2/5</div>
			<div class="delta">↑ 0.3 this month</div>
		</div>
	</div>

	<div class="grid-2" style="margin-top:16px;">
		<div class="card">
			<div class="section-title">Supplier Performance Overview</div>
			<div class="chart">Performance Chart Placeholder</div>
		</div>
		<div class="card">
			<div class="section-title">Recent Supplier Activities</div>
			<div class="list">
				<div class="activity"><span>New supplier onboarded</span><span class="muted">1h ago</span></div>
				<div class="activity"><span>Performance review completed</span><span class="muted">3h ago</span></div>
				<div class="activity"><span>Contract renewed</span><span class="muted">1d ago</span></div>
			</div>
		</div>
	</div>
<?= $this->endSection() ?>

