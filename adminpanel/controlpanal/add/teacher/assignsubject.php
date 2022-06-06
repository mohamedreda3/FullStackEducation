<?php
require('../../../../config/config.php');
if(!empty($_POST['teacher_name'])&&!empty($_POST['class_code'])){
$teacher_name = $_POST['teacher_name'];
$class_code = $_POST['class_code'];
// echo $class_code;
$getEmail = mysqli_query($conn,"SELECT * FROM tech_class WHERE email ='$teacher_name'");
if(mysqli_num_rows($getEmail) > 0){
	while ($getClassCode = mysqli_fetch_assoc($getEmail)) {
		$classCode = $getClassCode['class_id'];
		$checkSubjectInClass = mysqli_query($conn,"SELECT * FROM subject_class WHERE class_code ='$classCode' AND subject_code ='$class_code'");
if(mysqli_num_rows($checkSubjectInClass) > 0){
if(mysqli_query($conn,"INSERT INTO tech_subject(subject_code,tech_email) VALUES ('$class_code','$teacher_name')")){
echo "Subject Assigned";
break;
}else{
	echo mysqli_error($conn);
}
}else{
echo $class_code . ' Not found in teacher classes';
}
}
}else{
echo mysqli_error($conn);
}
}else{
	echo "error";
}
?>