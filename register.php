<?php
$cookie_name = "sid";
$sid_isset = false;
$sid_isvalid = false;
if(!isset($_COOKIE[$cookie_name])) {
	$sid_isset = false;
} else {
	$sid_isset = true;
	$db = new SQLite3('cgi-bin/users.db') or die('Unable to open database');
	$sid = $_COOKIE[$cookie_name];
	$check = "SELECT * FROM users WHERE sessionID = '$sid'";
	$result = $db->query($check) or die('xxxk');
	if($result->fetchArray()) {
		$sid_isvalid = true;
	} else {
		$sid_isvalid = false;
	}
}
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
		$form_reg = <<<EOD
		<div class="body-title-font">
		<h3 class="body-title-font">Register</h3>
		<form method="post" action="cgi-bin/register.php">
		<input class="type-in" name="username" type=text size="50" placeholder="Username"/><br/>
		<input class="type-in" name="email" type=text size="50" placeholder="Email"/><br/>
		<input class="type-in" name="password" type="password" size="50" placeholder="Password"/><br/>
		<input id="submit-form" type="submit" value="Sign up"/>
		</form>
		</div>	
EOD;
		if(!$sid_isset) {
			echo $form_reg;
		} else {
			if($sid_isvalid) {
				echo "welcome";
			} else {
				echo $form_reg;
			}
		}
		?>
		
	</section>

	<footer>
		<p>&copy; 2014 Jiong Liu and Juncheng Feng.</p>
	</footer>
</body>
</html>
