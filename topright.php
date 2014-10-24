<div id="reg-log">
<?php
if($sid_isset && $sid_isvalid) {
	$greet_up = <<<EOD
	<div id="reg-log">
EOD;
	$greet = $greet_up . "Hi, " . $sid . "!<br/>";
	$greet_down = <<<EOD
	</div>
EOD;
	$greet = $greet . $greet_down;
	echo $greet;
} else {
	$reg_log = <<<EOD
	<div id="reg-log">
		<a href="register.php">register</a>
		<a href="login.php">login</a>
	</div>
EOD;
	echo $reg_log;
}

?>
</div>