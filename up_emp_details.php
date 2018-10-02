<?php include 'server_up_emp_details.php';?>

<!DOCTYPE html>
<html>
<head>
	<title>Employee Update</title>
	<link rel="stylesheet" type="text/css" href="style_add_update_emp.css">
</head>
<body>
	<div><img src="2.jpeg" width=100% height=100% /></div>
	<div class="header">
		<h2 id="Company_name" >NIVI</h2>
		<h2 id="emp_up" >Employee Update</h2>
		<h2 id="pd" >Personal Details :</h2>
		<h2 id="cd" >Contact Details :</h2>
		<h2 id="jd" >Job Details :</h2>
	</div>
	<p id="home">
		<a href="homepage.php">Home</a>
	</p>


	<form  method='POST' action="up_emp_details.php">	
	
		<p id="id">Employee Id</p><br/>
		<input type="text" name="emp_id" id= "empid1" placeholder="Enter employee Id" value="<?php echo $emp_id; ?>" disabled>

		<p id="fn">First Name</p><br/>
		<input type="text" pattern="[A-Za-z]{1,15}" name="firstname" id="firstname" placeholder="Enter Firstname" value="<?php echo $fn; ?>" required>
	
		<p id="ln">Last Name</p><br/>
		<input type="text" pattern="[A-Za-z]{1,15}" name="lastname" id= "lastname" placeholder="Enter Lastname" value="<?php echo $ln; ?>" required>

		<p id="dob">Date of birth</p><br/>
		<input type="number" min="1" max="31" name="day" id= "day" placeholder="dd" value="<?php echo $dd; ?>" required>
		<input type="number" min="1" max="12" name="month" id= "month" placeholder="mm" value="<?php echo $mm; ?>" required>
		<input type="number" min="1900" max="2017" name="year" id= "year" placeholder="yyyy" value="<?php echo $yy; ?>" required>

		<p id="gn">Gender</p><br/>
		<input type="radio" name="gender" value="M" id="male" <?php echo ($gn == "M")?' checked':'' ?>>		
		<p id="m">Male</p>
		<input type="radio" name="gender" value="F" id="female" <?php echo ($gn == "F")?' checked':'' ?>>	
		<p id="f">Female</p>

		<p id="mob">Contact</p><br/>
		<input type="tel" pattern= "^\d{10}$" name="mobile" id= "mobile" placeholder="Enter Mobile No" value="<?php echo $mob; ?>" required>

		<p id="em">Email</p><br/>
		<input type="email" name="email" id= "email" placeholder="Enter email Id" value="<?php echo $em; ?>" required>

		<p id="add">Address</p><br/>
		<textarea type="text" cols="40" rows="2" name="address" id= "address" placeholder="Enter Address" required><?php echo $add ;?> </textarea>


		<p id="dept">Department</p><br/>
		<input type="text" pattern="[A-Za-z\s]{1,15}" name="department" id= "department" placeholder="Enter Department" value="<?php echo $dept; ?>" required>

		<p id="desg">Designation</p><br/>
		<input type="text" pattern="[A-Za-z\s]{1,15}" name="designation" id= "designation" placeholder="Enter Designation" value="<?php echo $desg; ?>" required>

		<p id="bsal">Basic Salary</p><br/>
		<input type="number" min="1" name="basic_sal" id= "basicsal" placeholder="Enter Basic Salary" value="<?php echo $bsal; ?>" required>

		<p id="doj">Date of joining</p><br/>
		<input type="number" min="1" max="31" name="day_join" id= "dayj" placeholder="dd" value="<?php echo $dj; ?>" required>
		<input type="number" min="1" max="12" name="month_join" id= "monthj" placeholder="mm" value="<?php echo $mj; ?>" required>
		<input type="number" min="1900" max="2017" name="year_join" id= "yearj" placeholder="yyyy" value="<?php echo $yj; ?>" required>

		<button  name="save_changes" id="save_changes" >Save changes</button>
		<button  name="clear" id="clear" >Clear</button>

		<span id="error" class="error"><?php echo $Error;?></span>

	</form>	

	<form method = "POST">
		<button  name="back" id="back" >Back</button>
	</form>

</body>
</html>


