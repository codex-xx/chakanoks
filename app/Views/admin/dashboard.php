<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
	<div class="h1">Supply Chain Dashboard</div>
	<div class="subtitle">Monitor your supply chain operations and key metrics</div>

	<div class="kpis">
		<div class="card kpi">
			<div class="badge danger">⚠</div>
			<div class="label">Low Stock Items</div>
			<div class="value">24</div>
			<div class="delta danger">↑ 3 from yesterday</div>
		</div>
		<div class="card kpi">
			<div class="badge warning">⏳</div>
			<div class="label">Pending Requests</div>
			<div class="value">18</div>
			<div class="delta">↓ 2 from yesterday</div>
		</div>
		<div class="card kpi">
			<div class="badge success">✓</div>
			<div class="label">Deliveries Today</div>
			<div class="value">12</div>
			<div class="delta positive">On schedule</div>
		</div>
		<div class="card kpi">
			<div class="badge info">ℹ</div>
			<div class="label">Active Franchises</div>
			<div class="value">156</div>
			<div class="delta">↑ 5 this month</div>
		</div>
	</div>

	<div class="grid-2" style="margin-top:16px;">
		<div class="card">
			<div class="section-title">Inventory Trends <span class="segmented" style="float:right"><span class="seg active">7D</span><span class="seg">30D</span><span class="seg">90D</span></span></div>
			<div class="chart">Area/Line Chart Placeholder</div>
		</div>
		<div class="card" style="text-align:center;">
			<div class="section-title" style="text-align:left;">Supplier Performance <a class="view-link" href="#">View All</a></div>
			<div class="donut" style="margin: 0 auto;"></div>
			<div class="legend">
				<div class="item"><span class="dot" style="background:#3b82f6"></span> Excellent</div>
				<div class="item"><span class="dot" style="background:#f59e0b"></span> Poor</div>
				<div class="item"><span class="dot" style="background:#10b981"></span> Good</div>
				<div class="item"><span class="dot" style="background:#94a3b8"></span> Average</div>
			</div>
		</div>
	</div>

	<div class="panels">
		<div class="card">
			<h4>Recent Activities</h4>
			<div class="list">
				<div class="activity"><span>Inventory sync completed</span><span class="muted">2m ago</span></div>
				<div class="activity"><span>New supplier onboarded</span><span class="muted">1h ago</span></div>
				<div class="activity"><span>Purchase order #PO-1045 approved</span><span class="muted">3h ago</span></div>
			</div>
		</div>
		<div class="card">
			<h4>Quick Actions</h4>
			<div class="list">
				<button class="action" style="padding:10px 12px;border:1px solid var(--border);border-radius:10px;background:#fff;cursor:pointer;">Add Inventory Item</button>
				<button class="action" style="padding:10px 12px;border:1px solid var(--border);border-radius:10px;background:#fff;cursor:pointer;">Create Purchase Order</button>
				<button class="action" style="padding:10px 12px;border:1px solid var(--border);border-radius:10px;background:#fff;cursor:pointer;">Invite Supplier</button>
			</div>
		</div>
	</div>

<?= $this->endSection() ?>

