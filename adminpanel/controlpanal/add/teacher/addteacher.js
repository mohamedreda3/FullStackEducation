let formlgn = document.querySelector('form.tech_col')
    , sbmtlgn = formlgn.querySelector('button');
let tchrtbl = document.querySelector('.tchrtbl');
// var y, x;
formlgn.onsubmit = function (e) {
    e.preventDefault();
}
sbmtlgn.onclick = function () {
    let xhrlgn = new XMLHttpRequest();
    xhrlgn.open('POST', 'add/teacher/addteacher.php', true);
    var slct = formlgn.querySelector('select')
        , options = slct.querySelectorAll('option');
    //    console.log(options[slct.selectedIndex].id);
    xhrlgn.onload = function () {
            if (xhrlgn.readyState == XMLHttpRequest.DONE && xhrlgn.status == 200) {
                let data = xhrlgn.response;
                sbmtlgn.innerHTML = '<span class="ldbtn"></span>';
                if (data == 'Teacher Added') {
                    chckadd(data, sbmtlgn, "Log-In");
                    document.querySelector('.errtxt').style.background = '#35a785';
                    let nwtchr = `<td data-label='Teacher_img'><div class='tech_img'> <img src='../../assets/usersimages/${document.querySelector('input[name="img"]').value == ''?'user.png':document.querySelector('input[name="img"]').value.split("\\")[document.querySelector('input[name="img"]').value.split("\\").length-1]}' alt='${formlgn.querySelector('#nm').value}'> </div></td><td data-label='Teacher_name'>${formlgn.querySelector('#nm').value}</td><td data-label='Teacher_email'>${formlgn.querySelector('#eml').value}</td><td data-label='Teacher_phone'>${formlgn.querySelector('#phn').value}</td><td data-label='Class_code'><div class='class_col'>    <span class='ofclass'><span class='classes' id='${options[slct.selectedIndex].id}'>${document.querySelector('#class').value}</span><span class='delete_from_class' onclick='delete_from_class(this)'><i class='fa fa-trash' aria-hidden='true'></i></span></span></div><td data-label='Subject_code'><div class='class_col'><span class='assignsubject'><div class='formassignsubject' onclick='assignSubject(this)'><i class='fas fa-plus'></i></div></span></div></td><td data-label='Edit'><div class='actions'> <span class='edit'><i class='fa fa-edit' aria-hidden='true'></i></span><span class='delete'><i class='fa fa-trash' aria-hidden='true'></i></span></div></td>`;
                    //                    console.log(tchrtbl.childNodes[3].childNodes.length);
                    var aae = document.createElement('tr');
                    aae.innerHTML = nwtchr;
                    if (document.querySelector('.ntfnd') != null) {
                        tchrtbl.childNodes[3].removeChild(document.querySelector('.ntfnd'));
                    }
                    if (!(tchrtbl.childNodes[3].childNodes.length > 5)) {
                        tchrtbl.childNodes[3].insertBefore(aae, tchrtbl.childNodes[3].childNodes[tchrtbl.childNodes[3].childNodes.length - 1]);
                        //                        console.log(a.length);
                        tchrtbl = document.querySelector('.tchrtbl');
                    }
                    else {
                        console.log(parseInt(a[a.length - 3].innerText));
                        if (u__params.get('u') == null || isNaN(u__params.get('u')) || u__params.get('u') != parseInt(a[a.length - 2].innerText)) {
                            location.href = window.location.href.split('=')[0] + "=" + window.location.href.split('=')[1] + "=" + (parseInt(a[a.length - 3].innerText) + 1);
                        }
                        else {
                            location.href = window.location.href.split('=')[0] + "=" + window.location.href.split('=')[1] + "=" + (parseInt(a[a.length - 3].innerText) + 2);
                        }
                    }
                    //                    
                    edit = document.querySelectorAll('.edit');
                    xor();
                    sor();
                    xxor();
                }
                else {
                    document.querySelector('.errtxt').style.background = '#fc7169';
                    chckadd(data, sbmtlgn, "Log-In");
                }
            }
        }
        //    console.log(slct.value);
    let frmlgdt = new FormData(formlgn);
    xhrlgn.send(frmlgdt);
}
// Assign Subject =====================================

var getNode = function returnElement(node){
    return node;
}

var nodeElement;

async function assignSubject(element){ 
    let assignSubjectFormData = new FormData();
    document.querySelector('div#assign_subject').classList.add('active');
    let email = element.parentElement.parentElement.parentElement.parentElement.querySelector('tr td[data-label=Teacher_email]').innerText;
    document.querySelector('div#assign_subject form input').value = email;
    assignSubjectFormData.append('teacher_email',email)
    const sendData = await fetch('add/teacher/getsubjectcode.php',{
        method: 'POST',
        body: assignSubjectFormData
    })
    const getData = await sendData.text();
    var data = getData;
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
    
    xml_request_manipulate_data(subjectForm, 'add/teacher/assignsubject.php', 'Subject Assigned', tcr_class_add);
    
});
// Assign Subject =====================================