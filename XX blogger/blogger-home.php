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
		<nav>
			<ul>
				<li><a href="../home/home.php">HOME</a></li>
				<li><a href="../profile/profile.php">PROFILE</a></li>
				<li><a href="../logout.php">LOGOUT</a></li>
				<li><a href="../about/about.html">ABOUT</a></li>
			</ul>
		</nav>
		<header>
			<h1>Pen & Paper</h1>
		</header>
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