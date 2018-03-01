<?php
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
?>