<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Libre+Franklin:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> 
	<title>site PHP</title>
</head>
<body>
	<h1>Evènements</h1>
	<img src="/images/image3.jpeg" id="logo">
	<div class="navbar">
		<?php include('menu.php'); ?>
	</div>
	<section>
		
		<?php

			if (empty($_SESSION['yourUsername'])) {

		?> 

			<script type="text/javascript">
				alert("Vous devez être connecté pour accéder aux évènements.");
				document.location.href="login.php";
			</script>

		<?php
				} else {

					$hote = 'localhost'; 
					$login = 'root'; 
					$pass = 'simplon8';
					$base = 'exo2PHP';
					$connection = mysqli_connect($hote, $login, $pass, $base);
				 
					$events = 'SELECT * FROM `events`';

					$req = mysqli_query($connection, $events) or die('Erreur SQL !<br />'.$events.'<br />'.mysqli_error($connection));

					while ($donnees = mysqli_fetch_array($req)) {

						echo '<p class="events">';
						echo "Titre : ".$donnees['titre']."<br/>";
						echo '<img src="'.$donnees['image'].'"class="imgEvents" width="150px"">'."<br/>";
						echo $donnees['intro']."<br/>";
						echo "Date début : ".$donnees['date_deb']."<br/>";
						echo "Date fin : ".$donnees['date_fin']."<br/>";
						echo "Lieu : ".$donnees['lieu']."<br/>";
						echo "Date de publication : ".$donnees['date-publi']."<br/>";
						echo "</p>";
					}

					$events = 'SELECT distinct lieu FROM `events`';

					$req = mysqli_query($connection, $events) or die('Erreur SQL !<br />'.$events.'<br />'.mysqli_error($connection));

					echo "<select name='lieu'>" . PHP_EOL ;
 					echo "<option>Sélectionnez</option>" . PHP_EOL ;
  
    				while ($donnees = mysqli_fetch_array($req)) {
          				echo "<option value=".$donnees['lieu'].">".$donnees['lieu']."<option>" . PHP_EOL ;
          			}
          			
     				echo "</select >" ;
			}
		?>

	</section>
</body>
</html>