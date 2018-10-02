<?php include 'connectivity.php';?>
<?php
$Error = "";
$emp_id = "";
$fn = "";			
$ln = "";	

$dept = "";
$desg = "";
$bsal = "";
$amt = "";
$percent = "";

$renum = "";
$updt_sal = "";
$res = "";

	session_start();
	if(isset($_POST['search'])){
		if(!empty($_POST['emp_id'])){
			$emp_id = $_POST['emp_id'];
	
			$sql = "select A.id,firstname,lastname,department,designation,salary 
			from employee as A, contact as B,job as C where A.id = '$emp_id'  and B.id = A.id and C.id = A.id  ";
			$result = mysqli_query($con,$sql);
		}
		
		if(mysqli_num_rows($result) == 1){
			$row = $result->fetch_assoc();
			$emp_id = $row['id'];
			$fn = $row['firstname'];			
			$ln = $row['lastname'];	

			$dept = $row['department'];
			$desg = $row['designation'];
			$bsal = $row['salary'];
			
			$_SESSION['emp_id'] = $emp_id;
			$_SESSION['firstname'] = $fn;
			$_SESSION['lastname'] = $ln;
			$_SESSION['department'] = $dept;
			$_SESSION['designation'] = $desg;
			$_SESSION['salary'] = $bsal;
		}
		else{
			$Error = "*Employee Id ".$emp_id." does not exist";
			$emp_id = "";
			$_SESSION['emp_id'] = "";
		}
	}

	if(isset($_POST['update_sal'])){
		$emp_id = $_SESSION['emp_id'];
		$res =  $_SESSION['res'];
		$sql1 = "update job set salary = $res where id = $emp_id";

		if(mysqli_query($con,$sql1) ){
				$_SESSION['content'] = "Salary Updated successfully";
				header('Location:template.php');
			} 
			else{
				$Error = "*Something went wrong while updating, try again";
			}
	}

	if(isset($_POST['calculate'])){
		if(!empty($_SESSION['emp_id'])){
			$emp_id = $_SESSION['emp_id'];
			$fn = $_SESSION['firstname'];			
			$ln = $_SESSION['lastname'];	

			$dept = $_SESSION['department'];
			$desg = $_SESSION['designation'];
			$bsal = $_SESSION['salary'];
		}
		else{
			$emp_id = $_POST['emp_id'];
	
			$sql = "select A.id,firstname,lastname,department,designation,salary 
			from employee as A, contact as B,job as C where A.id = '$emp_id'  and B.id = A.id and C.id = A.id  ";
			$result = mysqli_query($con,$sql);
		
			if(mysqli_num_rows($result) == 1){
				$row = $result->fetch_assoc();
				$emp_id = $row['id'];
				$fn = $row['firstname'];			
				$ln = $row['lastname'];	

				$dept = $row['department'];
				$desg = $row['designation'];
				$bsal = $row['salary'];
			
				$_SESSION['emp_id'] = $emp_id;
				$_SESSION['firstname'] = $fn;
				$_SESSION['lastname'] = $ln;
				$_SESSION['department'] = $dept;
				$_SESSION['designation'] = $desg;
				$_SESSION['salary'] = $bsal;
			}
			else{
				$Error = "*Employee Id ".$emp_id." does not exist";
				$emp_id = "";
				$_SESSION['emp_id'] = "";
			}
		}
		$renum = $_POST['renum'];
		$updt_sal =  $_POST['updt_sal'];


		if(!empty($_SESSION['emp_id'])){
			if($renum == "byamt"){
				if(!empty($_POST['rupees'])){
					$amt = $_POST['rupees'];
					$_SESSION['amt'] = $amt;
					if($updt_sal == "inc"){
						$res = (int)$bsal + (int)$amt;						  
					}
					if($updt_sal == "dec"){
						$res = (int)$bsal - (int)$amt;  
					}						
				}	
				else{
					$Error = "*Please Enter the Amount";
				}
			}
			else{
				if(!empty($_POST['percentage'])){
					$percent = $_POST['percentage'];
					$_SESSION['percent'] = $percent;
					if($updt_sal == "inc"){
						$res = (int)$bsal + ((int)$bsal * (int)$percent *0.01);
						  
					}
					if($updt_sal == "dec"){
						$res = (int)$bsal - ((int)$bsal * (int)$percent *0.01); 
					}
				}	
				else{
					$Error = "*Please Enter the Percentage";
				}			
			
			}
			$_SESSION['res'] = $res;
		
		}
		
	}


	
	if(isset($_POST['back'])){
		header('Location:homepage.php');
	}

	mysqli_close($con);
?>

