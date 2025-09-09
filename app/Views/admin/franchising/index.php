<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
	<div class="h1">Franchising Management</div>
	<div class="subtitle">Manage franchise operations, performance metrics, and expansion opportunities</div>

	<div class="kpis">
		<div class="card kpi">
			<div class="badge success">🏬</div>
			<div class="label">Active Franchises</div>
			<div class="value">156</div>
			<div class="delta positive">↑ 5 this month</div>
		</div>
		<div class="card kpi">
			<div class="badge warning">📈</div>
			<div class="label">Revenue Growth</div>
			<div class="value">+12.5%</div>
			<div class="delta">↑ 2.3% vs last month</div>
		</div>
		<div class="card kpi">
			<div class="badge info">⭐</div>
			<div class="label">Top Performers</div>
			<div class="value">23</div>
			<div class="delta">Exceeding targets</div>
		</div>
		<div class="card kpi">
			<div class="badge success">🎯</div>
			<div class="label">Target Met</div>
			<div class="value">89%</div>
			<div class="delta positive">On track</div>
		</div>
	</div>

	<div class="grid-2" style="margin-top:16px;">
		<div class="card">
			<div class="section-title">Franchise Performance Overview</div>
			<div class="chart">Performance Chart Placeholder</div>
		</div>
		<div class="card">
			<div class="section-title">Recent Franchise Activities</div>
			<div class="list">
				<div class="activity"><span>New franchise opened</span><span class="muted">2h ago</span></div>
				<div class="activity"><span>Performance review completed</span><span class="muted">4h ago</span></div>
				<div class="activity"><span>Training session scheduled</span><span class="muted">1d ago</span></div>
			</div>
		</div>
	</div>
<?= $this->endSection() ?>

