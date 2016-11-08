<?php
	include "../bucket.php";
	session_start();
	error_reporting(E_ALL & ~E_NOTICE);
	$randomb = new BlogSecurity;
	$randomb->redirect();
?>
<!DOCTYPE html>
	<head>
		<title>Pen & Paper - Settings</title>
		<link rel="stylesheet" type="text/css" href="admin.css">
	</head>
	<body>
		<nav>
			<ul>
				<li><a href="../home/home.php">HOME</a></li>
				<?php
					$randomb->replacea();
					$randomb->replacet();
				?>
				<li><a href="../about/about.php">ABOUT</a></li>
			</ul>
		</nav>
		<header>
			<h1>Pen & Paper</h1>
		</header>
		<main>
			<article>
				<div id=btndec>
					<p>List all the Bloggers.</p>
					<p class=btd>Shows the list and info of all the bloggers in the database.</p>
					<a href="listblogger.php" class="btn">SHOW</a>
				</div>
				<div id=btndec>
					<p>Add a new Blogger.</p>
					<p class=btd>Add a new blogger to the database and set the details.</p>
					<a href="addblogger.php" class="btn">ADD</a>
				</div>
				<div id=btndec>
					<p>Blogger permissions.</p>
					<p class=btd>Update the permission of a Blogger to write new blog posts.</p>
					<a href="bloggerper.php" class="btn">MODIFY</a>
				</div>
			</article>
		</main>
	</body>
</html>