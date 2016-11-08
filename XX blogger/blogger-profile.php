<?php
	include "../bucket.php";
	session_start();
	$randomb = new BlogSecurity;
	$randomb->redirect();
?>
<!DOCTYPE html>
	<head>
		<title>Ruya - Home</title>
		<link rel="stylesheet" type="text/css" href="blogger-home.css">
	</head>
	<body>
		<header>
			<h1>Pen & Paper</h1>
		</header>
		<nav>
			<ul>
				<li><a href="../home/home.php">Home</a></li>
				<li><a href="profile.php">Profile</a></li>
				<li><a href="../logout.php">Logout</a></li>
				<li><a href="about.html">About</a></li>
			</ul>
		</nav>
		<main>
			<article>
				<?php
					$randomb = new BlogProcess;
					$randomb->postsBlogger();
				?>
			</article>
		</main>
	</body>
</html>