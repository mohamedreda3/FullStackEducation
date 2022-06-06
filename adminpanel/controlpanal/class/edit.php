<?php
require('../../../config/config.php');
if(!empty($_POST['cls_nnm'])){
    $nwnm = $_POST['cls_nnm']; 
    $cd_cls = $_POST['cls_cd'];

   if(mysqli_query($conn,"UPDATE classes SET class_name = '$nwnm' WHERE class_code = '$cd_cls'")){
       echo 'Class Editted';
   }else{
       echo mysqli_error($conn);
   }
}
?>