<?php
	$req = mysqli_query($connection, $articles) or die('Erreur SQL !<br />'.$articles.'<br />'.mysqli_error($connection));	

	while ($donnees = mysqli_fetch_array($req)) {
		echo '<a href="article_blog.php?id='.$donnees['id'].'" class="lienArticle">';
		echo '<img src="'.$donnees['image'].'"class="imgBlog" width="150px"">'."<br/>";
		echo $donnees['titre']."<br/>";
		echo $donnees['intro']."<br/>";
		echo $donnees['date']."<br/>";
		echo '</a>';
	}
?>