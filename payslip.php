<?php include 'server_payslip.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>Payslip generation</title>
	<link rel="stylesheet" type="text/css" href="style_payslip.css">
</head>
<body>
	<div><img src="2.jpeg" width=100% height=100% /></div>
	<div class="header">
		<h2 id="Company_name" >NIVI</h2>
		<h2 id="payslip" >Payslip Generation</h2>
	</div>
	<p id="home">
		<a href="homepage.php">Home</a>
	</p>

	<form  method='POST' action = "payslip.php" >	
	
		<p id="id">Employee Id</p><br/>
		<input type="number" min=1 name="emp_id" id= "emp_id" placeholder="Enter employee Id"  value= "<?php echo $emp_id; ?>" >

		<button  name="search_by_id" id="sbi" >Search by id</button>

		<p id="fn">First Name</p><br/>
		<input type="text" name="firstname" id="firstname" placeholder="Enter firstname" value="<?php echo $fn; ?>" >
	
		<p id="ln">Last Name</p><br/>
		<input type="text" name="lastname" id= "lastname" placeholder="Enter lastname" value="<?php echo $ln; ?>">

		<button  name="search_by_name" id="sbn" >Search by name</button>

		<p id="dept">Department</p><br/>
		<input type="text" name="department" id= "department" value="<?php echo $dept; ?>" disabled>

		<p id="desg">Designation</p><br/>
		<input type="text" name="designation" id= "designation" value="<?php echo $desg; ?>" disabled>


		<fieldset id="fdone">
			<legend><b> Earnings </b></legend><br/>
       			<p>

			<pre id="bsal"> Basic Salary <input type="text" name="basic_Salary" id= "basicsal" value="<?php echo $bsal; ?>" disabled> Rs. </pre>
			<br/>

			<pre id="da"> DA           <input type="text" name="dear" id= "dear" value="<?php echo $da; ?>" disabled> Rs. </pre>	
			<br/>

			<pre id="hra"> HRA          <input type="text" name="house" id= "house" value="<?php echo $hra; ?>" disabled> Rs. </pre>
			<br/>

			<pre id="ca"> CA           <input type="text" name="convey" id= "convey" value="<?php echo $ca; ?>" disabled> Rs. </pre>
			<br/>
			
			<pre id="ot"> Overtime     <input type="text" name="over" id= "over" value="<?php echo $ot; ?>" disabled> Rs. </pre>

			</p> 
			</br>
		</fieldset>   


		<fieldset id="fdtwo">
			<legend><b> Deductions </b></legend><br/>
       			<p>

			<pre id="pd"> Provident Fund <input type="text" name="provident" id= "provident" value="<?php echo $pd; ?>" disabled> Rs. </pre>
			<br/>

			<pre id="it"> Proffesion Tax <input type="text" name="tax" id= "tax" value="<?php echo $tax; ?>" disabled> Rs. </pre>
			<br/>
			
			<pre id="it"> ESI            <input type="text" name="tax" id= "tax" value="<?php echo $esi; ?>" disabled> Rs. </pre>
				
			</p> 
			</br>
		</fieldset> 
		
		<p id="ns"><b>Net Salary :  </b></p> 
		<input type="text" name="net_sal" id="net_sal" value= "<?php echo $net_sal; ?>" diasbled>   

		<button  name="generate" id="generate" >Generate Payslip</button>
		<span id="error" class="error"><?php echo $Error;?></span>

	</form>	
	<form method = "POST">
		<button  name="back" id="back" >Back</button>
	</form>

</body>
</html>

