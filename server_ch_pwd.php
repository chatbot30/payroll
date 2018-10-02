<?php include 'connectivity.php';?>
<?php
$un = "";
$pwd = "";
$pwdError = "";
$cp = "";
$np = "";
$cfp = "";

	session_start();

	if(isset($_POST['Change'])){
		$un = $_SESSION['username'];
		$pwd = $_SESSION['password'];
		$cp = $_POST['curr_pwd'];
		$np = $_POST['new_pwd'];
		$cfp = $_POST['conf_pwd'];

		if($pwd == $cp){
			if($cfp == $np){
				$sql = "update login set password = '$np' where username = '$un'";
				mysqli_query($con,$sql);
				$_SESSION['password'] = $np;
				$_SESSION['content'] = "Password changed \n Successfully";
				header('Location:template.php');
			}
			else{
				$pwdError = "*Two passwords do not match";
			}
		}
		else{
			$pwdError = "*current password is incorrect";		
		}
		
	}
	mysqli_close($con);

?>

