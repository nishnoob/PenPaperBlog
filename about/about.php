<?php
	include "../bucket.php";
	session_start();
	$randobs = new BlogSecurity;
	error_reporting(E_ALL & ~E_NOTICE);
?>
<!DOCTYPE html>
	<head>
		<title>Pen & Paper - About</title>
		<link rel="stylesheet" type="text/css" href="about.css">
	</head>
	<body>
		<nav>
			<ul>
				<li><a href="../home/home.php">HOME</a></li>
				<li><a href="../profile/profile.php">PROFILE</a></li>
				<?php
					$randobs->replacet();
				?>
				<li><a href="about.html">ABOUT</a></li>
			</ul>
		</nav>
		<header>
			<h1>Pen & Paper</h1>
		</header>
		<article>
			<h3>About the developer:</h3>
			<p>Agnish Mukherjee</p>
			<p>Registration No.: U14CO012</p>
			<br><br>
			<h3>Contact Us:</h3>
			<p>Mail: abc@gmail.com</p>
			<p>Phone No.: 0261-12345678</p>
		</article>
	</body>
</html>