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
	<h1>Blog</h1>
	<img src="/images/image3.jpeg" id="logo">
	<?php include('menu.php'); ?>
	<section>
		<div id="articles">
			<form method="POST" action="blog.php">
				<select name="dates">
	 				<option>Tri par dates</option>
	        		<option>Décroissantes</option>
	        		<option>Croissantes</option>
	     		</select >
	     		<button name="choice">Valider</button>
	     	</form>
		</div>

		<div id="newBlog">
			<form action="new_blog.php">
				<button name="newB">Ajouter un article</button>
			</form>
		</div>
	
			<?php

				include('bdd.php'); 

				if (!isset($_POST['choice'])) {
					$articles = 'SELECT id,titre,image,intro,date FROM `blog` ORDER BY date DESC';
					include('show_artBlog.php');
				}

				//affichage par ordre croissant
				if(isset($_POST['choice'])) { 
					if ($_POST['dates']==="Croissantes") {
						$articles = 'SELECT id,titre,image,intro,date FROM `blog` ORDER BY date ASC';
						include('show_artBlog.php');
					} else if ($_POST['dates']==="Décroissantes") {
						$articles = 'SELECT id,titre,image,intro,date FROM `blog` ORDER BY date DESC';
						include('show_artBlog.php');
					}
				}
			?>

	</section>
</body>
</html>