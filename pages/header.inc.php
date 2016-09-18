<html lang="en">
<head>
	<base href="//<?php echo $_SERVER['HTTP_HOST'] ?>/<?php echo $_GET['checkId'] ?>/">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Toastmasters Materials</title>
	<meta name="description" content="">

	<link rel="stylesheet" href="/screen.css">

<?php if (is_admin()): ?>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="/lib.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			toastmasters.admin.init();
		});
	</script>
<?php endif; ?>
</head>

<body>

<header id="main-header">
	<a href="./"><img id="head-logo" src="/img/ToastmastersLogo.png" alt="Toastmasters International logo"></a>

	<div id="welcome-msg">Welcome, <?php echo $currentUser->name ?> to</div>
	<h1>Toastmasters Materials</h1>

	<nav id="main-menu">
		<ul>
			<li><a href="./" <?php if ('main' == $page) echo 'class="current"' ?>>Materials</a></li>
			<li><a href="./members" <?php if ('members' == $page) echo 'class="current"' ?>>Members</a></li>
		</ul>
	</nav>
</header>
