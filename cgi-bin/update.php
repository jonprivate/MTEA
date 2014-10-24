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
	<link rel="stylesheet" href="../CSS/main.css">
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
	$cookie_name = "uid";
	$username = $_COOKIE[$cookie_name];
	$old_password = $_POST['old_password'];
	$new_password = $_POST['new_password'];
	// check if the user already registered
	$db = new SQLite3('users.db') or die('Unable to open database');
	$check = "SELECT * FROM users WHERE username = '$username' AND password = '$old_password'";
	$result = $db->query($check);
	if($row = $result->fetchArray()) {
		$update = "UPDATE users SET password = '$new_password' WHERE username = '$username'";
		$db->exec($update) or die('Unable to set the password');
		echo "Your new password has been set";
	} else {
		echo "Sorry, the old password is not correct, please try again <a href='./changeset.php'>here</a>";
	}
	$db->close();
	?>
	</section>

	<footer>
		<p>&copy; 2014 Jiong Liu and Juncheng Feng.</p>
	</footer>

</body>
</html>
