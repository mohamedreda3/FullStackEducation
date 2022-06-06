<?php
require('../../../config/config.php');
if(!empty($_POST['e_mail'])){
    $e_mail = $_POST['e_mail'];
    // echo $e_mail;
   if(mysqli_query($conn,"DELETE FROM subject WHERE subject_code = '$e_mail'")){
       echo 'Subject Deleted';
   }else{
       echo 'There are an error, try again';
   }
   echo mysqli_error($conn);
}
?>