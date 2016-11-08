<?php
	include "../bucket.php";
	session_start();
	error_reporting(E_ALL & ~E_NOTICE);
	$randomb = new BlogSecurity;
	$randomb->redirect();
?>
<!DOCTYPE html>
	<head>
		<title>Pen & Paper - Profile</title>
		<link rel="stylesheet" type="text/css" href="createblog.css">
	</head>
	<body>
		<nav>
			<ul>
				<li><a href="../home/home.php">HOME</a></li>
				<li><a class=active href="profile.php">PROFILE</a></li>
				<?php
					$randomb->replacet();
				?>
				<li><a href="../about/about.php">ABOUT</a></li>
			</ul>
		</nav>
		<header>
			<h1>Pen & Paper</h1>
		</header>
		<main>
			<form action="" method=POST>
				<h3>Type in your new post:</h3>
				<table class=binpt>
					<tr>
						<td>Blog Title</td>
						<td><input type="text" name="btitle" required></td>
					</tr>
					<tr>
						<td>Blog Description</td>
						<td><textarea name="bdesc" cols=50 rows=5 required></textarea></td>
					</tr>
					<tr>
						<td>Blog Category</td>
						<td><input type="text" name="bcat" required></td>
					</tr>
					<tr>
						<td colspan="2" class=bc><button type="submit" value="POST">POST</button></td>
					</tr>
				</table>
			</form>
		</main>
		<?php
			if($_SERVER["REQUEST_METHOD"] == "POST") {
				$randb = new BlogProcess;
				$conn=$randb->connectdb();

				$btitle=$_POST["btitle"];
				$bdesc=$_POST["bdesc"];
				$bcat=$_POST["bcat"];

				$sql = "Select blogger_id from blogger_info where blogger_username ='". $_SESSION['user']."'";
				$result = $conn->query($sql);

				if($result->num_rows > 0)
					while($row = $result->fetch_assoc())
						$bid=$row["blogger_id"];

				$sql ="Insert into blog_master values(NULL,".$bid.",'".$btitle."','".$bdesc."','".$bcat."','yes',CURDATE(),NULL)";

				if ($conn->query($sql) === TRUE) {
    				echo "<script language=javascript>";
					echo "alert('ADDED!')";
					echo "</script>";
				} 
				else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
				$conn->close();
			}
		?>
	</body>
</html>