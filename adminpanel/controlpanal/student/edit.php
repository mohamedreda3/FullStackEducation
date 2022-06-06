<?php
require('../../../config/config.php');
if(!empty($_POST['tch_nm'])){
    $nwnm = $_POST['tch_nm']; 
    $tch_phn = $_POST['tch_phn'];
    $tch_eml = $_POST['tch_eml'];
    // echo $nwnm;
   if(mysqli_query($conn,"UPDATE students SET students.stu_nm = '$nwnm' AND students.stu_phone = '$tch_phn' WHERE students.stu_eml ='$tch_eml'")){
    // echo $nwnm;
    echo mysqli_error($conn);
       echo 'Student Editted';
   }else{
       echo mysqli_error($conn);
   }
}
?>