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
		<tr <?php if (is_admin()) echo 'data-id="<?php echo $id ?>"' ?> <?php if (is_admin() && !empty($user->admin) && $user->admin) echo 'class="admin"' ?>>
			<td><?php if (is_admin()) echo '<a href="http://' . $_SERVER['HTTP_HOST'] . '/' . $id . '">' ?>
				<?php echo $user->name ?>
			<?php if (is_admin()) echo '</a>' ?></td>
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

<section id="user-new-email">
	<h2>Email:</h2>

	<p>Repository of digital Toastmasters materials</p>

	<p>Hello,<br>
	<br>
	we have a repository of Toastmasters <strong>digital content</strong> - manuals, flyers, forms - both the official ones, available (but often hard to find) at www.toastmasters.org, but also the files produced by ours and other clubs. It also provides <strong>contact details</strong> of your fellow club members.<br>
	<br>
	Your personal link to access the repository is:<br>
	<br>
	[LINK HERE]<br>
	<br>
	Please do NOT SHARE this link with other members. Everybody receives a unique link and all active members of the club will have access to the repository. If another member asks you for the link, please send him or her over to me to get their individual one.</p>
</section>
<?php endif; ?>

<?php
include APPLICATION_PATH . '/pages/footer.inc.php';
?>