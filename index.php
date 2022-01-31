<?php include('server.php') ?>
<!DOCTYPE html>
<html>
	<head>
	  <title>Login</title>
	  <link rel="stylesheet" type="text/css" href="layout/css/style.css">
	</head>
	<body>
	
	<div class="header">

		<h2>تسجيل الدخول</h2>
	</div>
		<!-- here form to input the Data  -->
	<form method="post" action="index.php">
		<?php include('error.php'); ?>
		<div class="input-group">
			<label class="gg">اسم المستخدم</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>كلمة السر</label>
			<input type="password" name="password">
		</div>

		

		<div class="input-group">
			<button type="submit" class="btn" name="login_user">تسجيل الدخول</button>
		</div>
		
		<p class="pra-txt">
		نسيت كلمة المرور <a href="newpassword.php">كلمة السر الجديدة</a> 
		</p> 

	</form>
	</body>
</html>