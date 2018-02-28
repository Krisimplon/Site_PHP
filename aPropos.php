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
	<h1>A propos...</h1>
	<img src="/images/image3.jpeg" id="logo">
	<div class="navbar">
		<?php include('menu.php'); ?>
	</div>
	<section class="textGeneral">
		<div>
			<p>
			 	Nam vel scelerisque ligula, eu luctus magna. Integer vitae sollicitudin libero, at sodales magna. Donec iaculis lectus eget nisi ullamcorper dignissim. Morbi nec mattis justo. Fusce rutrum dui a scelerisque semper. Curabitur bibendum malesuada dolor, a pretium diam blandit at. Maecenas volutpat efficitur mauris, sit amet molestie lorem malesuada at. Ut sed ante arcu. In elementum orci ex, vel varius mauris fermentum ac. Duis ultricies quam arcu. In ac accumsan est. Vestibulum tincidunt sem ut bibendum pretium. Fusce orci sem, sodales ut lectus at, convallis suscipit ante.
			</p><br/>
			 	Morbi blandit laoreet nisi at auctor. Sed vel magna vitae magna ultricies efficitur sed interdum quam. Curabitur id consequat tellus, in finibus est. Duis tincidunt ante urna, sed dignissim felis faucibus at. In posuere finibus lobortis. Cras quis faucibus augue. Phasellus tempus risus massa, vitae consequat enim consequat et. Praesent fringilla libero vel gravida suscipit. Vivamus quis facilisis ex. Cras quis porttitor sem. Phasellus placerat massa in molestie sodales. Donec gravida leo quis diam finibus, et sollicitudin augue bibendum. Nunc fringilla, ante nec ultrices tempus, neque enim fringilla diam, sit amet commodo turpis risus eu leo. Nullam interdum orci fringilla velit mollis tristique. Vestibulum euismod porta metus id dignissim.
			 <p><br/>
			 	Sed lectus mauris, scelerisque et metus ut, euismod varius sapien. Quisque nisl lorem, malesuada nec turpis quis, accumsan scelerisque velit. Cras ut elementum massa, vel consectetur orci. Aenean congue pretium tellus quis suscipit. In semper nisi nec neque accumsan congue. Sed eget nibh sapien. Sed magna nisi, sollicitudin convallis velit egestas, aliquet aliquet dui. Sed molestie laoreet felis ac rhoncus. Nullam posuere convallis porttitor. Aenean quam est, pretium et ante at, aliquam laoreet eros. Duis eu mi quis velit euismod tristique.  
			 </p>
		</div>
	</section>
</body>
</html>