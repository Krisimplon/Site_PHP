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
	<h1>Contact</h1>
	<img src="/images/image3.jpeg" id="logo">
	<?php include('menu.php'); ?>
	<section id="contact">
		<h3>Contactez-nous...</h3>
		<?php
		if(isset($_POST['send'])) { 
			if (stripos($_POST ['objet'], "simplon")!==false) {
				echo ("Ce terme n'est pas autorisé dans la rubrique objet!"); 
			} else {
			echo ("<p>Votre message a bien été envoyé</p><br/>");
     		echo ("Objet : ".$_POST ['objet']."<br/>"); 
     		echo ("Votre message : ".$_POST ['message']."<br/>"); 
     		echo ("Thématique : ".$_POST ['thematique']."<br/>"); 
     		echo ("Compte user : ".$_POST ['compte']."<br/>"); 
     		echo ("Votre âge : ".$_POST ['age']."<br/>");
 			}	
		}
		?>
		<?php
			if(isset($_POST['send'])) { 
				include('bdd.php');
 
				$objet = $_POST['objet'];
				$message = $_POST['message'];
				$thematique = $_POST['thematique'];
				$compte = $_POST['compte'];
				$age = $_POST['age'];
 
				$requete = "INSERT INTO mail VALUES(NULL, '$objet', '$message', '$thematique', '$compte', '$age')";
				$resultat = mysqli_query($connection, $requete) or die('ERREUR SQL : '. $requete . mysqli_error($connection));
			}
		?>
		<form method="post" action="contact.php" enctype="multipart/form-data">
			<input type="text" name="objet" id="objet" placeholder="Objet" required> <br/>
			<textarea name="message" id="mess" cols="30" rows="10" placeholder="Message" required></textarea>
			<p>
				<select name="thematique" id="thematique">
					<option value="theme">Thématique</option>
					<option value="syntaxePHP">Syntaxe PHP</option>
					<option value="problème">Problème</option>
					<option value="fonctionsPHP">Fonctions PHP</option>
				</select>
			</p>
			<p>
			Avez-vous un compte utilisateur? <br/>
			<input type="radio" name="compte" value="oui" id="oui" /> <label for="oui">Oui</label><br/>
			<input type="radio" name="compte" value="non" id="non" /> <label for="non">Non</label><br/>
			</p>
			<input type="number" min="1" max="150" name="age" id="age" placeholder="Votre âge"> <br/>
			<button name="clean">Effacer</button>
			<button name="send">Envoyer</button>
		</form>
	</section>
</body>
</html>