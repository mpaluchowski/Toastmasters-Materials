<?php
include APPLICATION_PATH . '/pages/header.inc.php';
?>

<table id="members-list">
	<thead>
		<tr>
			<th>Name</th>
			<th>E-Mail</th>
			<th>Phone</th>
<?php if (is_admin()): ?>
			<th>Actions</th>
<?php endif; ?>
		</tr>
	</thead>
	<tbody>
<?php foreach ($guardian->getList() as $id => $user): ?>
		<tr data-id="<?php echo $id ?>" <?php if (is_admin() && !empty($user->admin) && $user->admin) echo 'class="admin"' ?>>
			<td><?php echo $user->name ?></td>
			<td><a href="mailto:<?php echo $user->email ?>"><?php echo $user->email ?></a></td>
			<td><a href="callto:<?php echo $user->phone ?>"><?php echo $user->phone ?></a></td>
<?php if (is_admin()): ?>
			<td><a href="#" title="Delete" data-action="delete">d</a></td>
<?php endif; ?>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>

<?php if (is_admin()): ?>
<form id="user-add-form" action=".">
	<ul>
		<li>
			<label for="user-name">Name</label>
			<input type="text" id="user-name" name="name">
		</li>
		<li>
			<label for="user-email">Email</label>
			<input type="text" id="user-email" name="email">
		</li>
		<li>
			<label for="user-phone">Phone</label>
			<input type="text" id="user-phone" name="phone">
		</li>
		<li>
			<label for="user-admin">Admin</label>
			<input type="checkbox" id="user-admin" name="admin">
		</li>
		<li>
			<button type="submit">Add</button>
		</li>
	</ul>
</form>
<?php endif; ?>

<?php
include APPLICATION_PATH . '/pages/footer.inc.php';
?>