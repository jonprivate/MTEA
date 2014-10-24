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
		<a href="../index.php">
		<img id="toplogo" src="../images/coffee.gif" alt="coffee logo">
		</a>
		<h1>Mella Tea, enjoy a cup of life !</h1>
		<?php
		include 'topright.php';
		?>
		<nav>
			<ul>
				<li><a href="../index.php">Home</a></li>
				<li><a href="../personal.html">Personal</a></li>
				<li><a href="../forum.html">Forum</a></li>
				<li><a href="../contact.html">Contact</a></li>
			</ul>
		<nav>
		
	</header>
	<section>

	<?php
	if(!$sid_isset || !$sid_isvalid) {
		// access database and posted data
		$db = new SQLite3('users.db') or die('Unable to open database');
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		// check if the user already registered
		$check = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		$result = $db->query($check);
		if($row = $result->fetchArray())
		{
			echo "Hello $username, welcome back!";
			$cookie_name = "user";
			$cookie_value = $username; 
			setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
			$cookie_name = "sid";
			$cookie_value = uniqid(); 
			setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
			$query = <<<EOD
			UPDATE users SET sessionID = '$cookie_value' WHERE username = '$username';
EOD;
			echo "<br/>";
			echo $query;
			echo "<br/>";
			$db->exec($query) or die("Unable to set session id for user $username");

		} else
		{
			echo "Sorry, but you are not registered yet.";
			echo "<br/>";
			$link = <<<EOD
			<a href="../register.php">You can register here :)</a>
EOD;
			echo $link;
		}	
		echo "<br/>";
	} else {
		echo "welcome";
	}
	
	?>
	</section>

	<footer>
		<p>&copy; 2014 Jiong Liu and Juncheng Feng.</p>
	</footer>

</body>
</html>


