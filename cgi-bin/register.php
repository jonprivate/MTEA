<html>
<body style="background-color: orange;">
	<header class="tophead">
		<a href="http://jiong-liu.rochestercs.org/index.html">
		<h1>Mella Tea</h1>
		<h2>Enjoy a cup of life</h2>
		</a>
	</header>

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
		<a href="http://jiong-liu.rochestercs.org/login.html">You can login here</a>
EOD;
		echo $link;
	} else
	{
		// insert the new user
		$query = <<<EOD
		INSERT INTO users VALUES ('$username', '$email', '$password')
EOD;
		$db->exec($query) or die("Unable to add user $username");

		echo "Welcome, $username!";
	}
	echo "<br/>";
	?>
</body>
</html>


