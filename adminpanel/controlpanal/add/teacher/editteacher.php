<?php
require('../../../../config/config.php');
if(!empty($_POST['tch_nm']) && !empty($_POST['tch_phn'])){
    $nwnm = $_POST['tch_nm'];    
    $nwphn = $_POST['tch_phn'];   
    $e_ml = $_POST['tch_eml'];
//    echo $nwnm;
if(is_numeric($nwphn)){
   if(mysqli_query($conn,"UPDATE teachers SET teacher_name = '$nwnm' , teacher_nphone = '$nwphn' where teacher_eml  = '$e_ml'")){
       echo 'Teacher Edited';
   }else{
       echo mysqli_error($conn);
   }
}else{
    echo 'PhoneNumber Is invalid';
}
}
?>