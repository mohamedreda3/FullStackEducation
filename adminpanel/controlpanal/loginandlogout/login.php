<?php
require('../../../config/config.php');

if(!empty($_POST['logeml']) && !empty($_POST['logpsrd'])){
$emllgn = $_POST['logeml'];
$psrdlgn = md5($_POST['logpsrd']);
if(mysqli_fetch_row(mysqli_query($conn,"SELECT * FROM admin WHERE admin_eml = '$emllgn'")) > 0){
if(mysqli_fetch_row(mysqli_query($conn,"SELECT * FROM admin WHERE admin_eml = '$emllgn' AND admin_psrd = '$psrdlgn' ")) > 0){
           session_start();
           $_SESSION['eml'] = $emllgn;
           echo 'success';
}else{
// echo $psrdlgn;
echo 'Email or password is not correct';
}
}else{
    echo $emllgn . ' - not exist';
} 
}else if(empty($_POST['logeml'])){
echo 'you must enter - Email';
}else if(empty($_POST['logpsrd'])){
echo 'you must enter - Password';
}

?>