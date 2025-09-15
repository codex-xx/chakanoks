<?= $this->extend('inventory/layout') ?>

<?= $this->section('content') ?>
	<div class="h1">Inventory Dashboard</div>
	<div class="subtitle">Quick overview for inventory staff</div>

	<div class="kpis">
		<div class="card kpi">
			<div class="badge info">📦</div>
			<div class="label">Items</div>
			<div class="value">—</div>
			<div class="delta">Loaded dynamically</div>
		</div>
		<div class="card kpi">
			<div class="badge warning">⚠</div>
			<div class="label">Low Stock</div>
			<div class="value">—</div>
			<div class="delta">Loaded dynamically</div>
		</div>
	</div>
<?= $this->endSection() ?>


