<!DOCTYPE html>
<html lang="en">
<!-------------------
  Header part
  ------------------>
<head>
	<meta charset="utf-8">
	<title>Mella-tea, enjoy a cup of life</title>
	<link rel="stylesheet" href="CSS/main.css">
	<link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light|Indie+Flower|Poiret+One|Josefin+Sans|Gloria+Hallelujah|Pacifico|Dancing+Script|Coming+Soon|Fredoka+One|Playball|Permanent+Marker|Architects+Daughter|Rock+Salt|Crafty+Girls|Reenie+Beanie|Pinyon+Script|Satisfy|Kaushan+Script|Marck+Script|Tangerine' rel='stylesheet' type='text/css'>
	<!--
	<script type="text/javascript" src="simplemethods.js"></script>
	-->
</head>

<!-------------------
  Body part
  ------------------>
<body>
	<header class="tophead">
		<a href="index.php">
		<img id="toplogo" src="images/coffee.gif" alt="coffee logo">
		</a>
		<h1>Mella Tea, enjoy a cup of life !</h1>
		<div id="reg-log">
			<a href="register.php">register</a>
			<a href="login.php">login</a>
		</div>
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
		$cookie_name = "sid";
		if(!isset($_COOKIE[$cookie_name])) {
			echo "not signed in";
		} else {
			$db = new SQLite3('cgi-bin/users.db') or die('Unable to open database');
			$sid = $_COOKIE[$cookie_name];
			$check = "SELECT * FROM users WHERE sessionID = '$sid'";
			$result = $db->query($check) or die('xxxk');
			echo $result->numColumns;
			if($result->fetchArray()) {
				echo "welcome";
			} else {
				echo "sorry, session error";
			}
		}
		?>
	</section>

	<footer>
		<p>&copy; 2014 Jiong Liu and Juncheng Feng.</p>
	</footer>
</body>
</html>
