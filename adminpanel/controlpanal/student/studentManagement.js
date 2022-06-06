// add===========================================================
let addclass = document.querySelector('.addtech_col form'),
    addclassbtn = document.querySelector('.addtech_col form button');

addclass.onsubmit = (e) => { e.preventDefault(); };

var data_add = function () { return insert_data(_dta()) };

addclassbtn.onclick = function (e) {
    xml_request_manipulate_data(new FormData(addclass), 'student/add.php', 'Student Added', data_add);
}

var slct = addclass.querySelector('select')
        , options = slct.querySelectorAll('option');

function _dta() {
    return `<tr><td data-label='Teacher_img'><div class='tech_img'> <img src='../../assets/usersimages/${document.querySelector('input[name="img"]').value == ''?'user.png':document.querySelector('input[name="img"]').value.split("\\")[document.querySelector('input[name="img"]').value.split("\\").length-1]}' alt='${addclass.querySelector('#nm').value}'> </div></td><td data-label='student_name'>${addclass.querySelector('input[name="tchnm"]').value}</td><td data-label='student_email'>${addclass.querySelector('input[name="tcheml"]').value}</td><td data-label='student_phone'>${addclass.querySelector('input[name="tchphn"]').value}</td><td data-label='student_address'>${addclass.querySelector('input[name="address"]').value}</td><td data-label='Class_code'><div class='class_col'><span class='ofclass'><span class='classes' id='${options[slct.selectedIndex].id}'>${addclass.querySelector('#class').value}</span><span class='delete_from_class' onclick='delete_from_class(this)'><i class='fa fa-trash' aria-hidden='true'></i></span></span>
    </div></td><td data-label='Subject_code'><div class='class_col'> $subject <span class='assignsubject'><div class='formassignsubject' onclick='assignSubject(this)'><i class='fas fa-plus'></i></div></span></div></td><td data-label='Edit'><div class='actions'><span class='edit_class'  onclick='edit_function(this,data_edit)'><i class='fa fa-edit' aria-hidden='true'></i></span><span class='delete_class' onclick='delete_function(this,getElement)'><i class='fa fa-trash' aria-hidden='true'></i></span></div></td></tr>`;
}
// add===========================================================

// Edit Class ===============================
var node;
var data_edit = function (element) {
   node = nodeReturn(element)
   console.log(document.querySelectorAll('#edit input')[0])
    return [document.querySelectorAll('#edit input')[0].value = element.parentNode.parentNode.parentNode.childNodes[1].innerText , document.querySelectorAll('#edit input')[2].value = element.parentNode.parentNode.parentNode.childNodes[3].innerText ];
};

var nodeReturn = function returnNode(node){
    return node;
};


var edit_data = function () {
    return [ node.parentNode.parentNode.parentNode.childNodes[1].innerText = document.querySelectorAll('#edit input')[0].value, node.parentNode.parentNode.parentNode.childNodes[3].innerText = document.querySelectorAll('#edit input')[2].value ];
};

document.querySelector("#edit form button[type=submit]").onclick = function edit_this(e) {
    e.preventDefault();
    var form_edit = new FormData(document.querySelector("#edit form"));

    xml_request_manipulate_data(form_edit, 'student/edit.php', 'Student Editted', edit_data);
}
// Edit Class ===============================

var deleted_data = function (element) {
    return document.querySelector('.table__row table tbody').removeChild(node.parentNode.parentNode.parentNode);
};

var getElement = function (element) {
    node = nodeReturn(element)
};

document.querySelector('.btn-danger').onclick = function () {
    console.log(node);
    var delete_form_data = new FormData();
    delete_form_data.append('e_mail', node.parentNode.parentNode.parentNode.childNodes[2].innerText);
    xml_request_manipulate_data(delete_form_data, 'student/delete.php', 'Student Deleted', deleted_data);
    document.querySelector('#myModal').classList.remove('active');
}

document.querySelector('.btn-secondary').onclick = function () {
    document.querySelector('#myModal').classList.remove('active');
}

// ================================================================

document.querySelector('.assign_student').onclick = function() {
document.querySelector('#assign_teacher').classList.toggle('active');
}


