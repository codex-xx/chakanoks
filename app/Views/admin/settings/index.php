<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
	<div class="h1">System Settings</div>
	<div class="subtitle">Configure system preferences, security settings, and application parameters</div>

	<div class="kpis">
		<div class="card kpi">
			<div class="badge success">⚙️</div>
			<div class="label">System Status</div>
			<div class="value">Online</div>
			<div class="delta positive">All systems operational</div>
		</div>
		<div class="card kpi">
			<div class="badge info">🔒</div>
			<div class="label">Security Level</div>
			<div class="value">High</div>
			<div class="delta">Enhanced protection</div>
		</div>
		<div class="card kpi">
			<div class="badge success">📊</div>
			<div class="label">Data Backup</div>
			<div class="value">24h ago</div>
			<div class="delta positive">Up to date</div>
		</div>
		<div class="card kpi">
			<div class="badge warning">👥</div>
			<div class="label">Active Users</div>
			<div class="value">23</div>
			<div class="delta">Currently online</div>
		</div>
	</div>

	<div class="grid-2" style="margin-top:16px;">
		<div class="card">
			<div class="section-title">System Configuration</div>
			<div class="placeholder">System configuration interface will be implemented here</div>
		</div>
		<div class="card">
			<div class="section-title">Security Settings</div>
			<div class="placeholder">Security configuration interface will be implemented here</div>
		</div>
	</div>
<?= $this->endSection() ?>

