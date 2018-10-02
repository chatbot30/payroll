<?php include 'connectivity.php';?>
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
	if($_SESSION['task'] == "Update(button)from view emp"){
		$emp_id = $_SESSION['emp_id'];

		$sql = "select A.id,firstname,lastname,dob,gender,department,designation,salary,doj,mob_no,email,address 
		from employee as A, contact as B,job as C where A.id = '$emp_id'  and B.id = A.id and C.id = A.id  ";
		$result = mysqli_query($con,$sql);
		
		if(mysqli_num_rows($result) == 1){
			$row = $result->fetch_assoc();
			$emp_id = $row['id'];
			$fn = $row['firstname'];			
			$ln = $row['lastname'];	
			$dob = $row['dob'];
			$date = explode("-",$dob);
			$dd = $date[2];
			$mm = $date[1];
			$yy = $date[0];
			$gn = $row['gender'];

			$em = $row['email'];
			$mob = $row['mob_no'];
			$add = $row['address'];

			$dept = $row['department'];
			$desg = $row['designation'];
			$bsal = $row['salary'];
			$doj = $row['doj'];
			$date = explode("-",$doj);
			$dj = $date[2];
			$mj = $date[1];
			$yj = $date[0];

		}

	}

	if(isset($_POST['save_changes'])){
		$emp_id = $_SESSION['emp_id'];

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

		$sql = "update contact,employee,job set firstname='$fn',lastname= '$ln',dob='$dob',gender= '$gn',mob_no= '$mob',email = '$em',address= '$add',department='$dept',designation ='$desg', salary='$bsal',doj='$doj'  where employee.id='$emp_id' and contact.id = '$emp_id' and job.id = '$emp_id';";
		$result = mysqli_query($con,$sql);

		if($result){
			$_SESSION['content'] = "Employee Updated successfully";
			header('Location:template.php');
		} 
		else{
			$Error = "Something went wrong while updating";
		}
	}

	if(isset($_POST['back'])){
		header('Location:homepage.php');
	}
	
	mysqli_close($con);
?>

