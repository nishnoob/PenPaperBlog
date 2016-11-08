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
		<link rel="stylesheet" type="text/css" href="addblogger.css">
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
							<td>
								<select name="bid">
								<?php
									$randb= new BlogProcess;
									$conn=$randb->connectdb();
									$sql = "Select * from blogger_info";
									$result = $conn->query($sql);

									if($result->num_rows >0)
										while ($row = $result->fetch_assoc()){
											echo "<option value=". $row['blogger_id'] .">" . $row['blogger_id'] . "</option>";
										}
								?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Permission</td>
							<td><input type="text" name="bper" required></td>
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

						$bid=$_POST["bid"];
						$bper=$_POST["bper"];

						$sql ="UPDATE blogger_info SET blogger_is_active='".$bper."',blogger_updated_date=CURDATE() where blogger_id=".$bid;

				if ($conn->query($sql) === TRUE) {
    				echo "<script language=javascript>";
					echo "alert('UPDATED!')";
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