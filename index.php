<?php
include 'check_status.php';
?>

<!DOCTYPE html>
<html lang="en">
<!--
  Header part
  -->
<head>
	<meta charset="utf-8">
	<title>Mella-tea, enjoy a cup of life</title>
	<link rel="stylesheet" href="CSS/main.css">
	<link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light|Indie+Flower|Poiret+One|Josefin+Sans|Gloria+Hallelujah|Pacifico|Dancing+Script|Coming+Soon|Fredoka+One|Playball|Permanent+Marker|Architects+Daughter|Rock+Salt|Crafty+Girls|Reenie+Beanie|Pinyon+Script|Satisfy|Kaushan+Script|Marck+Script|Tangerine' rel='stylesheet' type='text/css'>
</head>

<!--
  Body part
  -->
<body>
	<header class="tophead">
		<a href="index.php">
		<img id="toplogo" src="images/coffee.gif" alt="coffee logo">
		</a>
		<h1>Mella Tea, enjoy a cup of life !</h1>
		<?php
		include 'topright.php';
		?>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="personal.html">Personal</a></li>
				<li><a href="forum.html">Forum</a></li>
				<li><a href="contact.html">Contact</a></li>
			</ul>
		<nav>
		
	</header>

	<section>
		<?php
		if(!$uid_isset) {
			echo "<div>not signed in</div>";
		} else {
			if($uid_isvalid) {
				echo "<div>welcome</div>";
			} else {
				echo "<div>sorry, session error</div>";
			}
		}
		?>
		<div class="img">
		 <a target="_blank" href="images/milk_tea/tea1.jpg"><img src="images/milk_tea/tea1.jpg" alt="tea 1" width="440" height="360"></a>
		</div>
		<div class="img">
		 <a target="_blank" href="images/milk_tea/tea2.jpg"><img src="images/milk_tea/tea2.jpg" alt="tea 2" width="440" height="360"></a>
		</div>
		<div class="img">
		 <a target="_blank" href="images/milk_tea/tea3.jpg"><img src="images/milk_tea/tea3.jpg" alt="tea 3" width="440" height="360"></a>
		</div>
		<div class="img">
		 <a target="_blank" href="images/milk_tea/tea4.jpg"><img src="images/milk_tea/tea4.jpg" alt="tea 4" width="440" height="360"></a>
		</div>
	</section>

	<footer>
		<p>&copy; 2014 Jiong Liu and Juncheng Feng.</p>
	</footer>
</body>
</html>
