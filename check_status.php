<?php
$cookie_name = "uid";
$uid_isset = false;
$uid_isvalid = false;
if(!isset($_COOKIE[$cookie_name])) {
	$uid_isset = false;
} else {
	$uid_isset = true;
	$db = new SQLite3('cgi-bin/users.db') or die('Unable to open database');
	$uid = $_COOKIE[$cookie_name];
	$check = "SELECT * FROM users WHERE username = '$uid'";
	$result = $db->query($check) or die('xxxk');
	if($result->fetchArray()) {
		$uid_isvalid = true;
	} else {
		$uid_isvalid = false;
	}
	$db->close();
}
?>