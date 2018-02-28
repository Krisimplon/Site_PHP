<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Libre+Franklin:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> 
	<title>site PHP</title>
</head>
<body>
	<header>
		<h1>PHP DISCOVERY</h1>
		<img src="/images/image3.jpeg" id="logo">
	</header>
	<main>
		<?php include('menu.php'); ?>

		<section>
			<div class="textGeneral"> 
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec posuere vel sapien non varius. Etiam molestie, arcu suscipit facilisis tempus, elit mi auctor ante, sit amet aliquam justo lorem lobortis felis. Aenean mollis mollis lectus ac molestie. Donec pharetra augue justo, in fermentum odio tincidunt quis. Duis condimentum, arcu non viverra finibus, nulla lacus commodo urna, a luctus mauris turpis sit amet diam. Quisque ut accumsan est. Phasellus facilisis porttitor feugiat. 
			</div>
			<div class="textGeneral">
				Vestibulum libero turpis, maximus vel leo ut, bibendum bibendum est. Quisque commodo ullamcorper lacus, id efficitur sapien feugiat at. Nulla sed lorem semper, tincidunt erat id, ornare magna. Maecenas aliquam, diam ac mattis porta, arcu nisl finibus felis, non ultricies nibh nisi sed nisl. In id rutrum turpis. Phasellus placerat est non orci vestibulum semper. Vivamus odio metus, sodales id fermentum in, pretium non elit. In vehicula est orci, in vulputate leo ullamcorper ut. Praesent fringilla efficitur lacus ut fringilla. Curabitur tempor vestibulum mattis. Nunc quis sollicitudin ante, ut iaculis metus. Nullam vulputate felis at leo sollicitudin elementum. Ut consequat quam vel mi facilisis cursus. Nam in nisi erat. 
			</div>
		</section>
	</main>
</body>
</html>