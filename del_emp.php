<?php include 'server_del_emp.php';?>

<!DOCTYPE html>
<html>
<head>
	<title>Delete Employee</title>
	<link rel="stylesheet" type="text/css" href="style_del_emp.css">
</head>
<body>
	<div><img src="2.jpeg" width=100% height=100% /></div>
	<div class="header">
		<h2 id="Company_name" >NIVI</h2>
		<h2 id="del_emp" >Delete Employee</h2>
	</div>
	<p id="home">
		<a href="homepage.php">Home</a>
	</p>

	<form  method='POST' action = "del_emp.php">	
	
		<p id="id">Employee Id</p><br/>
		<input type="text" name="emp_id" id= "emp_id" placeholder="Enter employee Id"  value= "<?php echo $emp_id; ?>" required>
		<button  name="search" id="search" >Search</button>

		<p id="fn">First Name</p><br/>
		<input type="text" name="firstname" id="firstname" value="<?php echo $fn; ?>" >
	
		<p id="ln">Last Name</p><br/>
		<input type="text" name="lastname" id= "lastname" value="<?php echo $ln; ?>">

		<p id="mob">Contact</p><br/>
		<input type="text" name="mobile" id= "mobile" value="<?php echo $mob; ?>">

		<p id="em">Email</p><br/>
		<input type="email" name="email" id= "email" value="<?php echo $em; ?>">

		<p id="dept">Department</p><br/>
		<input type="text" name="department" id= "department" value="<?php echo $dept; ?>">

		<p id="desg">Designation</p><br/>
		<input type="text" name="designation" id= "designation" value="<?php echo $desg; ?>">

		<p id="bsal">Basic Salary</p><br/>
		<input type="text" name="basic_Salary" id= "basicsal" value="<?php echo $bsal; ?>">

		<p id="doj">Date of joining</p><br/>
		<input type="day" name="day_join" id= "dayj" value="<?php echo $dj; ?>">
		<input type="month" name="month_join" id= "monthj" value="<?php echo $mj; ?>">
		<input type="year" name="year_join" id= "yearj" value="<?php echo $yj; ?>">

		<span id="error" class="error"><?php echo $Error;?></span>

		<button type = "submit" name="delete" id="delete">Delete</button>			
		<button  name="back" id="back" formnovalidate >Back</button>

	</form>	

</body>
</html>

