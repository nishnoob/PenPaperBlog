<?php
	include "../bucket.php";
	session_start();
	$randobs = new BlogSecurity;
	error_reporting(E_ALL & ~E_NOTICE);
?>
<!DOCTYPE html>
	<head>
		<title>Pen & Paper - Blogger Info</title>
		<link rel="stylesheet" type="text/css" href="authorinfo.css">
	</head>
	<body>
		<nav>
			<ul>
				<li><a href="home.php">HOME</a></li>
				<li><a class=active href="../profile/profile.php">PROFILE</a></li>
				<?php
					$randobs->replacet();
				?>
				<li><a href="../about/about.php">ABOUT</a></li>
			</ul>
		</nav>
		<header>
			<h1>Pen & Paper</h1>
		</header>
		<main>
			<table>
				<?php
					$randomb = new BlogProcess;
					$randomb->BloggerInfoLogout($_GET["bid"]);
				?>
			</table>
		</main>
		<article>
			<?php
				$randomb->postsBloggerLogout($_GET["bid"]);
			?>
		</article>
	</body>
</html>