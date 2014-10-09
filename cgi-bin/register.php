<html>
<body style="background-color: orange;">
<!--Greeting the user-->
	Hi <?php echo "{$_POST['username']}"; ?>.<br/>
	Your email: <?php echo "{$_POST['email']}"; ?><br/>

<!--Interact with database-->
	<?php
	// access database and posted data
	$db = new SQLite3('users.db') or die('Unable to open database');
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	// list database content before insertion
	$result = $db->query('SELECT * FROM users') or die('Query failed');
	echo "Username\t|\tEmail\t|\tPassword<br/>";
	while($row = $result->fetchArray())
	{
		echo "{$row['username']}\t|\t{$row['email']}\t|\t{$row['password']}<br/>";
	}

	// insert the new user
	$query = <<<EOD
	INSERT INTO users VALUES ('$username', '$email', '$password')
EOD;
	$db->exec($query) or die("Unable to add user $username");

	// list database content after insertion
	echo "<br/>";
	echo "After insertion:<br/>";
	echo "Username\t|\tEmail\t|\tPassword<br/>";
	while($row = $result->fetchArray())
	{
		echo "{$row['username']}\t|\t{$row['email']}\t|\t{$row['password']}<br/>";
	}
	?>
</body>
</html>


