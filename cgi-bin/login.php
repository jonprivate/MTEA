<html>
<body style="background-color: orange;">
	<header class="tophead">
		<a href="http://jiong-liu.rochestercs.org/index.html">
		<h1>Mella Tea</h1>
		<h2>Enjoy a cup of life!</h2>
		</a>
	</header>
	
	<?php
	// access database and posted data
	$db = new SQLite3('users.db') or die('Unable to open database');
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	// check if the user already registered
	$check = "SELECT * FROM users WHERE username = '$username'";
	$result = $db->query($check);
	if($row = $result->fetchArray())
	{
		echo "Hello $username, welcome back!";
	} else
	{
		echo "Sorry, but you are not registered yet.";
		echo "<br/>";
		$link = <<<EOD
		<a href="http://jiong-liu.rochestercs.org/register.html">You can register here :)</a>
EOD;
		echo $link;
	}	
	echo "<br/>";
	?>
</body>
</html>


