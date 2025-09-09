<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
	<div class="h1">Users</div>
	<div class="subtitle">Manage user accounts and roles</div>

	<div style="margin-bottom:16px;">
		<button class="btn" onclick="openModal('create')">➕ New User</button>
	</div>

	<?php if ($msg = session()->getFlashdata('message')): ?>
		<div class="card" style="border-left:4px solid #16a34a; margin-bottom:16px;"><span class="muted"><?= esc($msg) ?></span></div>
	<?php endif; ?>

	<div class="card">
		<table class="table">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Role</th>
					<th>Created</th>
					<th style="width:140px;">Actions</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($users as $user): ?>
				<tr>
					<td><strong><?= esc($user['name']) ?></strong></td>
					<td><?= esc($user['email']) ?></td>
					<td><span class="badge info"><?= esc($user['role']) ?></span></td>
					<td><?= esc($user['created_at']) ?></td>
					<td>
						<a class="link" href="#" onclick="openModal('edit', <?= $user['id'] ?>, '<?= esc($user['name']) ?>', '<?= esc($user['email']) ?>', '<?= esc($user['role']) ?>')">✏️ Edit</a>
						|
						<a class="link" href="#" onclick="openModal('delete', <?= $user['id'] ?>, '<?= esc($user['name']) ?>')">🗑️ Delete</a>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<!-- Create User Modal -->
	<div id="createModal" class="modal">
		<div class="modal-content">
			<div class="modal-header">
				<h3>➕ Create New User</h3>
				<button class="modal-close" onclick="closeModal('create')">&times;</button>
			</div>
			<form method="post" action="<?= site_url('admin/users') ?>">
				<div class="form-grid">
					<div>
						<label for="createName">👤 Full Name</label>
						<input type="text" id="createName" name="name" class="input" placeholder="Enter full name" required>
					</div>
					<div>
						<label for="createEmail">📧 Email Address</label>
						<input type="email" id="createEmail" name="email" class="input" placeholder="Enter email address" required>
					</div>
					<div>
						<label for="createPassword">🔒 Password</label>
						<input type="password" id="createPassword" name="password" class="input" placeholder="Enter password" required>
					</div>
					<div>
						<label for="createRole">👑 User Role</label>
						<select id="createRole" name="role" class="input" required>
							<option value="">Select a role</option>
							<?php foreach ($roles as $key => $label): ?>
								<option value="<?= esc($key) ?>"><?= esc($label) ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-actions">
					<button type="button" class="btn secondary" onclick="closeModal('create')">❌ Cancel</button>
					<button class="btn" type="submit">✅ Create User</button>
				</div>
			</form>
		</div>
	</div>

	<!-- Edit User Modal -->
	<div id="editModal" class="modal">
		<div class="modal-content">
			<div class="modal-header">
				<h3>✏️ Edit User</h3>
				<button class="modal-close" onclick="closeModal('edit')">&times;</button>
			</div>
			<form method="post" id="editForm">
				<div class="form-grid">
					<div>
						<label for="editName">👤 Full Name</label>
						<input type="text" id="editName" name="name" class="input" placeholder="Enter full name" required>
					</div>
					<div>
						<label for="editEmail">📧 Email Address</label>
						<input type="email" id="editEmail" name="email" class="input" placeholder="Enter email address" required>
					</div>
					<div>
						<label for="editPassword">🔒 New Password</label>
						<input type="password" id="editPassword" name="password" class="input" placeholder="Leave blank to keep current">
					</div>
					<div>
						<label for="editRole">👑 User Role</label>
						<select id="editRole" name="role" class="input" required>
							<?php foreach ($roles as $key => $label): ?>
								<option value="<?= esc($key) ?>"><?= esc($label) ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-actions">
					<button type="button" class="btn secondary" onclick="closeModal('edit')">❌ Cancel</button>
					<button class="btn" type="submit">💾 Save Changes</button>
				</div>
			</form>
		</div>
	</div>

	<!-- Delete User Modal -->
	<div id="deleteModal" class="modal">
		<div class="modal-content">
			<div class="modal-header" style="border-bottom-color: #ef4444;">
				<h3 style="color: #ef4444;">⚠️ Delete User</h3>
				<button class="modal-close" onclick="closeModal('delete')">&times;</button>
			</div>
			<div style="padding: 32px;">
				<div style="text-align: center; margin-bottom: 24px;">
					<div style="font-size: 48px; margin-bottom: 16px;">🗑️</div>
					<h4 style="margin: 0 0 8px 0; color: var(--text);">Are you sure?</h4>
					<p style="margin: 0; color: var(--muted);">This action cannot be undone.</p>
				</div>
				<div style="background: #fef2f2; border: 1px solid #fecaca; border-radius: 12px; padding: 16px; margin-bottom: 24px;">
					<p style="margin: 0; color: #dc2626; font-weight: 600;">
						You are about to delete the user: <strong id="deleteUserName"></strong>
					</p>
				</div>
				<div class="form-actions">
					<button type="button" class="btn secondary" onclick="closeModal('delete')">❌ Cancel</button>
					<a href="#" id="deleteConfirmBtn" class="btn" style="background: #ef4444; border-color: #dc2626;">🗑️ Delete User</a>
				</div>
			</div>
		</div>
	</div>

	<script>
	function openModal(type, userId = null, name = '', email = '', role = '') {
		if (type === 'create') {
			document.getElementById('createModal').style.display = 'flex';
			// Focus on first input
			setTimeout(() => document.getElementById('createName').focus(), 100);
		} else if (type === 'edit') {
			document.getElementById('editName').value = name;
			document.getElementById('editEmail').value = email;
			document.getElementById('editRole').value = role;
			document.getElementById('editForm').action = '<?= site_url('admin/users/') ?>' + userId;
			document.getElementById('editModal').style.display = 'flex';
			// Focus on first input
			setTimeout(() => document.getElementById('editName').focus(), 100);
		} else if (type === 'delete') {
			document.getElementById('deleteUserName').textContent = name;
			document.getElementById('deleteConfirmBtn').href = '<?= site_url('admin/users/') ?>' + userId + '/delete';
			document.getElementById('deleteModal').style.display = 'flex';
		}
	}

	function closeModal(type) {
		if (type === 'create') {
			document.getElementById('createModal').style.display = 'none';
			document.getElementById('createModal').querySelector('form').reset();
		} else if (type === 'edit') {
			document.getElementById('editModal').style.display = 'none';
		} else if (type === 'delete') {
			document.getElementById('deleteModal').style.display = 'none';
		}
	}

	// Close modal when clicking outside
	window.onclick = function(event) {
		if (event.target.classList.contains('modal')) {
			event.target.style.display = 'none';
		}
	}

	// Close modal with Escape key
	document.addEventListener('keydown', function(event) {
		if (event.key === 'Escape') {
			const modals = document.querySelectorAll('.modal');
			modals.forEach(modal => {
				if (modal.style.display === 'flex') {
					modal.style.display = 'none';
				}
			});
		}
	});
	</script>

<?= $this->endSection() ?>


