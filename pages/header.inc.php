<html lang="en">
<head>
	<base href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/<?php echo $_GET['checkId'] ?>/">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Toastmasters Materials</title>
	<meta name="description" content="">

	<link rel="stylesheet" href="/screen.css">

<?php if (is_admin()): ?>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	<script src="/lib.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			toastmasters.admin.init();
		});
	</script>
<?php endif; ?>
</head>

<body>

<header id="main-header">
	<img id="head-logo" src="/img/ToastmastersLogo.png" alt="Toastmasters International logo">

	<div id="header-info">
		<h1>Toastmasters Materials</h2>
		<!-- <p>This page aims to collect all digital resources that Toastmasters International provides, and some that club members produced on their own. Clicking any of the files should open or download that file.</p> -->
	</div>

	<nav id="main-menu">
		<ul>
			<li><a href="./" <?php if ('main' == $page) echo 'class="current"' ?>>Materials</a></li>
			<li><a href="./members" <?php if ('members' == $page) echo 'class="current"' ?>>Members</a></li>
		</ul>
	</nav>
</header>
