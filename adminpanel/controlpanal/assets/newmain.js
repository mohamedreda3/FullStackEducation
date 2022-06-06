// xml_request_manipulate_data ======================================================
var param = "";
function xml_request_manipulate_data(data_form, php_file, data_response, function_3ady_gdn = new Function()) {
    var res_data;
    let xml_req = new XMLHttpRequest();
    xml_req.open('POST', php_file, true);
    xml_req.onload = function () {
        if (xml_req.readyState == XMLHttpRequest.DONE && xml_req.status == 200) {
            res_data = xml_req.response;
            if (res_data == data_response) {
                chckadd(res_data);
                param = res_data;
                function_3ady_gdn(param);
                document.querySelector('.errtxt').style.background = '#35a785';
            } else {
                chckadd(res_data);

                document.querySelector('.errtxt').style.background = '#fc7169';
            }
        }
    }
    console.log(res_data);
    xml_req.send(data_form);
}
// xml_request_manipulate_data ======================================================

// Insert_Data_Into_Table ======================================================
function insert_data_into_table(place, tr_data) {
    var trElement = document.createElement('tr');
    trElement.innerHTML = tr_data;
    place.insertAdjacentElement('beforeend', trElement);
}

function insert_data(_data_) {
    if (document.querySelector('.ntfnd') != null) {
        document.querySelector('.table__row table tbody').removeChild(document.querySelector('.ntfnd'));
    }
    console.log("inserted");
    if (!(document.querySelector('.table__row table tbody').childNodes.length > 5)) {
        insert_data_into_table(document.querySelector('.table__row table tbody'), _data_);
        console.log("inserted");
    } else {
        if (u__params.get('u') == null || isNaN(u__params.get('u')) || u__params.get('u') != parseInt(a[a.length - 2].innerText)) {
            location.href = window.location.href.split('=')[0] + "=" + window.location.href.split('=')[1] + "=" + (parseInt(a[a.length - 3].innerText) + 1);
        }
        else {
            location.href = window.location.href.split('=')[0]+"="+window.location.href.split('=')[1]+"="+(parseInt(a[a.length - 3].innerText) + 2);
        }
    }
}
// Insert_Data_Into_Table ======================================================

// Edit Function ======================================================
function edit_function(element, function_give_value) {
    edit_tech.classList.add('active');
    function_give_value(element);
}
// Edit Function ======================================================

// Delete Function ======================================================
function delete_function(element, function_give_value) {
    document.querySelector('#myModal').classList.add('active');
    function_give_value(element);
}
// Delete Function ======================================================

// Assign Function ======================================================
if(document.querySelector('.assign_student') != null){
document.querySelector('.assign_student').onclick = function() {
document.querySelector('#assign_teacher').classList.toggle('active');
}
}
// Assign Function ======================================================