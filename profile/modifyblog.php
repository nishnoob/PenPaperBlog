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
		<link rel="stylesheet" type="text/css" href="modifyblog.css">
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
		<article>
			<form>
				<div>
					<p>Select your post:</p>
					<select name="bid">
						<?php
							$random= new BlogProcess;
							$conn=$random->connectdb();
							$sql = "Select blog_id from blog_master natural join blogger_info where blogger_username='".$_SESSION["user"]."'";
							$result = $conn->query($sql);

							if($result->num_rows >0)
								while ($row = $result->fetch_assoc()){
									echo "<option value=". $row['blog_id'] .">" . $row['blog_id'] . "</option>";
								$bid=$row['blog_id'];
								}

								//if(empty($_GET['bid']))
								{
								//	$_GET['bid'] = $bid;
								}
							$sql = "Select * from blog_master natural join blogger_info where blogger_username ='". $_SESSION['user']."' and blog_id=".$_GET['bid'];
							$result = $conn->query($sql);
							if($result->num_rows > 0)
								while($row = $result->fetch_assoc()){
									$btitle=$row["blog_title"];
									$bdesc=$row["blog_desc"];
									$bcat=$row["blog_category"];
									$bper=$row["blog_is_active"];
								}

							$sql = "Select blogger_id from blogger_info where blogger_username ='". $_SESSION['user']."'";
							$result = $conn->query($sql);

							if($result->num_rows > 0)
								while($row = $result->fetch_assoc())
									$bloggerid=$row["blogger_id"];

							$conn->close();
						?>
					</select>
					<button type="submit" value="POST">SELECT</button>
				</div>
			</form>
		</article>
		<main>
			<form action="" id=myform method=POST>
				<table class=binpt>
					<tr>
						<td>Blog Title</td>
						<td><input type="text" name="btitle" value=<?php echo $btitle; ?> required></td>
					</tr>
					<tr>
						<td>Blog Description</td>
						<td><textarea name="bdesc" cols=50 rows=5  required><?php echo $bdesc;  ?></textarea></td>
					</tr>
					<tr>
						<td>Blog Category</td>
						<td><input type="text" name="bcat" value=<?php echo $bcat; ?> required></td>
					</tr>
					<tr>
						<td>Blog Active <div class=minor>Write "no" to delete.</div></td>
						<td><input type="text" name="bper" value=<?php echo $bper; ?> required></td>
					</tr>
					<tr>
						<td colspan="2" class=bc><button type="submit" value="POST">POST</button></td>
					</tr>
				</table>
			</form>
		</main>
		<?php
			if($_SERVER["REQUEST_METHOD"] == "POST") {
				$conn=$random->connectdb();

				$btitle=$_POST["btitle"];
				$bdesc=$_POST["bdesc"];
				$bcat=$_POST["bcat"];
				$bper=$_POST["bper"];

				$sql = "Select blogger_id from blogger_info where blogger_username ='". $_SESSION['user']."'";
				$result = $conn->query($sql);

				if($result->num_rows > 0)
					while($row = $result->fetch_assoc())
						$bid=$row["blogger_id"];

				$sql ="Update blog_master set blog_title='".$btitle."', blog_desc='".$bdesc."', blog_category='".$bcat."', updated_date=CURDATE(), blog_is_active='".$bper."' where blogger_id=".$bloggerid." and blog_id=".$bid;

				if ($conn->query($sql) === TRUE) {
    				echo "<script language=javascript>";
					echo "alert('UPDATED!')";
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