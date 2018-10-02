<?php include 'server_search.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>Search Employee Details</title>
	<link rel="stylesheet" type="text/css" href="style_search.css">
</head>
<body>
	<div><img src="2.jpeg" width=100% height=100% /></div>
	<div class="header">
		<h2 id="Company_name" >NIVI</h2>
		<h2 id="search1" >Search Employee Details</h2>
	</div>
	<p id="home">
		<a href="homepage.php">Home</a>
	</p>

	<form  method='POST' action = "search.php" >	
	
		<p id="id">Employee Id</p><br/>
		<input type="text" name="emp_id" id= "emp_id" placeholder="Enter employee Id"  value= "<?php echo $emp_id; ?>" >
		<button  name="search_by_id" id="sbi" >Search by id</button>

		<p id="fn">First Name</p><br/>
		<input type="text" name="firstname" id="firstname" placeholder="Enter firstname" value="<?php echo $fn; ?>" >
	
		<p id="ln">Last Name</p><br/>
		<input type="text" name="lastname" id= "lastname" placeholder="Enter lastname" value="<?php echo $ln; ?>">

		<button  name="search_by_name" id="sbn" >Search by name</button>

		<p id="dob">Date of birth</p><br/>
		<input type="day" name="day" id= "day" value="<?php echo $dd; ?>" disabled>
		<input type="month" name="month" id= "month" value="<?php echo $mm; ?>" disabled>
		<input type="year" name="year" id= "year" value="<?php echo $yy; ?>" disabled>


		<p id="gn">Gender</p><br/>
		<input type="radio" name="gender" value="M" id="male" <?php echo ($gn == "M")?' checked':'' ?> disabled>		
		<p id="m">Male</p>
		<input type="radio" name="gender" value="F" id="female" <?php echo ($gn == "F")?' checked':'' ?> disabled>	
		<p id="f">Female</p>


		<p id="mob">Contact</p><br/>
		<input type="text" name="mobile" id= "mobile" value="<?php echo $mob; ?>" disabled>

		<p id="em">Email</p><br/>
		<input type="email" name="email" id= "email" value="<?php echo $em; ?>" disabled>

		<p id="add">Address</p><br/>
		<textarea type="text" cols="40" rows="2" name="address" id= "address" disabled><?php echo $add ;?></textarea>


		<p id="dept">Department</p><br/>
		<input type="text" name="department" id= "department" value="<?php echo $dept; ?>" disabled>

		<p id="desg">Designation</p><br/>
		<input type="text" name="designation" id= "designation" value="<?php echo $desg; ?>" disabled>

		<p id="bsal">Basic Salary</p><br/>
		<input type="text" name="basic_Salary" id= "basicsal" value="<?php echo $bsal; ?>" disabled>

		<p id="doj">Date of joining</p><br/>
		<input type="day" name="day_join" id= "dayj" value="<?php echo $dj; ?>" disabled>
		<input type="month" name="month_join" id= "monthj" value="<?php echo $mj; ?>" disabled>
		<input type="year" name="year_join" id= "yearj" value="<?php echo $yj; ?>" disabled>

		<span id="error" class="error"><?php echo $Error;?></span>

	</form>	
	<form method = "POST">
		<button  name="clear" id="clear" >Clear</button>
		<button  name="back" id="back" >Back</button>
	</form>

</body>
</html>


