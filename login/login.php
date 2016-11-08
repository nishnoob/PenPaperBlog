<?php
	session_start();
	include "../bucket.php"
?>
<!DOCTYPE html>
	<head>
		<title>Pen & Paper - Login</title>
		<link rel="stylesheet" type="text/css" href="login.css">
	</head>
	<body>
		<?php
			$flag = 0;
			$randomb = new BlogProcess;

			//Submission check
			if($_SERVER["REQUEST_METHOD"] == "POST") {
				$uname = $randomb->cleanit($_POST["user"]);
				$pass = md5($randomb->cleanit($_POST["pass"]));
			
				//ADMIN LOGIN
				if($uname=="admin" && $pass==md5("admin")){
					$_SESSION["user"]="u14co012";
					header("Location: ../home/home.php");
					$flag = 1;
				}

				//BLOGGER ID LOGIN
				$conn=$randomb->connectdb();

				$sql="Select * from blogger_info";
				$result = $conn->query($sql);

				if($result->num_rows >0)
					while($row = $result->fetch_assoc())
						if($uname == $row["blogger_username"] && $pass == $row["blogger_password"]){
							$_SESSION["user"]=$row["blogger_username"];
							header("Location: ../home/home.php?pt=1");
							$flag=1;
							break;
						}
				if($flag==0){
					echo "<script language=javascript>";
					echo "alert('Wrong username or password!')";
					echo "</script>";
				}
				$conn->close();
			}
		?>
		<nav>
			<ul>
				<li><a href="../home/home.php">HOME</a></li>
				<li><a href="../profile/profile.php">PROFILE</a></li>
				<li><a class=active href="login.php">LOGIN</a></li>
				<li><a href="../about/about.php">ABOUT</a></li>
			</ul>
		</nav>
		<header>
			<h1>Pen & Paper</h1>
		</header>
		<main>
			<form method=POST action=login.php>
				<div>
					<input type=text name=user placeholder=Username class=ipd required><br>
					<input type=password name=pass placeholder=Password class=ipd required><br>
					<input type=submit class=lgbtn value=LOGIN>
					<a href="signup.php">Signup</a>
				</div>
			</form>
		</main>
	</body>
</html>