<?php include 'connectivity.php'?>
<?php

	session_start();

	if(isset($_POST['yes'])){
//		session_destroy();
		$_SESSION['content'] = "Logged out successfully";
		header('Location:template.php');
	}
	if(isset($_POST['no'])){
		header('Location:homepage.php');
	}	
	mysqli_close($con);
?>
<!DOCTYPE html>

<html>
<head>
	<title>Logout page</title>
	<link rel="stylesheet" type="text/css" href="style_login_chpwd_logout_del.css">
</head>
<body>
	<div><img src="2.jpeg" width=100% height=100% /></div>
	<div class="header">
		<h2 id="logout_header">Are you sure you want to logout?</h2>
	</div>
	
	<form action='logout.php' method='POST' >	
		<button type="submit" name="yes" id="yes" >Yes</button><br/>
		<button type="submit" name="no" id="no" >No</button><br/>
	</form>	

</body>
</html>

