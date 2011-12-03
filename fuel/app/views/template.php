<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
</head>
<body>

	<header>
		<h1>My Amazing Blog</h1>
	</header>

	<div class="container" style="background: white">
		<div class="row">
			<div class="span16">

				<?php echo $content; ?>
			
			</div>
		</div>
	</div>
	
	<footer>
	<p>Copyright, Some Guy 2011</p>
	</footer>
</body>
</html>