document.querySelector('#assign_teacher form').onsubmit = function (e) {
    e.preventDefault();

    var assign_form_data = new FormData();
  var tch_eml = document.querySelectorAll('#assign_teacher form #stu_name option')[document.querySelector('#assign_teacher form #stu_name').selectedIndex].value;

    var class_code = document.querySelectorAll('#assign_teacher form #class_code option')[document.querySelector('#assign_teacher form #class_code').selectedIndex].value;
    console.log(class_code);

    assign_form_data.append("tech_eml", tch_eml);
    assign_form_data.append("class_cd", class_code);

       var tr_index = -1;
    document.querySelector('.table__row table tbody').childNodes.forEach(function (item, index) {
        if (item.childNodes.length > 0) {
            if (item.childNodes[2].innerText == tch_eml) {
                tr_index = index;
            }
        }
    })
    console.log(tr_index);

    var spanEle = document.createElement('span');
    spanEle.classList.add('ofclass');

    spanEle.innerHTML = `<span class='classes' id='$clssnm'>${class_code}</span><span class='delete_from_class' onclick='delete_from_class(this)'><i class='fa fa-trash' aria-hidden='true'></i></span>`;

    var tcr_class_add = function () { 
if(tr_index == -1) return;
        return document.querySelector('.table__row table tbody').childNodes[tr_index].childNodes[5].childNodes[0].insertAdjacentElement('beforeend', spanEle);
};

    xml_request_manipulate_data(assign_form_data, 'student/assign.php', 'Student Assigned', tcr_class_add);
}

// Delete From Class =================================================

function delete_from_class(element){

let classCode = element.parentElement.querySelector('.classes').innerText;
let subjectCode = element.parentElement.parentElement.parentElement.parentElement.querySelector('td[data-label=stu_email]').innerText;
let deleteFromClassFormData = new FormData();

deleteFromClassFormData.append('classCode',classCode);
deleteFromClassFormData.append('subjectCode',subjectCode);

var deleted_class = function (){
    return element.parentElement.parentElement.removeChild(element.parentElement)   
}

xml_request_manipulate_data(deleteFromClassFormData, 'student/deleteclass.php', 'Class Deleted', deleted_class);

}

// Delete From Class =================================================

// Assign Subject =====================================
var getNode = function returnElement(node){
    return node;
}

var nodeElement;
async function assignSubject(element){ 
    let assignSubjectFormData = new FormData();
    document.querySelector('div#assign_subject').classList.add('active');
    let email = element.parentElement.parentElement.parentElement.parentElement.querySelector('tr td[data-label=stu_email]').innerText;
    document.querySelector('div#assign_subject form input').value = email;
    assignSubjectFormData.append('teacher_email',email)
    const sendData = await fetch('student/getsubjectcode.php',{
        method: 'POST',
        body: assignSubjectFormData
    })
    const getData = await sendData.text();
    var data = getData;
    console.log(data)
    document.querySelector('div#assign_subject form select').innerHTML = data;
    nodeElement = getNode(element);
}

document.querySelector('div#assign_subject form').addEventListener('submit',async function(e){
e.preventDefault();
let subjectForm = new FormData(document.querySelector('div#assign_subject form'));

var spanEle = document.createElement('span');
     spanEle.classList.add('ofclass');
     spanEle.innerHTML = `<span class='classes' id='${document.querySelector('div#assign_subject form select').value}'>${document.querySelector('div#assign_subject form select').value}</span><span class='delete_student' onclick='delete_subject(this)'><i class='fa fa-trash' aria-hidden='true'></i></span>`;

    var tcr_class_add = function () { return nodeElement.parentElement.parentElement.insertAdjacentElement('beforeend', spanEle);
     };
    
    xml_request_manipulate_data(subjectForm, 'student/assignsubject.php', 'Subject Assigned', tcr_class_add);
    
});


// Delete From Class =================================================


function delete_subject(element){

let classCode = element.parentElement.querySelector('.classes').innerText;
let subjectCode = element.parentElement.parentElement.parentElement.parentElement.querySelector('td[data-label=stu_email]').innerText;
let deleteFromClassFormData = new FormData();

deleteFromClassFormData.append('classCode',classCode);
deleteFromClassFormData.append('subjectCode',subjectCode);

var deleted_class = function (){
    return element.parentElement.parentElement.removeChild(element.parentElement)   
}

xml_request_manipulate_data(deleteFromClassFormData, 'student/deletesubject.php', 'Subject Deleted', deleted_class);

}


// ==================================================