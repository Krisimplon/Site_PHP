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
	<h1>Nouvel article de blog</h1>
	<img src="/images/image3.jpeg" id="logo">
	<?php include('menu.php'); ?>
	<section>

		<?php

			if (empty($_SESSION['yourUsername'])) { //si user non connect

		?> 

			<script type="text/javascript"> //alert for user no connect and redirection
				alert("Vous devez être connecté pour ajouter un article.");
				document.location.href="login.php";
			</script>

		<?php

				} else {
		?>

		<form method="POST">
			<input type="text" name="title" id="title" placeholder="Titre de l'article" required>
			<input type="text" name="image" id="image" placeholder="Chemin de l'image" required>
			<textarea name="intro" id="intro" placeholder="Introduction" required></textarea>
			<textarea name="texte" id="texte" placeholder="Texte de l'article" required></textarea>
			<input type="date" name="date" id="date" required>
			<input type="text" name="auteur" id="auteur" disabled placeholder="Nom de l'auteur" <?php echo 'value="'.$_SESSION['yourUsername'].'"' ?>>
			<button name="valid">Valider</button>
		</form>

		<?php 

					if (isset($_POST['valid'])) {
						include('bdd.php');

						$title = $_POST['title'];
						$image = $_POST['image'];
						$intro = $_POST['intro'];
						$texte = $_POST['texte'];
						$date = $_POST['date'];
						$auteur = $_SESSION['yourUsername'];

						$req = "INSERT INTO blog VALUES(NULL, '$title', '$image', '$intro', '$texte', '$date', '$auteur')";

						$res = mysqli_query($connection, $req) or die('ERREUR SQL : '. $req . mysqli_error($connection));

		?>

			<script type="text/javascript">
				document.location.href="blog.php";
			</script>

		<?php
					}
				}
		?>

	</section>
</body>
</html>