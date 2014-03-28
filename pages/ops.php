<?php
/* Only allow AJAX, and only by admins */
if (empty($_SERVER['HTTP_X_REQUESTED_WITH'])
		|| strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest'
		|| !is_admin())
	die;

switch ($_POST['op']) {
	case 'remove':
		$guardian->removeUser($_POST['id']);
		break;
	case 'save':
		if (isset($_POST['id'])) {
			$guardian->updateUser(
				$_POST['id'],
				$_POST['name'],
				$_POST['email'],
				$_POST['phone'],
				isset($_POST['admin']) && $_POST['admin'] === 'on'
				);
			echo json_encode($_POST['id']);
		} else {
			$id = $guardian->addUser(
				$_POST['name'],
				$_POST['email'],
				$_POST['phone'],
				isset($_POST['admin']) && $_POST['admin'] === 'on'
				);
			echo json_encode($id);
		}
		break;
	case 'edit':
		$user = $guardian->getUser($_POST['id']);
		$user->id = $_POST['id'];
		echo json_encode($user);
		break;
}
