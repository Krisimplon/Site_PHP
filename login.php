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
	<h1>Se connecter</h1>
	<img src="/images/image3.jpeg" id="logo">
	<?php include('menu.php'); ?>
	<section>
		<h3>Se connecter</h3>
			<form method="post" action="login.php" enctype="multipart/form-data">
				<label for="yourUsername">Nom d'utilisateur :</label><br>
				<input type="text" name="yourUsername" id="yourUsername" placeholder="Utilisateur" required><br>
				<label for="yourPassword">Mot de passe :</label><br>
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

					include('bdd.php');
				 
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

			<a href="new_account.php">Pas encore de compte?</a>
	</section>
</body>
</html>