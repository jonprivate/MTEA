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
	$form_reg = <<<EOD
		<div class="body-title-font">
		<h3 class="body-title-font">Update your password</h3>
		<form method="post" action="./update.php">
		<input class="type-in" name="old_password" type="password" size="50" placeholder="Old password"/><br/>
		<input class="type-in" name="new_password" type="password" size="50" placeholder="New password"/><br/>
		<input id="submit-form" type="submit" value="Update"/>
		</form>
		</div>
EOD;
	if(!$uid_isset || !$uid_isvalid) {
		// access database and posted data
		$link = <<<EOD
		<a href="../login.php">Please first log in :)</a>
EOD;
			echo $link;
	} else {
		echo $form_reg;
	}
	?>
	</section>

	<footer>
		<p>&copy; 2014 Jiong Liu and Juncheng Feng.</p>
	</footer>

</body>
</html>


