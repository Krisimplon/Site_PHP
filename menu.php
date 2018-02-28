<div id="navbar">
	<ul id="menu">
		<li><a href="index.php">Home</a></li>
		<li><a href="aPropos.php">A propos</a></li>
		<li><a href="blog.php">Blog</a></li>
		<li><a href="evenement.php">Evènements</a></li>
		<li><a href="login.php">Log In</a></li>
		<li><a href="contact.php">Contact</a></li>
		<li><a href="login.php">
			<?php
				if (!empty($_SESSION['yourUsername'])) {
					echo "Déconnexion";
				} 
			?>	
		</a>
		</li>
		<li>
			<?php
				if (!empty($_SESSION['yourUsername'])) {
					echo "Bonjour ".$_SESSION['yourUsername'];
				} 
			?>
		</li>
	</ul>
</div>