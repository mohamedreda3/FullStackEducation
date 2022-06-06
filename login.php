<?php
require('config/config.php');
if(!empty($_POST['email'])&& !empty($_POST['password']) && !empty($_POST['gender'])){
$email = $_POST['email'];
$password = md5($_POST['password']);
$gender = $_POST['gender'];
if($gender == "teacher"){
	logg($conn, "teachers", "teacher_eml", "teacher_psrd", $email, $password, "logged as teacher");
}else if($gender == "student"){
	logg($conn, "students", "stu_eml", "stu_psrd", $email, $password, "logged as student");
}
}

function logg($connect, $tablename, $emlnameintable, $passwordnameintable, $eml, $pass, $whensuccess){
if(mysqli_num_rows(mysqli_query($connect,"SELECT * FROM $tablename WHERE $emlnameintable ='$eml'")) > 0){
	if(mysqli_num_rows(mysqli_query($connect,"SELECT * FROM $tablename WHERE $emlnameintable ='$eml' AND $passwordnameintable ='$pass'")) > 0){
        session_start();
        $_SESSION['email'] = $eml;
        echo $whensuccess;
	}else{
		echo "email or password is wrong";
	}
}else{
	echo $eml ." is not exist";
}
}
?>