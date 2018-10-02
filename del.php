<?php include 'connectivity.php'?>
<?php

	session_start();
	if(isset($_POST['yes'])){
		$emp_id = $_SESSION['emp_id'];	
		$sql = "delete employee from employee inner join contact inner join job where employee.id = '$emp_id' ;";
		$result = mysqli_query($con,$sql);

		$_SESSION['emp_id'] ="";
	
		if($result){
			$_SESSION['content'] = "Employee Deleted successfully";
			header('Location:template.php');
		}
	}
	if(isset($_POST['no'])){
		$_SESSION['emp_id'] ="";
		header('Location:homepage.php');
	}	
	mysqli_close($con);
?>
<!DOCTYPE html>

<html>
<head>
	<title>Delete page</title>
	<link rel="stylesheet" type="text/css" href="style_login_chpwd_logout_del.css">
</head>
<body>
	<div><img src="2.jpeg" width=100% height=100% /></div>
	<div class="header">
		<h2 id="delete_header">Are you sure you want to delete employee?</h2>
	</div>
	
	<form action='del.php' method='POST' >	
		<button type="submit" name="yes" id="yes" >Yes</button><br/>
		<button type="submit" name="no" id="no" >No</button><br/>
	</form>	

</body>
</html>

