<?php
require('../../../config/config.php');
if(!empty($_POST['tch_nm'])){
    $nwnm = $_POST['tch_nm']; 
    $tch_eml = $_POST['tch_eml'];
   if(mysqli_query($conn,"UPDATE subject SET subject.subject_name = '$nwnm' WHERE subject.subject_code ='$tch_eml'")){
    // echo $nwnm;
    echo mysqli_error($conn);
       echo 'Subject Editted';
   }else{
       echo mysqli_error($conn);
   }
}
?>