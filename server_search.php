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
	if(isset($_POST['search_by_id'])){
		if(!empty($_POST['emp_id'])){
			$emp_id = $_POST['emp_id'];

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
			else{
				$Error = "*Employee Id $emp_id does not exist";
			}
		}
		else{
			$Error = "*Please Enter (id) or (firstname, lastname)";
		}
		
	}
	if(isset($_POST['search_by_name'])){
		if(!empty($_POST['firstname']) && !empty($_POST['lastname'])){			
			$fn = $_POST['firstname'];
			$ln = $_POST['lastname'];

			$sql = "select A.id,firstname,lastname,dob,gender,department,designation,salary,doj,mob_no,email,address 
			from employee as A, contact as B,job as C where firstname= '$fn' and lastname= '$ln' and B.id = A.id and C.id = A.id  ";
			$result = mysqli_query($con,$sql);
			
			$no = mysqli_num_rows($result);
			if($no == 1){
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
			else if($no > 1){
				$list = "";
				while($row = $result->fetch_assoc()){
					$list = $list." ".$row['id']." ";
				}
				$Error = "*$no $fn $ln exist...Please search by Id($list)";
			}
			else{
				$Error = "*Employee $fn $ln does not exist";
			}
		}
		else{
			$Error = "*Please Enter (id) or (firstname, lastname)";
		}
		
	}
	if(isset($_POST['back'])){
		header('Location:homepage.php');
	}
	
	mysqli_close($con);
?>

