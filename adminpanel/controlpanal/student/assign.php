<?php 
require('../../../config/config.php');
if(!empty($_POST['tech_eml']) && !empty($_POST['class_cd'])){
$tech_eml = $_POST['tech_eml'];
$class_cd = $_POST['class_cd'];

if(!(mysqli_fetch_row(mysqli_query($conn,"SELECT * FROM stu_class WHERE class_id  = '$class_cd' AND stu_eml = '$tech_eml'")) > 0)){
    if(mysqli_query($conn,"INSERT INTO stu_class(class_id,stu_eml) VALUES('$class_cd','$tech_eml')")){ 
        echo 'Student Assigned';
    }else{
        echo mysqli_error($conn);
    }
}else{
    echo $tech_eml ." is Already Exist in this class ". $class_cd;
}
}else{
    echo  "Enter [Stu Email :] and [Class Code :]";
}



?>