<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= esc($title ?? 'SCMS — Admin') ?></title>
	<link rel="shortcut icon" type="image/png" href="<?= base_url('public/assets/images/favicon.ico') ?>">
	<link rel="stylesheet" href="<?= base_url('public/assets/css/admin.css') ?>">
</head>
<body>
	<div class="layout">
		<?= $this->include('admin/partials/sidebar') ?>
		<section class="main">
			<?= $this->include('admin/partials/header') ?>
			<div class="content">
				<?= $this->renderSection('content') ?>
			</div>
		</section>
	</div>


</body>
</html>


