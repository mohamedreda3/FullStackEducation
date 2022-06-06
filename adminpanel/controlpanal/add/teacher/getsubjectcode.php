<?php
require('../../../../config/config.php');
if(!empty($_POST['teacher_email'])){
$email = $_POST['teacher_email'];
$optionsElements = "";
$getClassCode = mysqli_query($conn,"SELECT * FROM tech_class WHERE email = '$email'");
if($getClassCode){
while($ClassCode = mysqli_fetch_assoc($getClassCode)){
	$class_id = $ClassCode['class_id'];
$getSubjectCode = mysqli_query($conn,"SELECT * FROM subject_class WHERE class_code = '$class_id'");
while($subjectCode = mysqli_fetch_assoc($getSubjectCode)){
$code =  $subjectCode['subject_code'];
$getSubjectName = mysqli_query($conn,"SELECT * FROM subject WHERE subject_code = '$code'");
while($subjectName = mysqli_fetch_assoc($getSubjectName)){
$optionsElements .=  "<option id="."\"". $subjectName['subject_name'] ."\"" ." value="."\"". $subjectName['subject_code'] ."\"" .">". $subjectName['subject_name'] ." - ". $subjectName['subject_code'] ."</option>";
}

}
}
echo($optionsElements);
}else{
	echo 'This account is not in class, yet';
}

}
?>