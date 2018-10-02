<?php
include 'connectivity.php';

	session_start();
	if(isset($_POST['delete'])){
		$id = $_POST['delId'];
		$_SESSION['emp_id'] = $id;
		header('Location:del.php');
	}

	if(isset($_POST['update'])){
		$id = $_POST['upId'];
		$_SESSION['emp_id'] = $id;
		$_SESSION['task'] = "Update(button)from view emp"; 
		header('Location:up_emp_details.php');	
	}
	
	mysqli_close($con);	
?>
<!DOCTYPE html>
<html>
<head>
	<title>View Employees backup</title>
	<link rel="stylesheet" type="text/css" href="style_view_emp.css">
</head>
<body>
	<div><img src="2.jpeg" width=100% height=100% /></div>
	<div class="header">
		<h2 id="Company_name" >NIVI</h2>
		<h2 id="view_emp" >Employees</h2>
	</div>
	<p id="home">
		<a href="homepage.php">Home</a>
	</p>

<?php
include 'connectivity.php';

	$result = mysqli_query($con,"select A.id,firstname,lastname,department,designation,salary,mob_no,email from employee as A, contact as B,job as C where B.id = A.id and C.id = A.id");

	echo "<table id='abc' class='x' border-collapse: collapse'>";
	echo	"<tr>
	<th>Id</th>
	<th>First name</th>
	<th>Last name</th>
	<th>Department</th>
	<th>Designation</th>
	<th>Basic Sal</th>
	<th>Mobile No.</th>
	<th>Email</th>
	</tr>";
	
//	echo "<tbody style='overflow-y : scroll;height : 200px;>";
//	echo "<tbody>";

	while($row = mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>" . $row['id'] . "</td>";
		echo "<td>" . $row['firstname'] . "</td>";
		echo "<td>" . $row['lastname'] . "</td>";
		echo "<td>" . $row['department'] . "</td>";
		echo "<td>" . $row['designation'] . "</td>";
		echo "<td>" . $row['salary'] . "</td>";
		echo "<td>" . $row['mob_no'] . "</td>";
		echo "<td>" . $row['email'] . "</td>";

		echo "<td><form action='view_emp.php' method='POST'><input type='hidden' name='upId' value='".$row["id"]."'/><input type='submit' name='update' value='Update' /></form></td>";
		echo "<td><form action='view_emp.php' method='POST'><input type='hidden' name='delId' value='".$row["id"]."'/><input type='submit' name='delete' value='Delete' /></form></td>";

		echo "</tr>";
		
	}
//	echo "</tbody>";
	echo "</table>";
	echo "</body>";

mysqli_close($con);
?>


</body>
</html>

