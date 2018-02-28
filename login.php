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
	<h1>Log In</h1>
	<img src="/images/image3.jpeg" id="logo">
	<div class="navbar">
		<?php include('menu.php'); ?>
	</div>
	<section>
		<h3>Créez votre compte utilisateur</h3>
			<form method="post" action="login.php" enctype="multipart/form-data">
				<label for="username">Entrez votre nom d'utilisateur</label>
				<input type="text" name="username" id="username" placeholder="Username" required><br>
				<label for="password">Entrez votre mot de passe</label>
				<input type="password" name="password" id="password" placeholder="Password" required><br>
				<label for="passwordBis">Confirmez votre mot de passe</label>
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
						$hote = 'localhost'; // Adresse du serveur 
						$login = 'root'; // Login 
						$pass = 'simplon8'; // Mot de passe 
						$base = 'exo2PHP'; // Base de données à utiliser
						$connection = mysqli_connect($hote, $login, $pass, $base);

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

		<h3>Identifiez-vous</h3>
			<form method="post" action="login.php" enctype="multipart/form-data">
				<label for="yourUsername">Nom d'utilisateur</label>
				<input type="text" name="yourUsername" id="yourUsername" placeholder="Utilisateur" required><br>
				<label for="yourPassword">Mot de passe</label>
				<input type="password" name="yourPassword" id="yourPassword" placeholder="Mot de passe" required><br>
				<button name="go" type="submit">Go</button>
			</form>
			<form method="post" action="login.php" enctype="multipart/form-data">
				<button name="deconnect">Déconnexion</button>
			</form>
			
			<?php
				if(isset($_POST['go'])) { 
					$yourUsername = $_POST['yourUsername'];
					$yourPassword = $_POST['yourPassword'];

					$yourPassCode = hash('sha512', $yourPassword);

					$hote = 'localhost'; 
					$login = 'root'; 
					$pass = 'simplon8';
					$base = 'exo2PHP';
					$connection = mysqli_connect($hote, $login, $pass, $base);
				 
					$verif = "SELECT username, password FROM `login` WHERE username='$yourUsername' AND password='$yourPassCode'";

					$req = mysqli_query($connection, $verif) or die('Erreur SQL !<br />'.$verif.'<br />'.mysqli_error($connection));	

					if ($datas = mysqli_fetch_array($req)) {
						$_SESSION['yourUsername'] = $yourUsername;
						
			?> 
					<script type="text/javascript">
						alert("<?php echo "Bonjour ".$_SESSION['yourUsername'] ?>");
						document.location.href="index.php"
					</script>

			<?php	
					} else {

			?>
					<script type="text/javascript">
						alert("Identifiants invalides");
					</script>
			
			<?php
					}
				}

				if (isset($_POST['deconnect'])) {
					unset($_SESSION['yourUsername']);
					session_destroy();
			?> 
				<script type="text/javascript">
					alert("Vous êtes déconnecté. A bientôt!");
					document.location.href="index.php"
				</script>

			<?php
				}
			?>
	</section>
</body>
</html>