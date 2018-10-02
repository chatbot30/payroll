<?php include 'server_up_sal.php';?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Salary</title>
	<link rel="stylesheet" type="text/css" href="style_up_sal.css">
	
</head>
<body>
	<div><img src="2.jpeg" width=100% height=100% /></div>
	<div class="header">
		<h2 id="Company_name" >NIVI</h2>
		<h2 id="update" >Update Employee Salary</h2>
	</div>
	<p id="home">
		<a href="homepage.php">Home</a>
	</p>


	<form  method='POST' >	
	
		<p id="id">Employee Id</p><br/>
		<input type="text" name="emp_id" id= "emp_id" placeholder="Enter employee Id" value= "<?php echo $emp_id; ?>" required>
		<button  name="search" id="search" >Search</button>

		<p id="fn">First Name</p><br/>
		<input type="text" name="firstname" id="firstname" value= "<?php echo $fn; ?>" disabled >
	
		<p id="ln">Last Name</p><br/>
		<input type="text" name="lastname" id= "lastname" value= "<?php echo $ln; ?>" disabled>

		<p id="dept">Department</p><br/>
		<input type="text" name="department" id= "department" value= "<?php echo $dept; ?>" disabled>

		<p id="desg">Designation</p><br/>
		<input type="text" name="designation" id= "designation" value= "<?php echo $desg; ?>"disabled>

		<p id="bsal">Basic Salary</p><br/>
		<input type="text" name="basic_sal" id= "basicsal" value= "<?php echo $bsal; ?>" disabled>

		
		 <fieldset id="fdone">
			<legend><b> Renumeration </b></legend><br/>
       			<p>       

       			<input type="radio" name="renum" id="by_amt" value="byamt" <?php echo ($renum == "byamt")?' checked':''?> checked />
			<label for = "by_amt">By Amount</label>
			<pre id="rup"><input type="text" name="rupees" id= "rupees" value ="<?php echo $amt; ?>"  > Rs.<br/></pre>

			<br/>
  
       			<input type="radio" name="renum" id="by_per" value="byper" <?php echo ($renum == "byper")?' checked':''?>/>
			<label for = "by_per">By Percentage</label>
			<pre id = "per"><input type="text" name="percentage" id="percentage" value="<?php echo $percent; ?>"> % </pre>
         
			<br/>
        		</p> 
		</fieldset>     

		 <fieldset id="fdtwo">
			<legend><b> Update Salary</b></legend><br/>
       			<p>       
	       			<input type = "radio" name = "updt_sal" id = "inc" value = "inc" checked = "checked" />
				<label for = "inc">Increment</label><br/>
	
				<br/>			

	       			<input type = "radio" name = "updt_sal" id = "dec" value = "dec" />
				<label for = "dec">Decrement</label>

         
        		</p> 
			</br>
		</fieldset> 
		<p id="abc"><b>Salary after update : </b></p> 
		<input type="text" name="sal_after_update" id= "abc1" value= "<?php echo $res; ?>" disabled>

		<span id="error" class="error"><?php echo $Error;?></span>
		<button  name="calculate" id="calculate" >Calculate</button>

		<button  name="update_sal" id="update_sal" >Update</button>

	</form>
	<form method = "POST">					
		<button name="back" id="back" formnovalidate> Back</button>   
	</form>	


</body>
</html>

