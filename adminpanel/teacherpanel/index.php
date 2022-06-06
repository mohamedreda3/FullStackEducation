<?php
require('../../config/config.php');
$email = "";
session_start();
if(isset($_SESSION['email'])){
	$email = $_SESSION['email'];
}else{
	echo '<script>location.href="../../"</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/style.css">
	<title>Teacher -Panel</title>
</head>
<body>
<div class="container">
	<div class="nav_container">
		<div class="logo_site">
		<h1 class="site_logo">
			<img src="assets/images/teacher.png">
		</h1>
		</div>
		<div class="nav_elements">
			<div class="menu"><i class="fa-solid fa-bars-staggered"></i></div>
			<label class="teacher_panel" for="drop">
			<div class="teacher_image">
			<div class="iamge">
			<?php 
               $getTeacherInformation = mysqli_query($conn,"SELECT * FROM teachers WHERE teacher_eml ='$email'");
               while($getTeacher = mysqli_fetch_assoc($getTeacherInformation)){
                    $img = $getTeacher['teacher_img'];
                    echo "<img src='$img' >";
               }
			?>
			</div>
			<span class="arc_down">
				<i class="fa-solid fa-angle-down"></i>
			</span>
			<span class="add_user" onclick="showRequests()">
				<i class="fa-solid fa-user-plus"></i>
				<sup>
<?php
$getRequests = mysqli_query($conn, "SELECT * FROM student_request WHERE tech_eml = '$email'");
$getNumberOfRequests = mysqli_num_rows($getRequests);
echo $getNumberOfRequests;
?>
			</sup>
		</span>
		<div class="requests">
<?php
$getRequests = mysqli_query($conn, "SELECT * FROM student_request WHERE tech_eml = '$email'");
$getNumberOfRequests = mysqli_num_rows($getRequests);
if($getNumberOfRequests > 0){
while ($request = mysqli_fetch_assoc($getRequests)) {
	$img = $request['stu_img'];
	$studentEmail = $request['stu_eml'];
	$requestId = $request['request_id'];
	$studentName = $request['stu_nm'];
	$studentAddress = $request['stu_adrs'];
	$studentPhone = $request['stu_phone'];
	$studentClass = $request['class_code'];
	$studentSubjects = $request['subject_code'];
	if($studentAddress != ''){
		$studentAddress =  "<p>$studentAddress</p>";
	}
	if($studentClass != ''){
		$studentClass =  "<span>$studentClass</span>";
	}
	if($studentSubjects != ''){
		$studentSubjects =  "<span>$studentSubjects</span>";
	}
	echo "<div class='card'>
		<div class='card_image'>	
            <img alt='user Avatar' src='$img'/></div>
		<div class='right_card'>
		<div class='info'>
       <h2>$studentName</h2>
     $studentAddress
      <p>$studentPhone</p>
	  <div class='buttongroup'> $studentClass
      $studentSubjects </div>
  </div>
  <div class='buttongroup'>
    <button onclick='manageRequest(this)' id='approve' data-email='$studentEmail' data-id='$requestId'>Approve</button>
    <button onclick='manageRequest(this)' id='remove' data-email='$studentEmail' data-id='$requestId'>Remove</button>
  </div></div>
</div>";
}
}else{
	echo "<h3>You have not any requests</h3>";
}
?>
</div>
			<input type="checkbox" name="drop" id="drop">
			<div class="dropmenu">
				<span><i class="fa-solid fa-gear"></i><em> Settings </em></span>
				<span onclick="logOut()"><i class="fa-solid fa-arrow-right-from-bracket"></i><em> Log Out </em></span>
			</div>
			</div>
		</label>
		</div>
	</div>
	<div class="panel_container">
		<div class="left_panel_sidebar">
			<ul> 
               <li onclick="goPage(this)" id="pro"><i class="fa-solid fa-id-badge"></i> &nbsp; Profile</li>
               <li onclick="goPage(this)" id="sub"><i class="fa-solid fa-book"></i> &nbsp; Subjects</li>
			</ul>
		</div>
		<div class="right_panel_sidebar">
			<?php
             $pg = $_GET['pg'];
			 if($pg == 'pro'){
				 include('./profile.php');
			 }
			?>
		</div>
	</div>
</div>
<script type="text/javascript">
	document.querySelector('.menu').onclick = function(){
		document.querySelector('.panel_container').classList.toggle('active');
		document.querySelector('.logo_site').classList.toggle('active');
		document.querySelector('.nav_elements').classList.toggle('active');
		document.querySelector('.left_panel_sidebar').classList.toggle('active');
		document.querySelector('.right_panel_sidebar').classList.toggle('active');
	}
	function showRequests(){
		document.querySelector('.requests').classList.toggle('active');

	}
function goPage(ele){
var link = location.href.substring(0, location.href.indexOf('/?pg'));
if(link == '' ){
location.href =  location.href+`?pg=${ele.id}`;
}else{
location.href = link+`?pg=${ele.id}`;
}
}
</script>
<script src="../controlpanal/assets/all.js"></script>
<script type="text/javascript" src="assets/main.js"></script>
</body>
</html>