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
		<tr data-id="<?php echo $id ?>">
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
	<input type="text" name="name">
	<input type="text" name="email">
	<input type="text" name="phone">
	<button type="submit">Add</button>
</form>
<?php endif; ?>

<?php
include APPLICATION_PATH . '/pages/footer.inc.php';
?>