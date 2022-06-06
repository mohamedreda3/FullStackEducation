<?php
require('../../../config/config.php');

if(!empty($_POST['tchnm']) && !empty($_POST['tcheml'])&& !empty($_POST['tchpsrd'])&& !empty($_POST['tchphn'])&& !empty($_POST['class'])&& !empty($_POST['address'])){
$tchnm = $_POST['tchnm'];
$tcheml = $_POST['tcheml'];
$tchpsrd = md5($_POST['tchpsrd']);
$tchphn = $_POST['tchphn'];
$class = $_POST['class'];
if(filter_var($tcheml,FILTER_VALIDATE_EMAIL)){
if(is_numeric($tchphn)){
if(mysqli_fetch_row(mysqli_query($conn,"SELECT * FROM students WHERE stu_eml  = '$tcheml'")) > 0){
echo $tcheml. " is already exist";
}else{
   if(!empty($_FILES['img']['tmp_name'])){
      $simg = $_FILES['img'];
      $bsnm = '../../../assets/usersimages/'.$simg['name'];
      $bsname  = '../../assets/usersimages/'.$simg['name'];
      }else{
          $bsname  = '../../assets/usersimages/user.png';
      }
      $extarr = array('jpg','jpeg','png','gif');
  if(empty($_FILES['img']['tmp_name']) || in_array(pathinfo($simg['name'],PATHINFO_EXTENSION), $extarr) ){
      if(empty($_FILES['img']['tmp_name']) || move_uploaded_file($simg["tmp_name"],$bsnm) || empty($_FILES['img']['tmp_name'])){
 if(mysqli_query($conn,"INSERT INTO students(stu_eml,stu_nm,stu_psrd,stu_phone,stu_img) VALUES('$tcheml','$tchnm','$tchpsrd','$tchphn','$bsname')")){ 

mysqli_query($conn,"INSERT INTO tech_class(email,class_id) VALUES('$tcheml','$class')");
echo "Student Added"; 
}
      }
   }
}
}else{
   echo $tchphn. " is not validate phone number"; 
}
}else{
   echo $tcheml. " is not validate email"; 
}
}else if(empty($_POST['tchnm'])){
echo "you must enter Studend name";
}else if(empty($_POST['tcheml'])){
echo "you must enter Studend email";
}else if(empty($_POST['tchpsrd'])){
echo "you must enter Studend password";
}else if(empty($_POST['tchphn'])){
echo "you must enter Studend number phone";
}




?>