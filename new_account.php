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
	<h1>Créer un compte</h1>
	<img src="/images/image3.jpeg" id="logo">
	<?php include('menu.php'); ?>
	<section class="form_contact">
		<h3 class="titleConnect">Créez votre compte utilisateur</h3>
			<form method="post" enctype="multipart/form-data">
				<label for="username">Entrez votre nom d'utilisateur :</label><br>
				<input type="text" name="username" id="username" placeholder="Username" required><br>
				<label for="password">Entrez votre mot de passe :</label><br>
				<input type="password" name="password" id="password" placeholder="Password" required><br>
				<label for="passwordBis">Confirmez votre mot de passe :</label><br>
				<input type="password" name="passwordBis" id="passwordBis" placeholder="Password" required><br>
				<button name="save" type="submit">Sauvergarder</button>
			</form>

			<?php
				if(isset($_POST['save'])) { 
					$username = $_POST['username'];
					$password = $_POST['password'];
					$passwordBis = $_POST['passwordBis'];

					if ($password !== $passwordBis) {
			?>

			<script type="text/javascript">
				alert("Mot de passe invalide")
			</script>

			<?php
					} 
					else {
						include('bdd.php');

						$verif = "SELECT username FROM `login` WHERE username='$username'";

						$req = mysqli_query($connection, $verif) or die('Erreur SQL !<br />'.$verif.'<br />'.mysqli_error($connection));

						if ($datas = mysqli_fetch_array($req)) {
			?>

						<script type="text/javascript">
							alert("Cet identifiant est déjà utilisé!")
						</script>

			<?php
						} else {
								$passCode = hash('sha512', $_POST['password']);
								$requete = "INSERT INTO login VALUES(NULL, '$username', '$passCode')";

								$resultat = mysqli_query($connection, $requete) or die('ERREUR SQL : '. $requete . mysqli_error($connection));

								echo "<br/>Vos identifiants ont bien été enregistrés";
							}	
					}
				}
			?>

	</section>
</body>
</html>