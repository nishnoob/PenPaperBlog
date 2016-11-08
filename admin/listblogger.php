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
		<link rel="stylesheet" type="text/css" href="listblogger.css">
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
				<?php
					$randb = new BlogProcess;
					$conn=$randb->connectdb();
					$sql="Select * from blogger_info";
					$result = $conn->query($sql);

					echo "<table class=blist>";
					echo "<tr>";
					echo 	"<td>Blogger ID</td>";
					echo 	"<td>Blogger Username</td>";
					echo 	"<td>Creation Date</td>";
					echo 	"<td>Updation Date</td>";
					echo 	"<td>End Date</td>";
					echo "</tr>";

					if($result->num_rows > 0)
						while($row = $result->fetch_assoc()){
							echo "<tr>";
							echo 	"<td>" . $row["blogger_id"] . "</td>";
							echo 	"<td>" . $row["blogger_username"] . "</td>";
							echo 	"<td>" . $row["blogger_creation_date"] . "</td>";
							
							if($row["blogger_updated_date"]==NULL)
								echo "<td> - </td>";
							else if($row["blogger_updated_date"]!=NULL)
								echo "<td>" . $row["blogger_updated_date"] . "</td>";

							if($row["blogger_end_date"]==NULL)
								echo "<td> - </td>";
							else if($row["blogger_end_date"]!=NULL)
								echo "<td>" . $row["blogger_end_date"] . "</td>";

							echo "</tr>";
					}

					echo "</table>";

					$conn->close();
				?>
			</article>
		</main>
	</body>
</html>