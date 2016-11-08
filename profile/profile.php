<?php
	include "../bucket.php";
	session_start();
	$randobs = new BlogSecurity;
	$randobs->redirect();
	error_reporting(E_ALL & ~E_NOTICE);
?>
<!DOCTYPE html>
	<head>
		<title>Pen & Paper - Profile</title>
		<link rel="stylesheet" type="text/css" href="profile.css">
	</head>
	<body>
		<nav>
			<ul>
				<li><a href="../home/home.php">HOME</a></li>
				<li><a class=active href="profile.php">PROFILE</a></li>
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
					$randomb->BloggerInfo();
				?>
			</table>
		</main>
		<article>
			<div id=btndec>
				<p>Create a BlogPost.</p>
				<p class=btd>Lets the user write a new BlogPost to put up on profile.</p>
				<a href="createblog.php" class="btn">WRITE</a>
			</div>
			<div id=btndec>
				<p>Modify a BlogPost.</p>
				<p class=btd>Lets the user modify or delete an existing BlogPost.</p>
				<a href="modifyblog.php" class="btn">MODIFY</a>
			</div>
		</article>
	</body>
</html>