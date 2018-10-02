<?php include 'connectivity.php'?>
<?php

$Error = "";
$emp_id = "";
$fn = "";			
$ln = "";	
$dd = "";
$mm = "";
$yy = "";
$gn = "";

$em = "";
$mob = "";
$add = "";

$dept = "";
$desg = "";
$bsal = "";
$dj = "";
$mj = "";
$yj = "";

	session_start();

	if($_SESSION['task'] == 'add_emp'){
		$_SESSION['task'] = "";
		$sql = "select MAX(id) from employee;";
		$result = mysqli_query($con,$sql);
		$row = $result->fetch_assoc();
		if(mysqli_num_rows($result) == 0)
			$emp_id = $row['MAX(id)'];
		else
			$emp_id = (int)$row['MAX(id)'] + 1;
	}

	if(isset($_POST['register'])){
		$emp_id = $_POST['emp_id'];

		$fn = $_POST['firstname'];			
		$ln = $_POST['lastname'];	
		$dd = $_POST['day'];
		$mm = $_POST['month'];
		$yy = $_POST['year'];
		$dob = $yy."-".$mm."-".$dd;
		$gn = $_POST['gender'];

		$mob = $_POST['mobile'];
		$em = $_POST['email'];
		$add = $_POST['address'];

		$dept = $_POST['department'];
		$desg = $_POST['designation'];
		$bsal = $_POST['basic_sal'];
		$dj = $_POST['day_join'];
		$mj = $_POST['month_join'];
		$yj = $_POST['year_join'];
		$doj = $yj."-".$mj."-".$dj;

		if($Error == ""){

			$sql = "select id from employee where id = '$emp_id'";
			$result = mysqli_query($con,$sql);
			if(mysqli_num_rows($result) != 0){
				$emp_id = "";
				$Error = "*ID already exists, please enter other employee ID";
			}			
			else{
				$sql = "insert into employee values('$emp_id', '$fn', '$ln','$dob', '$gn')";
				$sql1 ="insert into contact values('$emp_id', '$mob', '$em', '$add')";
				$sql2 ="insert into job values('$emp_id', '$dept', '$desg', '$bsal', '$doj')";
				$result = mysqli_query($con,$sql);
				$result1 = mysqli_query($con,$sql1);
				$result2 = mysqli_query($con,$sql2);
		
				if($result && $result1 && $result2){
//				if($result){
					$_SESSION['content'] = "Employee registered successfully";
					header('Location:template.php');
				} 
				else{
					$Error = "Something went wrong while inserting";
					if($result){
						$sql = "delete from employee where id = '$emp_id'";
					}
					if($result1){
						$sql = "delete from contact where id = '$emp_id'";
					}
					if($result2){
						$sql = "delete from job where id = '$emp_id'";
					}
				}
			}
		
		}	
	
	}
	
 
	if(isset($_POST['back'])){
		header('Location:homepage.php');
	}

	mysqli_close($con);
?>

