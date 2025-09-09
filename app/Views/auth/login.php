<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SCMS — Sign in</title>
	<link rel="shortcut icon" type="image/png" href="<?= base_url('public/favicon.ico') ?>">
	<link rel="stylesheet" href="<?= base_url('public/assets/css/auth.css') ?>">
	</head>
<body>
	<div class="container">
		<div class="left">
			<img src="<?= base_url('public/assets/images/wall.png') ?>" alt="Login illustration">
		</div>
		<div class="right">
			<div class="card">
				<div class="brand">SCMS</div>
				<div class="subtitle">Welcome Back<br>Sign in to your account to continue</div>
				<?php if (!empty($error)) : ?>
					<div class="alert alert-error">
						<?= esc($error) ?>
					</div>
				<?php endif; ?>
				<form class="form" method="post" action="<?= base_url('login') ?>">
					<div class="row">
						<label class="label" for="email">Email Address</label>
						<input class="input" type="email" id="email" name="email" placeholder="Enter your email" value="<?= esc($oldEmail ?? '') ?>" required>
					</div>
					<div class="row">
						<label class="label" for="password">Password</label>
						<input class="input" type="password" id="password" name="password" placeholder="Enter your password" required>
					</div>
					<div class="meta">
						<label class="checkbox"><input type="checkbox" name="remember"> Remember me</label>
						<a class="link" href="#">Forgot password?</a>
					</div>
					<button class="button" type="submit">Sign in</button>
					<div class="footer">Don't have an account? <a href="#">Contact your administrator</a></div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>


