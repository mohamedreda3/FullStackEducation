<?php
require('../../../../config/config.php');
if(!empty($_POST['e_mail'])){
	 $e_mail = $_POST['e_mail'];
	 // echo $e_mail;
    // mysqli_query($conn,"SET FOREIGN_KEY_CHECKS=0");
	if(mysqli_query($conn,"DELETE FROM teachers WHERE teachers.teacher_eml = '$e_mail'")){
		 echo 'Teacher Deleted';
    mysqli_query($conn,"SET FOREIGN_KEY_CHECKS=1");
	}else{
		 echo mysqli_error($conn);
		 echo 'There are an error, try again';
	}
}
?>
