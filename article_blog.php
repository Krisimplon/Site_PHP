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
	<h1>Article de blog</h1>
	<img src="/images/image3.jpeg" id="logo">
	<?php include('menu.php'); ?>
	<section>
		<?php

		$id = $_GET['id'];

			if (isset($id)) {
				include('bdd.php');

				$articles = "SELECT * FROM `blog` WHERE id = '$id'";
				$req = mysqli_query($connection, $articles) or die('Erreur SQL !<br />'.$articles.'<br />'.mysqli_error($connection));

				if ($datas = mysqli_fetch_array($req)) {

					if (!empty($_SESSION['yourUsername'])) {
							if ($_SESSION['yourUsername'] == $datas['auteur']) {
								echo '<form action="modif_blog.php">';
								echo '<button name="id" value="'.$datas['id'].'">Modifier</button>';
								echo "</form>";
							}
						}

					echo '<img src="'.$datas['image'].'"class="imgBlog" width="150px"">'."<br/>";
					echo $datas['titre']."<br/>";
					echo $datas['intro']."<br/>";
					echo $datas['texte']."<br/>";
					echo $datas['date']."<br/>";
					echo $datas['auteur']."<br/>";
				}
			}	
		?>
	</section>
</body>
</html>