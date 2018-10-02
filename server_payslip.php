<?php include 'connectivity.php';?>
<?php include 'fpdf181/fpdf.php';?>
<?php
$Error = "";
$emp_id = "";
$fn = "";			
$ln = "";	
$dept = "";
$desg = "";
$bsal = "";
$dj = "";
$mj = "";
$yj = "";
$da = "";
$hra = "";
$ca = "";
$ot = "";
$pd = "";
$net_sal = "";
$temp = "";
$tax = "";
$esi = "";



	session_start();
	if(isset($_POST['search_by_id'])){
		if(!empty($_POST['emp_id'])){
			$emp_id = $_POST['emp_id'];

			$sql = "select A.id,firstname,lastname,department,designation,salary,doj,overtime from employee as A, job as B, attendance as C where A.id = '$emp_id' and B.id = A.id and C.id = A.id  ";
			$result = mysqli_query($con,$sql);
	
			if(mysqli_num_rows($result) == 1){
				$row = $result->fetch_assoc();
				$emp_id = $row['id'];
				$fn = $row['firstname'];			
				$ln = $row['lastname'];	
				$temp = $row['overtime'];
				$dept = $row['department'];
				$desg = $row['designation'];
				$bsal = $row['salary'];
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

			$sql = "select A.id,firstname,lastname,department,designation,salary,doj,overtime from employee as A, job as B,attendance as C where firstname= '$fn' and lastname= '$ln' and B.id = A.id and C.id = A.id  ";
			$result = mysqli_query($con,$sql);
			$no = mysqli_num_rows($result);
			if($no == 1){
				$row = $result->fetch_assoc();
				$emp_id = $row['id'];
				$fn = $row['firstname'];			
				$ln = $row['lastname'];	
				$temp = $row['overtime'];
				$dept = $row['department'];
				$desg = $row['designation'];
				$bsal = $row['salary'];
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
	if((!empty($_POST['emp_id'])) || (!empty($_POST['firstname']) && !empty($_POST['lastname']))){
		$da = $bsal * 0.03;
		$hra = $bsal * 0.5;
		$ca = 1600;
		$pd = $bsal * 0.12;
		$ot = $temp * 500;

		if($bsal <= 7500){
			$tax = 0;		
		}
		else if(($bsal > 7500) && ($bsal <= 10000)){
			$tax = 175;
		}
		else if($bsal > 10000){
			$tax = 200;
		}

		if($bsal <= 15000){
			$esi = $bsal * 0.0175;
		}
		else{
			$esi = 0;
		} 

		$net_sal = $bsal + $da + $hra + $ca + $ot - $pd - $tax - $esi;
	
	}

	if(isset($_POST['generate'])){

		if(!empty($_POST['emp_id'])){

			$pdf = new FPDF();
			$pdf->AddPage();
			$pdf->SetFont('Arial','B',28,'U');
			$pdf->SetXY(95, 05);
			$pdf->Cell(300,03,'NIVI');
			$pdf->SetFont('Arial','', 8 );
			$pdf->SetXY(88, 10);
			$pdf->Cell(03,03,'10th Floor,ICC Trade Tower,','centered');
			$pdf->SetFont('Arial','', 8 );
			$pdf->SetXY(88, 13);
			$pdf->Cell(03,03,'     JW Marriot,S.B Road,','centered');
			$pdf->SetFont('Arial','', 8 );
			$pdf->SetXY(88, 16);
			$pdf->Cell(03,03,'           Pune-411016.','centered');
			$pdf->SetFont('Arial','', 8 );
			$pdf->SetXY(88, 19);
			$pdf->Cell(03,03,' Contact No:7035570355','centered');
			$pdf->SetFont('Arial','', 10 );
			$pdf->SetXY(86, 24);
			$pdf->Cell(03,03,'Payslip for November 2017','centered');
			$pdf->Line(0, 30, 230, 30);
			$pdf->SetFont('Arial','B', 8 );
			$pdf->SetXY(05, 35);
			$pdf->Cell(03,03,'Employee ID:','centered');
			$tempid = $_POST['emp_id'];
			$pdf->SetFont('Arial','', 8 );
			$pdf->SetXY(30, 36.5);
			$pdf->Write(0,$tempid);

			$emp_id = $_POST['emp_id'];

			$sql = "select A.id,firstname,lastname,department,designation,salary,doj,overtime from employee as A, job as B, attendance as C where A.id = '$emp_id' and B.id = A.id and C.id = A.id  ";
			$result = mysqli_query($con,$sql);

			$row = $result->fetch_assoc();
			$emp_id = $row['id'];
			$fn = $row['firstname'];			
			$ln = $row['lastname'];	
			$dept = $row['department'];
			$desg = $row['designation'];
			$bsal = $row['salary'];
			$temp = $row['overtime'];
	
			$da = $bsal * 0.03;
			$hra = $bsal * 0.5;
			$ca = 1600;
			$pd = $bsal * 0.12;
			$ot = $temp * 500;

			if($bsal <= 7500){
				$tax = 0;		
			}
			else if(($bsal > 7500) && ($bsal <= 10000)){
				$tax = 175;
			}
			else if($bsal > 10000){
				$tax = 200;
			}

			if($bsal <= 15000){
			$esi = $bsal * 0.0175;
			}
			else{
				$esi = 0;
			} 
			$tote = $bsal + $da + $hra + $ca + $ot;
			$totd = $pd + $tax + $esi;
			$net_sal = $bsal + $da + $hra + $ca + $ot - $pd - $tax - $esi;
	
			
			
			$pdf->SetFont('Arial','B', 8 );
			$pdf->SetXY(05, 38);
			$pdf->Cell(03,03,'Employee Name:','centered');
		
			$pdf->SetFont('Arial','', 8 );
			$pdf->SetXY(30, 39.5);
			$pdf->Write(0,$fn);
			$pdf->SetFont('Arial','', 8 );
			$pdf->SetXY(42, 39.5);
			$pdf->Write(0,$ln);

			$pdf->SetFont('Arial','B', 8 );
			$pdf->SetXY(05, 41);
			$pdf->Cell(03,03,'Department:','centered');
		
			$pdf->SetFont('Arial','', 8 );
			$pdf->SetXY(30, 42.5);
			$pdf->Write(0,$dept);

			$pdf->SetFont('Arial','B', 8 );
			$pdf->SetXY(05, 44);
			$pdf->Cell(03,03,'Designation:','centered');
		
			$pdf->SetFont('Arial','', 8 );
			$pdf->SetXY(30, 45.5);
			$pdf->Write(0,$desg);

			$pdf->Rect(0, 50, 106, 28);
			$pdf->Rect(106, 50, 230, 28);

			$pdf->SetFont('Arial','U', 10 );
			$pdf->SetXY(05, 53);
			$pdf->Cell(03,03,'Earnings:','centered');

			$pdf->SetFont('Arial','B', 10 );
			$pdf->SetXY(86, 53);
			$pdf->Cell(03,03,'Rs.','centered');


			$pdf->SetFont('Arial','B', 8 );
			$pdf->SetXY(05, 59);
			$pdf->Cell(03,03,'Basic Salary:');
		
			$pdf->SetFont('Arial','', 8 );
			$pdf->SetXY(85, 60.5);
			$pdf->Write(0,$bsal);

			$pdf->SetFont('Arial','B', 8 );
			$pdf->SetXY(05, 62);
			$pdf->Cell(03,03,'Dearness Allowance:');
		
			$pdf->SetFont('Arial','', 8 );
			$pdf->SetXY(85, 63.5);
			$pdf->Write(0,$da);

			$pdf->SetFont('Arial','B', 8 );
			$pdf->SetXY(05, 65);
			$pdf->Cell(03,03,'House Rent Allowance:');
		
			$pdf->SetFont('Arial','', 8 );
			$pdf->SetXY(85, 66.5);
			$pdf->Write(0,$hra);

			$pdf->SetFont('Arial','B', 8 );
			$pdf->SetXY(05, 68);
			$pdf->Cell(03,03,'Conveyance Allowance:');
		
			$pdf->SetFont('Arial','', 8 );
			$pdf->SetXY(85, 69.5);
			$pdf->Write(0,$ca);

			$pdf->SetFont('Arial','B', 8 );
			$pdf->SetXY(05, 71);
			$pdf->Cell(03,03,'Overtime:');
		
			$pdf->SetFont('Arial','', 8 );
			$pdf->SetXY(85, 72.5);
			$pdf->Write(0,$ot);

			$pdf->SetFont('Arial','U', 10 );
			$pdf->SetXY(111, 53);
			$pdf->Cell(03,03,'Deductions:','centered');

			$pdf->SetFont('Arial','B', 10 );
			$pdf->SetXY(191, 53);
			$pdf->Cell(03,03,'Rs.','centered');

			$pdf->SetFont('Arial','B', 8 );
			$pdf->SetXY(111, 59);
			$pdf->Cell(03,03,'Provident Fund:');
		
			$pdf->SetFont('Arial','', 8 );
			$pdf->SetXY(190, 60.5);
			$pdf->Write(0,$pd);

			$pdf->SetFont('Arial','B', 8 );
			$pdf->SetXY(111, 62);
			$pdf->Cell(03,03,'Proffesional Tax:');
		
			$pdf->SetFont('Arial','', 8 );
			$pdf->SetXY(190, 63.5);
			$pdf->Write(0,$tax);

			$pdf->SetFont('Arial','B', 8 );
			$pdf->SetXY(111, 65);
			$pdf->Cell(03,03,'ESI:');
		
			$pdf->SetFont('Arial','', 8 );
			$pdf->SetXY(190, 66.5);
			$pdf->Write(0,$esi);

			$pdf->Rect(0, 50, 106, 38);
			$pdf->Rect(106, 50, 230, 38);

			$pdf->SetFont('Arial','B', 8 );
			$pdf->SetXY(05, 81);
			$pdf->Cell(03,03,'Total Earnings:');
		
			$pdf->SetFont('Arial','', 8 );
			$pdf->SetXY(85, 82.5);
			$pdf->Write(0,$tote);

			$pdf->SetFont('Arial','B', 8 );
			$pdf->SetXY(111, 81);
			$pdf->Cell(03,03,'Total Deductions:');
		
			$pdf->SetFont('Arial','', 8 );
			$pdf->SetXY(190, 82.5);
			$pdf->Write(0,$totd);

			
			$pdf->SetFont('Arial','B', 10 );
			$pdf->SetXY(05, 90);
			$pdf->Cell(03,03,'Net Salary:');
		
			$pdf->SetFont('Arial','B', 10 );
			$pdf->SetXY(85, 91.5);
			$pdf->Write(0,$net_sal);
		
			$pdf->Line(0, 95, 230, 95);
			$pdf->Line(0, 95.5, 230, 95.5);	

			$pdf->Output();

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

