<?php
require('../../../../config/config.php');
if(!empty($_POST['classCode']) && !empty($_POST['subjectCode'])){
    $cd_cls = $_POST['classCode'];
    $subjectCode = $_POST['subjectCode'];
   if(mysqli_query($conn,"DELETE FROM tech_subject WHERE subject_code = '$cd_cls' AND tech_email = '$subjectCode'")){
       echo 'Subject Deleted';
   }else{
       echo mysqli_error($conn);
   }
}else{
    echo 'There are an error, try again';
}
?>