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
	<h1>Modification de votre article</h1>
	<img src="/images/image3.jpeg" id="logo">
	<?php include('menu.php'); ?>

	<section>

		<?php 

		$id = $_GET['id'];

		include('bdd.php'); 

		$articles = "SELECT id,titre,image,intro,texte,date FROM `blog` WHERE id = '$id'";
		$req = mysqli_query($connection, $articles) or die('Erreur SQL !<br />'.$articles.'<br />'.mysqli_error($connection));

			if ($donnees = mysqli_fetch_array($req)) {
				echo '<form method="POST">';
				echo '<input name="title" value="'.$donnees['titre'].'">';
				echo '<input name="image" value="'.$donnees['image'].'">';
				echo '<textarea name="intro">'.$donnees['intro'].'</textarea>';
				echo '<textarea name="texte"">'.$donnees['texte'].'</textarea>';
				echo '<input type="date" name="date" value="'.$donnees['date'].'">';
				echo '<button name="send">Modifier</button>';
				echo "</form>";
			}

		?>

	</section>
</body>
</html>