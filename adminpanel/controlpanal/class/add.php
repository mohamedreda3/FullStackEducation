<?php
require('../../../config/config.php');
if(!empty($_POST['cls_nm']) && !empty($_POST['cls_cd'])){
$clssnm = $_POST['cls_nm'];
$clsscd = $_POST['cls_cd'];

if(!(mysqli_fetch_row(mysqli_query($conn,"SELECT * FROM classes WHERE class_name = '$clssnm'")) > 0)){
    if(mysqli_fetch_row(mysqli_query($conn,"SELECT * FROM classes WHERE class_code = '$clsscd'")) > 0){
        echo $clsscd ." is Already Exist";
    }else{
    if(mysqli_query($conn,"INSERT INTO classes(class_name,class_code) VALUES('$clssnm','$clsscd')")){ 
      echo "Class Added";
     }else{
        echo mysqli_error($conn);
     }
    }
}else{
    echo $clssnm ." is Already Exist";
}
}else{
    echo  "Enter [Class Name :] and [Class Code :]";
}

?>
