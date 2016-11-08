<?php
	include "../bucket.php";
	session_start();
	$randobs = new BlogSecurity;
	error_reporting(E_ALL & ~E_NOTICE);
?>
<!DOCTYPE html>
	<head>
		<title>Pen & Paper - Post</title>
		<link rel="stylesheet" type="text/css" href="postexpand.css">
	</head>
	<body>
		<nav>
			<ul>
				<li><a class=active href="home.php">HOME</a></li>
				<li><a href="../profile/profile.php">PROFILE</a></li>
				<?php
					$randobs->replacet();
				?>
				<li><a href="../about/about.php">ABOUT</a></li>
			</ul>
		</nav>
		<header>
			<h1>Pen & Paper</h1>
		</header>
		<article>
			<?php
				$random = new BlogProcess();
				$conn=$random->connectdb();

				$sql="Select * from blog_master where blog_id=".$_GET['blid'];
				$result = $conn->query($sql);

				if($result->num_rows > 0)
					while($row = $result->fetch_assoc()){
						echo "<div id=post>";
						echo 	"<h2>" . $row["blog_title"] . "</h2>";
						echo 	"<div>";
						echo 		"<p id=postdetail>" . $row["blog_category"] . "</p>";
						echo 		"<p id=postdetail>" .$row["creation_date"] . "</p>";
						echo 	"</div>";
						echo 	"<div id=postdesc>";
						echo 		"<p>" . $row["blog_desc"] . "</p>";
						echo 	"</div>";
						echo 	"<p id=postdetail>" . $row["blogger_username"] . "</p>";
						echo "</div>";
					}
				$conn->close();
			?>
		</article>
	</body>
</html>