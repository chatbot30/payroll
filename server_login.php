<?php include 'connectivity.php'?>
<?php
$un = "";
$pwd = "";
$Error = "";

	session_start();

	if(isset($_POST['login'])){
		$un = $_POST['username'];
		$pwd = $_POST['password'];

		$sql = "select * from login where username = '$un' ";
		$result = mysqli_query($con,$sql);
		$row = $result->fetch_assoc();
		if(mysqli_num_rows($result) == 1){
			if($pwd == $row['password']){
				$_SESSION['username'] = $un;
				$_SESSION['password'] = $pwd;
				header('Location:homepage.php');
			}
			else{
				$Error = "*Incorrect Password";		
			}
		}
		else{
			$Error = "*Incorrect Username";
		}

	}
	
	mysqli_close($con);
?>

