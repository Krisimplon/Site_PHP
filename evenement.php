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
	<?php include('menu.php'); ?>
	<section>
		
		<?php

			if (empty($_SESSION['yourUsername'])) { //si user non connect

		?> 

			<script type="text/javascript"> //alert for user no connect and redirection
				alert("Vous devez être connecté pour accéder aux évènements.");
				document.location.href="login.php";
			</script>

		<?php
				} else {
					include('bdd.php'); //connection to the bdd

					//1 : Select a city for the events
					$events = 'SELECT distinct lieu FROM `events`';

					$req = mysqli_query($connection, $events) or die('Erreur SQL !<br/>'.$events.mysqli_error($connection));

					echo '<form method="POST" action="evenement.php">';
					echo "<select name='lieu'>";
 					echo "<option>Sélectionner un lieu</option>";
  
    				while ($donnees = mysqli_fetch_array($req)) {
          				echo "<option value=".$donnees['lieu'].">".$donnees['lieu']."</option>";
          			}
          			
     				echo "</select >";
     				echo "<button name='choice'>Valider</button>";
     				echo "</form>";

     				if(isset($_POST['choice'])) { 
						$choice = $_POST['lieu'];

						$events = "SELECT * FROM `events` WHERE lieu ='$choice'";

						include('article_events.php');

						if ($choice=="Sélectionner un lieu") {
							$events = 'SELECT * FROM `events`';

							include('article_events.php');
						}

					} else {
						//2 : Show the events on this page
						$events = 'SELECT * FROM `events`';

						include('article_events.php');	
					}
               	}
		?>

	</section>
</body>
</html>