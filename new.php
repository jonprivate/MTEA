<?php
echo "ready to find you in DB";
$db = new SQLite3('users.db') or die('Unable to open database');
$check = "SELECT * FROM users WHERE sessionID = '$sid'";
echo "<br/>".$check."<br/>";
$result = $db->query("SELECT * FROM users WHERE sessionID = '5449701494c80'") or die('xxxk');
?>
