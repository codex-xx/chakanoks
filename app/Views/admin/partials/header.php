<div class="topbar">
	<div class="search">
		<input type="text" placeholder="Search inventory, orders, suppliers…" />
	</div>
	<div class="userbox" id="userbox">
		<span class="top-icon">🔔</span>
		<button class="profile-toggle" id="profileToggle" type="button" aria-haspopup="menu" aria-expanded="false">
			<img class="avatar" src="<?= base_url('public/assets/images/icon.jpg') ?>" alt="Profile">
			<div class="info">
				<div class="name"><?= esc(session()->get('userName') ?? 'Profile') ?></div>
				<div class="role"><?= esc(session()->get('role') ? ucfirst(session()->get('role')) : '') ?></div>
			</div>
		</button>
		<div class="profile-menu" role="menu" aria-label="Profile">
			<a href="#" role="menuitem">Profile</a>
			<a href="<?= base_url('logout') ?>" role="menuitem">Logout</a>
		</div>
	</div>
</div>

<script>
document.addEventListener('click', function (e) {
	var box = document.getElementById('userbox');
	var toggle = document.getElementById('profileToggle');
	if (!box) return;
	if (toggle && toggle.contains(e.target)) {
		var open = box.classList.toggle('open');
		toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
		return;
	}
	if (!box.contains(e.target)) {
		box.classList.remove('open');
		if (toggle) toggle.setAttribute('aria-expanded', 'false');
	}
});
</script>


