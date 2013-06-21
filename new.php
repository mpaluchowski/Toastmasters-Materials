<?php
// If no name given, quit
if (!isset($_GET['a']))
	die;

require_once './AccessGuardian.php';

$guardian = new AccessGuardian();

header('Content-Type: text/html; charset=utf-8');

switch ($_GET['a']) {
	case 'new':
		$id = $guardian->addUser(
			$_GET['name'],
			$_GET['email'],
			$_GET['phone']
			);
?>
<p>Added new person: <?php echo $_GET['name'] ?>.<br>
Link to send is: <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/<?php echo $id ?>/">http://<?php echo $_SERVER['HTTP_HOST'] ?>/<?php echo $id ?>/</a></p>

<h2>Email:</h2>

<p>Repository of digital Toastmasters materials</p>

<p>Hello,<br>
<br>
we just finished setting up a repository of Toastmasters digital content - manuals, flyers, forms - both the official ones, available (but often hard to find) at www.toastmasters.org, but also the files produced by ours and other clubs.<br>
<br>
Your personal link to access the repository is:<br>
<br>
http://<?php echo $_SERVER['HTTP_HOST'] ?>/<?php echo $id ?>/<br>
<br>
Please do NOT SHARE this link with other members. Everybody receives a unique link and all active members of the club will have access to the repository. If another member asks you for the link, please send him or her over to me to get their individual one.
<?php
		break;

	case 'list':
		$people = $guardian->getList();
		foreach ($people as $id => $person):
?>
<a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/<?php echo $id ?>/"><?php echo $person->name ?></a><br>
<?php
		endforeach;
		break;
	default:
		die;
}
?>