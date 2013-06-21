<?php
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__)));

require_once APPLICATION_PATH . '/AccessGuardian.php';
require_once APPLICATION_PATH . '/DirectoryReader.php';

$guardian = new AccessGuardian();
$currentUser = $guardian->getUser($_GET['checkId']);

if (null == $currentUser)
	die;

$allowedPages = [
	'main',
	'members',
	'ops'
];

$page = isset($_GET['page']) && in_array($_GET['page'], $allowedPages)
	? $_GET['page']
	: $allowedPages[0];

function is_admin() {
	global $currentUser;
	return !empty($currentUser->admin) && $currentUser->admin;
}

include APPLICATION_PATH . '/pages/' . $page . '.php';
?>
