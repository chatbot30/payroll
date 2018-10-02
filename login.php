<?php include 'server_login.php';?>
<!DOCTYPE html>

<html>
<head>
	<title>Login page</title>
	<link rel="stylesheet" type="text/css" href="style_login_chpwd_logout_del.css">
</head>
<body>
	<div><img src="2.jpeg" width=100% height=100% /></div>
	<div class="header">
		<h2 id="Company_name" >NIVI</h2>
		<h2 id="login_header">Login</h2>
	</div>
	
	<form action='login.php' method='POST' >	
		<p id="un">Username</p><br/>
		<input type="text" name="username" id="username" placeholder="Enter Username" value="<?php echo $un; ?>" required>

		<p id="pwd">Password</p><br/>
		<input type="password" name="password" id="password" placeholder="Enter Password" value="<?php echo $pwd; ?>" required>

		<span id="error" class="error"><?php echo $Error;?></span>

		<button type="submit"  name="login" id="login" >Login</button><br/>
	</form>	

</body>
</html>

