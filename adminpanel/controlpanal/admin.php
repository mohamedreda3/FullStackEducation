<?php
include('../../config/config.php');
session_start();
$usrnm = '';
if(isset($_SESSION['eml'])){
$email = $_SESSION['eml'];
$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM admin WHERE admin_eml = '$email' "));
	$usrnm = $row['username'];	
    $img = $row['admin_img'];

}else{
    header('location:adminform.php');
}


?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--      <link rel="stylesheet" type="text/css" href="../../homepage/assets/style.css">-->
        <link rel="stylesheet" type="text/css" href="assets/style.css">
        <title>Edu - Adminpage</title>
    </head>

    <body>
        <div class="pg-cntnr-col">
            <nav>
                <h2 class="title">
            <i class="fab fa-leanpub"></i> 
            <span>e-Educate</span></h2>
                <!--            <span class="shrdbtn lgotbtn">Log Out</span> -->
                <div class="container">
                    <ul class="toggle">
                        <!--*******************************************-->
                        <li class="drops admnpg" id="tea">
                            <!------------------------ Teachers Drop Menu -->
                            <div class="drpmnuttl"> <i class="fas fa-chalkboard-teacher"></i> <span>Teachers</span> </div>
                            <!--
                            ---------------------- Teachers Drop Menu -->
                        </li>
                        <!--*******************************************-->
                        <li class="drops admnpg" id="stu">
                            <!------------------------ Students Drop Menu -->
                            <div class="drpmnuttl"> <i class="fas fa-user-graduate"></i> <span>Students</span> </div>
                            <!------------------------ Students Drop Menu -->
                        </li>
                        <!--*******************************************-->
                        <li class="drops admnpg" id="sub">
                            <!------------------------ Subjects Drop Menu -->
                            <div class="drpmnuttl"> <i class="fas fa-book"></i> <span>Subjects</span> </div>
                            <!------------------------ Subjects Drop Menu -->
                        </li>
                        <!--*******************************************-->
                        <li class="drops admnpg" id="cla">
                            <!------------------------ Classes Drop Menu -->
                            <div class="drpmnuttl"> <i class="fas fa-users"></i> <span>Classes</span> </div>
                            <!------------------------ Classes Drop Menu -->
                        </li>
                        <!--*******************************************-->
                      <!--   <li class="drops admnpg" id="adm">
                            <div class="drpmnuttl"> <i class="fas fa-users-cog"></i> <span>Admins</span></div>
                        </li> -->
                        <!--*******************************************-->
                    </ul>
                </div>
                <h2 class="shrdbtn lgotbtn">
            <i class="fas fa-sign-out-alt"></i> 
            <span>Log Out</span>
            </h2> </nav>
            <!--*********************************-->
            <!-------------------------- Nav Bar -->
            <div class="pg-cntnt">
                <h4 class='errtxt'></h4>
                <div class="pg-cntnt-nav">
                    <div id="menuToggle"> <div class="menutoggle"><span></span> <span></span> <span></span> </div> </div>
                    <div class="admninformarion">
                        <div class="admnimg"> <img src="<?php echo $img; ?>"> </div>
                        <div class="info"></div>
                    </div>
                </div>
                <div class="pg-cntnt-ctgrs">
                     <div class="pg-names">
                    <div class="pg-name">
                        <div class="pg-name-top">
                            <span><i class="fa fa-list-alt"></i></span>
                            <h3>Categories</h3>
                            <h4>41</h4>
                        </div>
                        <div class="pn-link admnpg" id="category"><i class="fa fa-arrow-right"></i></div>
                    </div>
                    <div class="pg-name">
                        <div class="pg-name-top">
                            <span><i class="fa fa-list-alt"></i></span>
                            <h3>Sub-Categories</h3>
                            <h4>210</h4>
                        </div>
                        <div class="pn-link admnpg" id="subcategory"><i class="fa fa-arrow-right"></i></div>
                    </div>
                    <div class="pg-name">
                        <div class="pg-name-top">
                            <span><i class="fa fa-users"></i></span>
                            <h3>Puplishers</h3>
                            <h4>5</h4>
                        </div>
                        <div class="pn-link admnpg" id="publishers"><i class="fa fa-arrow-right"></i></div>
                    </div>
                </div>
                    <?php
                if(isset($_GET['q'])){
                    $q = $_GET['q'];
                    if($q == 'tea'){
                        include('teachers.php');
                    }else if($q == 'stu'){
                        include('students.php');
                    }else if($q == 'cla'){
                        include('classes.php');
                    }else if($q == 'sub'){
                        include('subjects.php');
                    }else{
                        header('Location:../controlpanal/admin.php');
                    }
                }    
                ?> </div>
            </div>
        </div>
        <script type="text/javascript">
            document.querySelector('.lgotbtn').onclick = () => {
                location.href = 'loginandlogout/logout.php'
            };
            document.querySelector('#menuToggle').onclick = () => {
                document.querySelector('nav').classList.toggle('active');
            };
        </script>
        <script src="assets/all.js"></script>
        <script src="assets/newmain.js"></script>
        <script src="assets/main.js"></script>
    </body>

    </html>