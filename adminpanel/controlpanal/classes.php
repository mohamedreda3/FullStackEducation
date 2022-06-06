<?php
include('../../config/config.php');
?>
<div class="add">
    <h4>Classes Side</h4> <span class='classtech' id='Add_Teacher'><i class="fas fa-plus"></i></span>
</div>

<div id="add" class="addtech_col add__cls__col">
    <div class="frm_hdr"> <span class="addtch"><i class="fas fa-plus"></i></span>
        <h4>Sign New Class</h4>
    </div>
    <form class="tech_col">

        <input type="text" id="nm" name="cls_nm" placeholder="Enter Class Name">

        <input type="text" id="cls_cd" name="cls_cd" placeholder="Enter Class Code" maxlength="6">
        <div class="frm_ftr">
            <button type="submit" id="cls__addition" class="cls_hlsnp"> <i class="fas-fa-check"></i> Add-Class</button>
        </div>
    </form>
</div>

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

<!--      Edit Form      -->
<div id="edit" class="addtech_col add__cls__col"> <span><i class="fas fa-plus"></i></span>
    <h4>Edit this Class</h4>
    <form class="tech_col">

        <div class="in_fld">
            <label>Class Name</label>
            <input type="text" id="cls_nm" name="cls_nnm" placeholder="Enter Class Name"> </div>

        <button type="submit" id="cls__edditation" class="hlsnp">Edit-Class</button>
    </form>
</div>
<!--      Edit Form      -->
<div class="table__row">
    <table class="clsrtbl">
        <thead>
            <tr>
                <td>Class_name</td>
                <td>Class_code</td>
                <td data-label='Edit'>Actions</td>
            </tr>
        </thead>
        <?php
        $xxxx = mysqli_query($conn, "SELECT * FROM classes ");
        $rowx = mysqli_num_rows($xxxx);
        $pages__number = ceil($rowx / 5);
        $start = 0;
        if (!isset($_GET['u'])) {
            $_GET['u'] = 1;
        }
        $start = ($_GET['u'] - 1) * 5; // عشان لو عملت البداية من رقم الصفحة ال اتكيت عليه هيبدألى من مثلا واحد واتنين مش من أو منا واقف من 3 و 6 و 9 او غيره

        if ($_GET['u'] < 1 || $_GET['u'] > $pages__number) {
            echo "<tr class='ntfnd'> <td>This page is not found </td></tr>";
        } else {
            $x = mysqli_query($conn, "SELECT * FROM classes limit $start , 5");

            $eml = [];
            $class = "";

            //                echo $pages__number;
            while ($row = mysqli_fetch_assoc($x)) {
                $class_name = $row['class_name'];
                $class_code = $row['class_code'];

                echo "<tr><td data-label='class_name'>" . $class_name . "</td><td data-label='class_code'>" . $class_code  . "</td><td data-label='Edit-second'><div class='actions'><span class='edit_class' onclick='edit_function(this,data_edit)'><i class='fa fa-edit' aria-hidden='true'></i></span><span class='delete_class'  onclick='delete_function(this,getElement)'><i class='fa fa-trash' aria-hidden='true'></i></span></div></td></tr>";
            }
        }
        ?>
    </table>
</div>
<div class='pages'> <a class='backward wrd' href="?q=clas&u=<?php if ($_GET['u'] == 1) {
                                                                echo $pages__number;
                                                            } else {
                                                                echo $_GET['u'] - 1;
                                                            } ?>"><i class="fas fa-angle-left"></i><i class="fas fa-angle-left"></i></a>
    <?php
    if ($pages__number == 0) {
        $pages__number = 1;
    }
    for ($i = 1; $i <= $pages__number; $i++) {
        echo "<a href=?q=cla&u=" . $i . ">" . $i . "</a>";
    }

    //                echo $rowx;
    ?> <a class='toward wrd' href="?q=cla&u=<?php if ($_GET['u'] >= $pages__number) {
                                                echo 1;
                                            } else {
                                                echo $_GET['u'] + 1;
                                            } ?>"><i class="fas fa-angle-right"></i><i class="fas fa-angle-right"></i></a> </div>

<script src="class/add.js"></script>