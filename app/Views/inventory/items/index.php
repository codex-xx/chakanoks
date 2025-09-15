<?= $this->extend('inventory/layout') ?>

<?= $this->section('content') ?>
	<div class="h1">Items</div>
	<div class="card">
		<div class="section-title">Enter Barcode</div>
		<div style="margin-top:12px; display:flex; gap:8px; align-items:center;">
			<input id="barcodeInput" type="text" placeholder="Type or scan barcode" style="flex:1; padding:8px 10px;" />
			<button id="searchBtn" class="btn">Search</button>
		</div>
	</div>

	<div class="card" id="resultCard" style="display:none;">
		<div class="section-title">Item</div>
		<pre id="result" style="white-space:pre-wrap; overflow:auto; margin:0;"></pre>
	</div>

	<?php if (!empty($samples)) : ?>
	<div class="card">
		<div class="section-title">Sample Barcodes</div>
		<div style="display:grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap:16px; align-items:flex-start;">
			<?php foreach ($samples as $i => $s) : ?>
			<div class="card" style="padding:12px; display:flex; align-items:center; justify-content:center;">
				<svg id="barcode_<?= (int)$i ?>" style="max-width:100%;"></svg>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php endif; ?>

	<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.6/dist/JsBarcode.all.min.js"></script>
	<script>
	(function() {
		const input = document.getElementById('barcodeInput');
		const result = document.getElementById('result');
		const resultCard = document.getElementById('resultCard');
		const searchBtn = document.getElementById('searchBtn');

		function showItem(data) {
			result.textContent = JSON.stringify(data, null, 2);
			resultCard.style.display = 'block';
		}

		async function findByBarcode(code) {
			if (!code) return;
			try {
				const res = await fetch('<?= site_url('inventory/items/search') ?>?barcode=' + encodeURIComponent(code));
				if (!res.ok) {
					const j = await res.json().catch(() => ({}));
					showItem({ error: j.error || 'Item not found', barcode: code });
					return;
				}
				const j = await res.json();
				showItem(j.data);
			} catch (e) {
				showItem({ error: 'Request failed', detail: String(e) });
			}
		}

		searchBtn.addEventListener('click', () => findByBarcode(input.value.trim()));
		input.addEventListener('keydown', (e) => {
			if (e.key === 'Enter') {
				findByBarcode(input.value.trim());
			}
		});
	})();
	</script>
	<?php if (!empty($samples)) : ?>
	<script>
	(function renderBarcodes() {
		const samples = <?= json_encode(array_values(array_map(function($s){return ['barcode'=>$s['barcode']];}, $samples)), JSON_UNESCAPED_SLASHES) ?>;
		samples.forEach(function(s, idx) {
			try { JsBarcode('#barcode_'+idx, String(s.barcode || ''), { format: 'CODE128', width: 2, height: 60, displayValue: true }); } catch (e) {}
		});
	})();
	</script>
	<?php endif; ?>
<?= $this->endSection() ?>

