<?php
include('../config/config.php');
session_start();
$img = '';
$usrnm = '';
if(isset($_SESSION['email'])){
$email = $_SESSION['email'];
$istchr = $_SESSION['istchr'];
if($istchr == 0){
$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM userinformation WHERE email = '$email' "));
	$img = $row['image'];
	$usrnm = $row['username'];

}else{
   $row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM teachers WHERE teacher_eml = '$email' "));
	$img = $row['teacher_img'];
	$usrnm = $row['teacher_name'];
}
}


// session_destroy();

?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="assets/style.css">
        <title>Commercy-Homepage</title>
    </head>

    <body>
        <nav>
            <h2>Commercy</h2>
            <?php
	if($usrnm == ''){
	echo '<span class="shrdbtn bktlgntbtn lgntbtn"> Log in / signup </span>';
	}else{
    echo '<span class="shrdbtn lgotbtn">Log Out</span>';
    } 
    ?> </nav>
        <div class="container">
            <?php
if($usrnm == ''){
echo '<span class="gthmpg shrdbtn " style="width:100%;">Go to Home page</span>';
echo '<span class="bktlgntbtn baktlgntbtn shrdbtn " style="width:100%;">Back to Log in  </span>';
}else{
echo '<div class="img"> <img src="'. $img .'">
</div>
<div class="usrnm-col"> <h2>Hello, </h2> <h3>' . $usrnm .'</h3> 
</div>
    <div class="cntnr">
        <fieldset>
            <legend class="add">Add product</legend>
            <form action="" class="logn">
                <div class="inpt_fld">
                    <label for="name">name</label>
                    <input type="text" name="name" id="name" required autofocus> </div>
                <div class="inpt_fld">
                    <label for="address">address</label>
                    <input type="text" name="address" id="address" required autofocus> </div>
                <div class="inpt_fld">
                    <label for="id">id</label>
                    <input type="text" name="id" id="id" required> </div>
                <div class="inpt_fld">
                    <label for="age">age</label>
                    <input type="number" name="age" id="age" required autofocus> </div>
                <div class="inpt_fld">
                    <label for="date">Date of birth : </label>
                    <input type="date" name="date" id="date" required autofocus> </div>
                <div class="inpt_fld">
                    <label for="gndr">Gender :</label>
                    <select id="gndr">
                        <option></option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
                <div class="inpt_fld">
                    <label for="gba">GBA</label>
                    <input type="number" name="gba" id="gba" required autofocus> </div>
                <div class="inpt_fld">
                    <label for="fclt">Select your faculty :</label>
                    <select id="fclt">
                        <option></option>
                        <option>Computer science</option>
                        <option>commerce</option>
                    </select>
                </div>
                <div class="inpt_fld chks">
                    <label>Select your debartment :</label>
                    <div class="checks">
                        <div class="inpt_chck">
                            <input type="radio" name="dep" id="is">
                            <label for="is">Information system</label>
                        </div>
                        <div class="inpt_chck">
                            <input type="radio" name="dep" id="it">
                            <label for="it">Information technology</label>
                        </div>
                        <div class="inpt_chck">
                            <input type="radio" name="dep" id="cs">
                            <label for="cs">Computer science</label>
                        </div>
                    </div>
                </div>
                <button type="submit">Submit </button>
            </form>
        </fieldset>
    </div>
</body>
<script>
    document.getElementById("fclt").onchange = () => {
        document.getElementById("fclt").value == "" ? document.querySelector(".chks").style.display = "none" : document.querySelector(".chks").style.display = "grid"
    }
</script>
<span class="shrdbtn gthmpg" style="width:100%;">Go to Home page</span>';
}
?> </div>
        <script type="text/javascript">
            if (document.querySelector('.lgotbtn') == null) {
                document.querySelector('.lgntbtn').onclick = () => {
                    location.href = '../form/form.php'
                };
                document.querySelector('.baktlgntbtn').onclick = () => {
                    location.href = '../form/form.php'
                };
            }
            else {
                document.querySelector('.lgotbtn').onclick = () => {
                    location.href = '../form/logout/logout.php'
                };
            }
        </script>
        <script src="assets/main.js"></script>
    </body>

    </html>