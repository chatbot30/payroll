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

	if(isset($_POST['search'])){
		if(!empty($_POST['emp_id'])){
			$emp_id = $_POST['emp_id'];
	
			$sql = "select A.id,firstname,lastname,dob,gender,department,designation,salary,doj,mob_no,email,address 
			from employee as A, contact as B,job as C where A.id = '$emp_id'  and B.id = A.id and C.id = A.id  ";
			$result = mysqli_query($con,$sql);
		}
		
		if(mysqli_num_rows($result) == 1){
			$row = $result->fetch_assoc();
			$emp_id = $row['id'];
			$fn = $row['firstname'];			
			$ln = $row['lastname'];	

			$em = $row['email'];
			$mob = $row['mob_no'];

			$dept = $row['department'];
			$desg = $row['designation'];
			$bsal = $row['salary'];
			$doj = $row['doj'];
			$date = explode("-",$doj);
			$dj = $date[2];
			$mj = $date[1];
			$yj = $date[0];
			
			$_SESSION['emp_id'] = $emp_id;
		}
		else{
			$Error = "*Employee Id ".$emp_id." does not exist";
			$emp_id = "";
		}

	}
	if(isset($_POST['delete'])){		
		$emp_id = $_POST['emp_id'];
		if(!empty($emp_id)){
			$_SESSION['emp_id'] = $emp_id;
			$sql = "select A.id from employee as A where A.id = '$emp_id' ";
			$result = mysqli_query($con,$sql);
			if(mysqli_num_rows($result) == 1){
				header('Location:del.php');
			}
			else{
				$Error = "*Employee Id $emp_id does not exist";
			}
		}
		else{
			$Error = "*Enter Employee Id first";
		}
	}
	if(isset($_POST['back'])){
		header('Location:homepage.php');
	}
	
	mysqli_close($con);
?>

