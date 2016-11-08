<?php
	class BlogProcess{
		private $blogger_id;
		private $blog_title;
		private $blog_category;
		private $blog_desc;
		private $creation_date;
		private $conn;
		function cleanit($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
		}

		function connectdb(){
				$this->conn = mysqli_connect("localhost", "root", "","blog");
				
				if(!$this->conn)
					die("Connection failed: " . mysqli_connect_error());
				
				//echo "Connected succesfully";
				return $this->conn;
		}

		function posts(){

			$this->connectdb();

			$sql="Select * from blog_master natural join blogger_info where blog_is_active='yes' and blogger_is_active='yes'";
			$result = $this->conn->query($sql);

			if($result->num_rows > 0)
					while($row = $result->fetch_assoc()){
						echo "<div id=post>";
						echo 	"<a id=h2 href='postexpand.php?blid=".$row["blog_id"]."'>" . $row["blog_title"] . "</a>";
						echo 	"<div>";
						echo 		"<p id=postdetail>" . $row["blog_category"] . "</p>";
						echo 		"<p id=postdetail>" .$row["creation_date"] . "</p>";
						echo 	"</div>";
						echo 	"<div id=postdesc>";
						echo 		"<p>" . $row["blog_desc"] . "</p>";
						echo 	"</div>";
						echo 	"<a href='authorinfo.php?bid=".$row["blogger_id"]."' id=postdetail>" . $row["blogger_username"] . "</a>";
						echo "</div>";
					}
			$this->conn->close();
		}

		function postsBlogger(){

			$this->connectdb();
			$sql="Select * from blog_master natural join blogger_info where blogger_username='" . $_SESSION["user"] . "' and blog_is_active='yes' and blogger_is_active='yes'";
			$result = $this->conn->query($sql);

			if($result->num_rows > 0)
					while($row = $result->fetch_assoc()){
						echo "<div id=post>";
						echo 	"<a id=h2 href='postexpand.php?blid=".$row["blog_id"]."'>" . $row["blog_title"] . "</a>";
						echo 	"<div id=postdetail>";
						echo 		"<p>" . $row["blog_category"] . "</p>";
						echo 		"<p>" .$row["creation_date"] . "</p>";
						echo 	"</div>";
						echo 	"<div id=postdesc>";
						echo 		"<p>" . $row["blog_desc"] . "</p>";
						echo 	"</div>";
						echo 	"<p id=postdetail>" . $row["blogger_username"] . "</p>";
						echo "</div>";
					}
			$this->conn->close();
		}

		function postsBloggerLogout($input){

			$this->connectdb();
			$sql="Select * from blog_master where blogger_id=" . $input . " and blog_is_active='yes'";
			$result = $this->conn->query($sql);

			if($result->num_rows > 0)
					while($row = $result->fetch_assoc()){
						echo "<div id=post>";
						echo 	"<a id=h2 href='postexpand.php?blid=".$row["blog_id"]."'>" . $row["blog_title"] . "</a>";
						echo 	"<div id=postdetail>";
						echo 		"<p>" . $row["blog_category"] . "</p>";
						echo 		"<p>" .$row["creation_date"] . "</p>";
						echo 	"</div>";
						echo 	"<div id=postdesc>";
						echo 		"<p>" . $row["blog_desc"] . "</p>";
						echo 	"</div>";
						echo "</div>";
					}
			$this->conn->close();
		}

		function BloggerInfo(){

			$this->connectdb();
			$sql="Select * from blogger_info where blogger_username='" . $_SESSION["user"] . "'";
			$result = $this->conn->query($sql);

			if($result->num_rows > 0)
					while($row = $result->fetch_assoc()){
						echo "<table class=binfo>";
						echo "<tr>";
						echo 	"<td>Blogger ID:</td>";
						echo 	"<td>" . $row["blogger_id"] . "</td>";
						echo "</tr>";
						echo "<tr>";
						echo 	"<td>Blogger Username:</td>";
						echo 	"<td>" . $row["blogger_username"] . "</td>";
						echo "</tr>";
						echo "<tr>";
						echo 	"<td>Blogger Password:</td>";
						echo 	"<td>" . $row["blogger_password"] . "</td>";
						echo "</tr>";
						echo "<tr>";
						echo 	"<td>Creation Date:</td>";
						echo 	"<td>" . $row["blogger_creation_date"] . "</td>";
						echo "</tr>";
						echo "<tr>";
						echo 	"<td>Updation Date:</td>";
						echo 	"<td>" . $row["blogger_updated_date"] . "</td>";
						echo "</tr>";
						echo "</table>";
					}
			$this->conn->close();
		}
		function BloggerInfoLogout($input){

			$this->connectdb();
			$sql="Select * from blogger_info where blogger_id=".$input;
			$result = $this->conn->query($sql);

			if($result->num_rows > 0)
					while($row = $result->fetch_assoc()){
						echo "<table class=binfo>";
						echo "<tr>";
						echo 	"<td>Blogger ID:</td>";
						echo 	"<td>" . $row["blogger_id"] . "</td>";
						echo "</tr>";
						echo "<tr>";
						echo 	"<td>Blogger Username:</td>";
						echo 	"<td>" . $row["blogger_username"] . "</td>";
						echo "</tr>";
						echo "<tr>";
						echo 	"<td>Creation Date:</td>";
						echo 	"<td>" . $row["blogger_creation_date"] . "</td>";
						echo "</tr>";
						echo "<tr>";
						echo 	"<td>Updation Date:</td>";
						echo 	"<td>" . $row["blogger_updated_date"] . "</td>";
						echo "</tr>";
						echo "</table>";
					}
			$this->conn->close();
		}
	}

	class BlogSecurity{

		function redirect(){
			$flag=0;
			$randb = new BlogProcess();
			$conn=$randb->connectdb();
			$sql="Select blogger_username from blogger_info";
			$result = $conn->query($sql);

			if($_SESSION["user"] == "u14co012")
				$flag=1;

			if($result->num_rows >0)
				while($row = $result->fetch_assoc())
					if($_SESSION["user"] == $row["blogger_username"]){
						$flag=1;
						break;
					}

			if($flag==0)
				header("Location: ../login/login.php");
			
			$conn->close();
		}

		function replacet(){
			$flag=0;
			$randb = new BlogProcess();
			$conn=$randb->connectdb();
			$sql="Select blogger_username from blogger_info";
			$result = $conn->query($sql);

			if($_SESSION["user"] == "u14co012")
				$flag=1;

			if($result->num_rows >0)
				while($row = $result->fetch_assoc())
					if($_SESSION["user"] == $row["blogger_username"]){
						$flag=1;
						break;
					}

			if($flag==0)
				echo"<li><a href='../login/login.php'>LOGIN</a></li>";
			else if($flag==1)
				echo"<li><a href='../logout.php'>LOGOUT</a></li>";
			$conn->close();
			
			return $flag;
		}
		function replacea(){
			$flag=0;

			if($_SESSION["user"] == "u14co012")
				$flag=1;

			if($flag==0)
				echo"<li><a href='../profile/profile.php'>PROFILE</a></li>";
			else if($flag==1)
				echo"<li><a class=activea href='../admin/admin.php'>SETTINGS</a></li>";
		}
	}
?>