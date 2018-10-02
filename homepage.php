<?php
	session_start();
	if(isset($_POST['Add_emp'])){
		$_SESSION['task'] = 'add_emp';
		header('Location:add_emp.php');	
	}
	if(isset($_POST['View_emp'])){
		header('Location:view_emp.php');
	}
	if(isset($_POST['Search'])){
		header('Location:search.php');
	}
	if(isset($_POST['Del_emp'])){
		header('Location:del_emp.php');
	}
	if(isset($_POST['Up_sal'])){
		header('Location:up_sal.php');
	}
	if(isset($_POST['Payslip'])){
		header('Location:payslip.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css" href="style_homepage.css">
</head>
<body>
	<div><img src="2.jpeg" width=100% height=100% /></div>
	<div class="header">
		<h2 id="Company_name" >NIVI</h2>
	</div>

	<p id="ch_pwd">
		<a href="ch_pwd.php">Change Password</a>
	</p>
	<p id="logout">
		<a href="logout.php">Logout</a>
	</p>

	<form method="POST" action="homepage.php">
		<button name="Add_emp" 	id="add_emp" >	Add Employee</button>
		<button name="View_emp" id="view_emp" >	View all Employees</button>
		<button name="Search" 	id="search" >	Search Employee</button>
		<button name="Del_emp" 	id="del_emp" >	Delete Employee</button>
		<button name="Up_sal" 	id="up_sal" >	Update Salary</button>
		<button name="Payslip" 	id="payslip" >	Payslip</button>
	</form>
</body>
</html>


