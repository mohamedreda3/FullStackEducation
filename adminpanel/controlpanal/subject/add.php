<?php
require('../../../config/config.php');
if(!empty($_POST['tchnm']) && !empty($_POST['tcheml'])){
$clssnm = $_POST['tchnm'];
$clsscd = $_POST['tcheml'];
$clss_cd = $_POST['class'];

if(!(mysqli_fetch_row(mysqli_query($conn,"SELECT * FROM subject WHERE subject_name = '$clssnm'")) > 0)){
    if(mysqli_fetch_row(mysqli_query($conn,"SELECT * FROM subject WHERE subject_code = '$clsscd'")) > 0){
        echo $clsscd ." is Already Exist";
    }else{
    if(mysqli_query($conn,"INSERT INTO subject(subject_name,subject_code) VALUES('$clssnm','$clsscd')")){ 
      mysqli_query($conn,"INSERT INTO subject_class(subject_code,class_code) VALUES('$clsscd','$clss_cd')");
      echo "Subject Added";
     }else{
        echo mysqli_error($conn);
     }
    }
}else{
    echo $clssnm ." is Already Exist";
}
}else{
    echo  "Enter [Subject Name :] and [Subject Code :]";
}



?>