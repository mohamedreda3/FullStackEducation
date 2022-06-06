<?php 
require('../../../config/config.php');
if(!empty($_POST['stu_name']) && !empty($_POST['class_code'])){
$tech_eml = $_POST['stu_name'];
$class_cd = $_POST['class_code'];

if(!(mysqli_fetch_row(mysqli_query($conn,"SELECT * FROM subject_class WHERE class_code  = '$class_cd' AND subject_code = '$tech_eml'")) > 0)){
    if(mysqli_query($conn,"INSERT INTO subject_class(class_code,subject_code) VALUES('$class_cd','$tech_eml')")){ 
        echo 'Subject Assigned';
    }else{
        echo mysqli_error($conn);
    }
}else{
    echo $tech_eml ." is Already Exist in this class ". $class_cd;
}
}else{
    echo  "Enter [Sub Code :] and [Class Code :]";
}



?>