<?php
/* Scan folders */
$reader = new DirectoryReader();
$materials = $reader->getStructure(
	APPLICATION_PATH . '/data/',
	(isset($_GET['reset']) && filter_var($_GET['reset'], FILTER_VALIDATE_BOOLEAN) ? true : false)
	);

include APPLICATION_PATH . '/pages/header.inc.php';
?>
<ul class="section-list">
<?php foreach ($materials as $category): ?>
	<li>
		<h2><?php echo $category->title; ?></h2>
		<ul class="item-list">
<?php foreach ($category->children as $material): ?><li><div class="card-box">
				<img src="./data/<?php echo $category->name . '/' . $material->name ?>/thumb.gif">
				<span class="item-name"><?php echo $material->title ?></span>
				<ul class="file-list">
<?php foreach ($material->children as $file): ?>
					<li><a href="./data/<?php echo $category->name . '/' . $material->name . '/' . $file->name ?>"><?php echo $file->title ?></a></li>
<?php endforeach; ?>
				</ul>
			</div></li><?php endforeach; ?>
		</ul>
	</li>
<?php endforeach; ?>
</ul>

<?php
include APPLICATION_PATH . '/pages/footer.inc.php';
?>