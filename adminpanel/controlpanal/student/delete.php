<?php
require('../../../config/config.php');
if(!empty($_POST['e_mail'])){
    $e_mail = $_POST['e_mail'];
    // echo $e_mail;
   if(mysqli_query($conn,"DELETE FROM students WHERE stu_eml = '$e_mail'")){
       echo 'Student Deleted';
   }else{
       echo 'There are an error, try again';
   }
}
?>