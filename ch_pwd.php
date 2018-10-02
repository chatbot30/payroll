<?php include 'server_ch_pwd.php';?>
<!DOCTYPE html>

<html>
<head>
	<title>Change Password</title>
	<link rel="stylesheet" type="text/css" href="style_login_chpwd_logout_del.css">
</head>
<body>
	<div><img src="2.jpeg" width=100% height=100% /></div>
	<div class="header">
		<h2 id="Company_name">NIVI</h2>
		<h2 id="Chpwd_header">Change password</h2>
	</div>
	</div>
	<p id="home">
		<a href="homepage.php">Home</a>
	</p>
	
	<form action='ch_pwd.php' method='POST' >	
		<p id="cp">Current Password</p><br/>
		<input type="text" name="curr_pwd" id="currpwd" placeholder="Enter Current Password" value="<?php echo $cp; ?>" required>

		<p id="np">New Password</p><br/>
		<input type="text" name="new_pwd" id="newpwd" placeholder="Enter New Password" value="<?php echo $np; ?>" required>

		<p id="cfp">Cofirm new Password</p><br/>
		<input type="text" name="conf_pwd" id="confpwd" placeholder="Re-enter New Password" value="<?php echo $cfp; ?>" required>

		<span id="error1" class="error"><?php echo $pwdError;?></span>

		<button type="submit"  name="Change" id="changepwd" >Change</button><br/>

	</form>	

</body>
</html>

