<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
	<div class="h1">Reports & Analytics</div>
	<div class="subtitle">Comprehensive insights into your supply chain performance and trends</div>

	<div class="kpis">
		<div class="card kpi">
			<div class="badge success">📊</div>
			<div class="label">Total Reports</div>
			<div class="value">24</div>
			<div class="delta positive">All systems operational</div>
		</div>
		<div class="card kpi">
			<div class="badge info">📈</div>
			<div class="label">Growth Rate</div>
			<div class="value">+8.7%</div>
			<div class="delta">↑ 1.2% vs last month</div>
		</div>
		<div class="card kpi">
			<div class="badge success">🎯</div>
			<div class="label">Target Achievement</div>
			<div class="value">94%</div>
			<div class="delta positive">Exceeding expectations</div>
		</div>
		<div class="card kpi">
			<div class="badge warning">⏰</div>
			<div class="label">Last Updated</div>
			<div class="value">2h ago</div>
			<div class="delta">Real-time data</div>
		</div>
	</div>

	<div class="grid-2" style="margin-top:16px;">
		<div class="card">
			<div class="section-title">Performance Trends</div>
			<div class="chart">Trend Analysis Chart Placeholder</div>
		</div>
		<div class="card">
			<div class="section-title">Key Metrics Summary</div>
			<div class="list">
				<div class="activity"><span>Inventory turnover rate</span><span class="muted">4.2x/month</span></div>
				<div class="activity"><span>Order fulfillment rate</span><span class="muted">98.5%</span></div>
				<div class="activity"><span>Supplier performance</span><span class="muted">4.2/5.0</span></div>
			</div>
		</div>
	</div>
<?= $this->endSection() ?>

