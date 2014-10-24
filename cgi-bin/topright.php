<?php
if($uid_isset && $uid_isvalid) {
	$greet_up = <<<EOD
	<div id="reg-log">

EOD;
	$greet = $greet_up . "Hi, " . $uid . "!<br/>";
	$greet_down = <<<EOD

	</div>

EOD;
	$greet = $greet . $greet_down;
	echo $greet;
} else {
	$reg_log = <<<EOD
	<div id="reg-log">
		<a href="../register.php">register</a>
		<a href="../login.php">login</a>
	</div>

EOD;
	echo $reg_log;
}

?>
