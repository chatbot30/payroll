<!DOCTYPE html>
<?php 
	session_start();
	$content = $_SESSION['content'];	
	$act = "homepage.php";
	if($_SESSION['content'] == "Logged out successfully"){
		session_destroy();
		$act = "login.php";
	}

?>
<html>
<head>
	<title>Template</title>
	<style type="text/css">
		*{
			margin: 0px;	
			padding: 0px;
		}	
	</style>	
	
</head>
<body>
	<div><img src="2.jpeg" width=100% height=100% /></div>
	<div class="header">
		<h1 id="msg" style="position:absolute; top:170px; left:280px; height: 80px; width: 80%; color: black; font-size: 70px;
		font-style: italic;" ><?php echo $content; ?></h1>
	</div>
	
	<form method='POST' action=" <?php echo $act; ?> ">		
		<button style="position:absolute; top:470px; left:900px; height: 50px; width: 10%; color: black; font-size: 20px; 			background:cyan; border-radius: 10px;" name="register" id="register" >Continue</button>	
	</form>

</body>
</html>

