<?php
include('../../config/config.php');
?>
    <div class="usinfo">
        <div id="add" class="addtech_col"> <span class="addtch"><i class="fas fa-plus"></i></span>
            <h4>Sign new subject</h4>
            <form class="tech_col">
                <input type="text" id="nm" name="tchnm" placeholder="Enter Subject name">
                <input type="text" id="eml" name="tcheml" placeholder="Enter Subject code">
                <select id="class" name="class">
                    <?php
                    $xxx = mysqli_query($conn,"SELECT * FROM classes");
                    while($crow = mysqli_fetch_assoc($xxx)){
                       
                    echo "<option id="."\"". $crow['class_name'] ."\"" ." value="."\"". $crow['class_code'] ."\"" .">". $crow['class_name'] ." - ". $crow['class_code'] ."</option>" ;
                    }
                    ?>
                </select>
                <button type="submit" class="hlsnp">Sign-Subject</button>
            </form>
        </div>
        <!--      Edit Form      -->
        <div id="edit" class="addtech_col"> <span><i class="fas fa-plus"></i></span>
            <h4>Edit this Student</h4>
            <form class="edit_tch tech_col">
                <div class="in_fld">
                    <label>Name</label>
                    <input type="text" id="n_m" name="tch_nm" placeholder="Enter Subject name"> </div>
                <div class="in_fld" style="display:none;">
                    <label>Email</label>
                    <input type="text" id="e_ml" name="tch_eml" placeholder="Enter Student e-mail"> </div>
                <button type="submit" class="hlsnp">Edit-Subject</button>
            </form>
        </div>
        <!--      Edit Form      -->


        <!--      Assign class to Student Form      -->
        <div id="assign_teacher" class="addtech_col"> <span><i class="fas fa-plus"></i></span>
            <h4>Assign class to subject</h4>
            <form class="assign_tech tech_col">

            <div class="in_fld">
                    <label>subject code</label>
            <select id="stu_name" name="stu_name">
                    <?php
                    $t_eml = mysqli_query($conn,"SELECT * FROM subject");
                    while($crow = mysqli_fetch_assoc($t_eml)){
                       
                    echo "<option id="."\"". $crow['subject_code'] ."\"" ." value="."\"". $crow['subject_code'] ."\"" .">". $crow['subject_code'] ." - ". $crow['subject_name'] ."</option>" ;
                    }
                    ?>
                </select>
            </div>
                <div class="in_fld">
                    <label>Class</label>
                <select id="class_code" name="class_code">
                    <?php
                    $xexx = mysqli_query($conn,"SELECT * FROM classes");
                    while($crow = mysqli_fetch_assoc($xexx)){

                    echo "<option id="."\"". $crow['class_name'] ."\"" ." value="."\"". $crow['class_code'] ."\"" .">". $crow['class_name'] ." - ". $crow['class_code'] ."</option>" ;
                    }
                    ?>
                </select>
                </div>
                <button type="submit" class="hlsnp">Assign-class</button>
            </form>
        </div>
        <!--      Assign class to Student Form      -->


        <!--        <h2 class="sidetitle">Student management</h2>-->
        <div class="add">
            <h4>Subject Side</h4> <div class="as_ad"> <span class='classtech' id='Add_Teacher'><img src="assets/images/add.png"></span> <span class='classtech assign_student' id='Add_Teacher'><img src="assets/images/assign.png"></span> </div> </div>
        <div class="table__row">
            <table class="tchrtbl">
                <thead>
                    <tr>
                        <td>Sub_name</td>
                        <td>Sub_code</td>
                        <td>Class_code</td>
                        <td data-label='Edit'>Actions</td>
                    </tr>
                </thead>
                <?php  
                 $xxxx = mysqli_query($conn,"SELECT * FROM subject");
            $rowx = mysqli_num_rows($xxxx);
            $pages__number = ceil($rowx / 5);
                $start = 0;
                // echo $_GET['u'];
                if(!isset($_GET['u']) ){
                    $_GET['u'] = 1;
                }
                if($_GET['u'] == 'NaN'){

                }
                $start = ($_GET['u']-1)*5; // عشان لو عملت البداية من رقم الصفحة ال اتكيت عليه هيبدألى من مثلا واحد واتنين مش من أو منا واقف من 3 و 6 و 9 او غيره

                if($_GET['u'] < 1 || $_GET['u'] > $pages__number){
                    echo "<tr class='ntfnd'> <td>This page is not found </td></tr>";
                }else{
                   
    $x = mysqli_query($conn,"SELECT * FROM subject limit $start , 5");
            $eml = [];
            $class = "";

//                echo $pages__number;
        while($row = mysqli_fetch_assoc($x)){
            $name = $row['subject_name'];          
            $email = $row['subject_code'];
            
             $xx = mysqli_query($conn,"SELECT * FROM subject_class JOIN subject WHERE subject_class.subject_code = '$email'");
            while($xrow = mysqli_fetch_assoc($xx)){
                if($xrow['subject_code'] == $email){
                $clssid = $xrow['class_code'];
                $y = mysqli_query($conn,"SELECT * FROM classes JOIN subject_class WHERE classes.class_code = '$clssid'");
                echo mysqli_error($conn);
                    $yrow = mysqli_fetch_assoc($y);
                    $clssnm = $yrow['class_name'];
                 $class .= "<span class='ofclass'><span class='classes' id='$clssnm'>" .$clssid. "</span><span class='delete_from_class' onclick='delete_from_class(this)'><i class='fa fa-trash' aria-hidden='true'></i></span></span>";
                }
            }
        
            echo "<tr><td data-label='stu_name'> $name </td><td data-label='stu_email'>". $email ."</td><td data-label='Class_code'><div class='class_col'> $class </div></td><td data-label='Edit'><div class='actions'><span class='edit_student' onclick='edit_function(this,data_edit)'><i class='fa fa-edit' aria-hidden='true'></i></span><span class='delete_student' onclick='delete_function(this,getElement)'><i class='fa fa-trash' aria-hidden='true'></i></span></div></td></tr>";
            $class = ""; 
        }
                }
    ?>
            </table>
        </div>
        <div class='pages'> <a class='backward wrd' href="?q=sub&u=<?php if($_GET['u'] == 1 ){echo $pages__number;}else{echo $_GET['u']-1;} ?>"><i class="fas fa-angle-left"></i><i class="fas fa-angle-left"></i></a>
            <?php
            if($pages__number == 0){$pages__number = 1;}
               for($i = 1 ; $i <= $pages__number ; $i++){
                echo "<a href=?q=sub&u=".$i.">".$i."</a>";
            }
            
//                echo $rowx;
            ?> <a class='toward wrd' href="?q=tea&u=<?php if($_GET['u'] >= $pages__number ){echo 1;}else{echo $_GET['u']+1;}?>"><i class="fas fa-angle-right"></i><i class="fas fa-angle-right"></i></a> </div>
        <div id="myModal" class="modal fade">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header flex-column">
                        <div class="icon-box"> <i class="material-icons">X</i> </div>
                        <h4 class="modal-title w-100">Are you sure?</h4> </div>
                    <div class="modal-body">
                        <p>Do you really want to delete these records? This process cannot be undone.</p>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="subject/subjectManagement.js"></script>
