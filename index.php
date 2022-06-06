<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Examination</title>
	<!-- <link rel="stylesheet" type="text/css" href="adminpanel/controlpanal/assets/style.css"> -->
	<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>
<div class="container">
	<h4 class='errtxt'></h4>
	<form class="login">
		<h3 class="formTitle">Log In</h3>
		<div class="inputField">
			<input type="email" name="email">
			<label>Enter Your Email</label>
		</div>
		<div class="inputField">
			<input type="password" name="password">
			<label>Enter Your Password</label>
		</div>
		<h4>Log in as : </h4>
		<div class="checkInput">
			<div class="checkInputInputField">
			     <input type="radio" id="tech" name="gender" value="teacher">
			     <label for="tech">Teacher</label>
		    </div>
		    <div class="checkInputInputField">
			     <input type="radio" id="stu" name="gender" value="student">
			     <label for="stu">Student</label>
		    </div>
		</div>
		<button type="submit">Log in</button>
	</form>
</div>
        <script src="adminpanel/controlpanal/assets/all.js"></script>
        <script src="adminpanel/controlpanal/assets/newmain.js"></script>
        <script src="adminpanel/controlpanal/assets/main.js"></script>
        <script src="assets/mainpage.js"></script>
</body>
</html>