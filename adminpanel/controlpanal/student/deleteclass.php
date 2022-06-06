<?php
require('../../../config/config.php');
if(!empty($_POST['classCode']) && !empty($_POST['subjectCode'])){
    $cd_cls = $_POST['classCode'];
    $subjectCode = $_POST['subjectCode'];
   if(mysqli_query($conn,"DELETE FROM stu_class WHERE class_id = '$cd_cls' AND stu_eml = '$subjectCode'")){
       echo 'Class Deleted';
   }else{
       echo mysqli_error($conn);
   }
}else{
    echo 'There are an error, try again';
}
?>