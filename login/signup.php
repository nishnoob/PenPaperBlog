<?php
	include "../bucket.php";
	session_start();
	error_reporting(E_ALL & ~E_NOTICE);
	$randomb = new BlogSecurity;
?>
<!DOCTYPE html>
	<head>
		<title>Pen & Paper - Signup</title>
		<link rel="stylesheet" type="text/css" href="signup.css">
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
				<form action="" method=POST>
					<table class=binpt>
						<tr>
							<td>Username</td>
							<td><input type="text" name="buname" required></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type=password name="bpass" required></textarea></td>
						</tr>
						<tr>
							<td colspan="2" class=bc><button type="submit" value="POST">ADD</button></td>
						</tr>
					</table>
				</form>
				<?php
					if($_SERVER["REQUEST_METHOD"] == "POST") {
						$randb = new BlogProcess;
						$conn=$randb->connectdb();

						$buname=$_POST["buname"];
						$bpass=$_POST["bpass"];

						$sql ="Insert into blogger_info values(NULL,'".$buname."','".$bpass."',CURDATE(),'yes',NULL ,NULL)";

				if ($conn->query($sql) === TRUE) {
    				echo "<script language=javascript>";
					echo "alert('ADDED!')";
					echo "</script>";
				} 
				else {
					echo $conn->error;
				}
				$conn->close();
			}
				?>
			</article>
		</main>
	</body>
</html>