<!DOCTYPE html>
<html lang="en">
<!-------------------
  Header part
  ------------------>
<head>
	<meta charset="utf-8">
	<title>Mella-tea, enjoy a cup of life</title>
	<link rel="stylesheet" href="../CSS/main.css">
	<link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light|Indie+Flower|Poiret+One|Josefin+Sans|Gloria+Hallelujah|Pacifico|Dancing+Script|Coming+Soon|Fredoka+One|Playball|Permanent+Marker|Architects+Daughter|Rock+Salt|Crafty+Girls|Reenie+Beanie|Pinyon+Script|Satisfy|Kaushan+Script|Marck+Script|Tangerine' rel='stylesheet' type='text/css'>
</head>

<!-------------------
  Body part
  ------------------>
<body>
	<header class="tophead">
		<a href="index.html">
		<img id="toplogo" src="../images/coffee.gif" alt="coffee logo">
		</a>
		<h1>Mella Tea, enjoy a cup of life !</h1>
		<div id="reg-log">
			<a href="../register.html">register</a>
			<a href="../login.html">login</a>
		</div>
		<nav>
			<ul>
				<li><a href="../index.html">Home</a></li>
				<li><a href="../personal.html">Personal</a></li>
				<li><a href="../forum.html">Forum</a></li>
				<li><a href="../contact.html">Contact</a></li>
			</ul>
		<nav>
		
	</header>
	<section>
	<?php
	// access database and posted data
	$db = new SQLite3('users.db') or die('Unable to open database');
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	// check if the user already registered
	$check = "SELECT * FROM users WHERE username = '$username'";
	$result = $db->query($check);
	if($row = $result->fetchArray())
	{
		echo "Sorry, but you already exist<br/>";
		$link = <<<EOD
		<a href="../login.php">You can login here</a>
EOD;
		echo $link;
	} else
	{
		// insert the new user
		$query = <<<EOD
		INSERT INTO users VALUES ('$username', '$email', '$password', null);
EOD;
		$db->exec($query) or die("Unable to add user $username");

		echo "Welcome, $username!";
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

	}
	echo "<br/>";
	?>
	</section>

	<footer>
		<p>&copy; 2014 Jiong Liu and Juncheng Feng.</p>
	</footer>

</body>
</html>


