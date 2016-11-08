<?php
	include "../bucket.php";
	session_start();
	error_reporting(E_ALL & ~E_NOTICE);
?>
<!DOCTYPE html>
	<head>
		<title>Pen & Paper - Home</title>
		<link rel="stylesheet" type="text/css" href="home.css">
	</head>
	<body>
		<nav>
			<ul>
				<li><a class=active href="home.php">HOME</a></li>
				<?php
					$randomb = new BlogSecurity;
					$randomb->replacea();
					$flag=$randomb->replacet();
				?>
				<li><a href="../about/about.php">ABOUT</a></li>
			</ul>
		</nav>
		<header>
			<h1>Pen & Paper</h1>
		</header>
		<main>
			<?php
				if($flag==1){
					echo "<span>";
					echo 	"<a href=home.php?pt=0 class=btn>ALL POSTS</a>";
					echo 	"<a href=home.php?pt=1 class=btn>MY POSTS</a>";
					echo "</span>";
				}
			?>
			<article>
				<?php
					$randomb = new BlogProcess;
					if($flag==1){
						$postt = $_GET["pt"];
						if ($postt==0) {
							$randomb->posts();
						}
						else{
							$randomb->postsBlogger();
						}
					}
					if($flag==0){
						$randomb->posts();
					}
				?>
			</article>
		</main>
	</body>
</html>