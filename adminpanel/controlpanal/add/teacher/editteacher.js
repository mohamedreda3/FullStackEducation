let form_lgn = document.querySelector('form.edit_tch')
    , sbmt_lgn = form_lgn.querySelector('button');
var _y, _x;
form_lgn.onsubmit = function (e) {
    e.preventDefault();
}
var sor = function () {
    sbmt_lgn.onclick = function () {
        console.log(form_lgn);
        let xhr_lgn = new XMLHttpRequest();
        xhr_lgn.open('POST', 'add/teacher/editteacher.php', true);
        xhr_lgn.onload = function () {
            if (xhr_lgn.readyState == XMLHttpRequest.DONE && xhr_lgn.status == 200) {
                let _data = xhr_lgn.response;
                sbmt_lgn.innerHTML = '<span class="ldbtn"></span>';
                if (_data == 'Teacher Edited') {
                    chckadd(_data, sbmt_lgn, "Edit Teacher");
                    document.querySelector('.errtxt').style.background = '#35a785';
                    tchrtbl.childNodes[3].childNodes[cc].childNodes[1].innerText = edit_tech_form.querySelector('#n_m').value;
                    tchrtbl.childNodes[3].childNodes[cc].childNodes[3].innerText = edit_tech_form.querySelector('#p_hn').value;
                }
                else {
                    document.querySelector('.errtxt').style.background = '#fc7169';
                    chckadd(_data, sbmt_lgn, "Edit Teacher");
                }
            }
        }
        let frm_lgdt = new FormData(form_lgn);
        xhr_lgn.send(frm_lgdt);
    }
}
sor();


// Assign Class =============================== Assign Class //



document.querySelector('#assign_teacher form').onsubmit = function (e) {
    e.preventDefault();

    var assign_form_data = new FormData();
    var tch_eml = document.querySelectorAll('#assign_teacher form #teacher_name option')[document.querySelector('#assign_teacher form #teacher_name').selectedIndex].value;

    assign_form_data.append("tech_eml", tch_eml);

    var class_code = document.querySelectorAll('#assign_teacher form #class_code option')[document.querySelector('#assign_teacher form #class_code').selectedIndex].value;
    console.log(class_code);

    assign_form_data.append("class_cd", class_code);
    var spanEle = document.createElement('span');
     spanEle.classList.add('ofclass');
    spanEle.innerHTML = `<span class='classes' id='$clssnm'>${class_code}</span><span class='delete_student' onclick='delete_from_class(this)'><i class='fa fa-trash' aria-hidden='true'></i></span>`;
    var tr_index = 0;
    document.querySelector('.table__row table tbody').childNodes.forEach(function (item, index) {
        if (item.childNodes.length > 0) {
            if (item.childNodes[2].innerText == tch_eml) {
                tr_index = index;
            }
        }
    })
    console.log(tr_index);
    var tcr_class_add = function () { return document.querySelector('.table__row table tbody').childNodes[tr_index].childNodes[4].childNodes[0].insertAdjacentElement('beforeend', spanEle);
     };
    console.log(spanEle)
    xml_request_manipulate_data(assign_form_data, 'class/assign.php', 'Class Assigned', tcr_class_add);
}
// Assign Class =============================== Assign Class //


// Delete From Class =================================================

function delete_from_class(element){

let classCode = element.parentElement.querySelector('.classes').innerText;
let subjectCode = element.parentElement.parentElement.parentElement.parentElement.querySelector('td[data-label=Teacher_email]').innerText;
let deleteFromClassFormData = new FormData();

deleteFromClassFormData.append('classCode',classCode);
deleteFromClassFormData.append('subjectCode',subjectCode);

var deleted_class = function (){
    return element.parentElement.parentElement.removeChild(element.parentElement)   
}

xml_request_manipulate_data(deleteFromClassFormData, 'add/teacher/deleteclass.php', 'Class Deleted', deleted_class);

}

// Delete From Class =================================================


function delete_subject(element){

let classCode = element.parentElement.querySelector('.classes').innerText;
let subjectCode = element.parentElement.parentElement.parentElement.parentElement.querySelector('td[data-label=Teacher_email]').innerText;
let deleteFromClassFormData = new FormData();

deleteFromClassFormData.append('classCode',classCode);
deleteFromClassFormData.append('subjectCode',subjectCode);

var deleted_class = function (){
    return element.parentElement.parentElement.removeChild(element.parentElement)   
}

xml_request_manipulate_data(deleteFromClassFormData, 'add/teacher/deletesubject.php', 'Subject Deleted', deleted_class);

}