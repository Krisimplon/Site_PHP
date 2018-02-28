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
	<section id="blog">
		<div id="articles">
			
			<?php
				include('bdd.php');

				$articles = 'SELECT id,titre,image,intro,date FROM `blog` ORDER BY date DESC';
				$req = mysqli_query($connection, $articles) or die('Erreur SQL !<br />'.$articles.'<br />'.mysqli_error($connection));		
				while ($donnees = mysqli_fetch_array($req)) {
					echo '<a href="article_blog.php?id='.$donnees['id'].'" class="lienArticle">';
					echo '<img src="'.$donnees['image'].'"class="imgBlog" width="150px"">'."<br/>";
					echo $donnees['titre']."<br/>";
					echo $donnees['intro']."<br/>";
					echo $donnees['date']."<br/>";
					echo '</a>';
				}
			?>

		</div>
	</section>
</body>
</html>