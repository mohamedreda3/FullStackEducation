<?php
require('../../../config/config.php');
if(!empty($_POST['cls_cd'])){
    $cd_cls = $_POST['cls_cd'];
   if(mysqli_query($conn,"DELETE FROM classes WHERE classes.class_code = '$cd_cls'")){
       echo 'Class Deleted';
   }else{
       echo mysqli_error($conn);
   }
}else{
    echo 'There are an error, try again';
}
?>