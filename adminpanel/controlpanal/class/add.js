let addclass = document.querySelector('.addtech_col.add__cls__col form'),
    addclassbtn = document.querySelector('.addtech_col.add__cls__col form button');

addclass.onsubmit = (e) => { e.preventDefault(); };

var data_add = function () { return insert_data(_dta()) };

addclassbtn.onclick = function (e) {
    xml_request_manipulate_data(new FormData(addclass), 'class/add.php', 'Class Added', data_add);
}

function _dta() {
    return `<tr><td data-label='class_name'>${addclass.querySelector('input[name="cls_nm"]').value}</td><td data-label='class_code'>${addclass.querySelector('input[name="cls_cd"]').value}</td><td data-label='Edit-second'><div class='actions'><span class='edit_class' onclick='edit_function(this,data_edit)'><i class='fa fa-edit' aria-hidden='true'></i></span><span class='delete_class' onclick='delete_function(this,getElement)'><i class='fa fa-trash' aria-hidden='true'></i></span></div></td></tr>`;
}

// Edit Class ===============================
var node;
var data_edit = function (element) {
   node = nodeReturn(element)
    return [document.querySelector('#edit input').value = element.parentNode.parentNode.parentNode.childNodes[0].innerText];
};

var nodeReturn = function returnNode(node){
    return node;
};


var edit_data = function () {
    return node.parentNode.parentNode.parentNode.childNodes[0].innerText = document.querySelector('#edit input').value;
};

document.querySelector("#edit form button[type=submit]").onclick = function edit_this(e) {
    e.preventDefault();
    var form_edit = new FormData(document.querySelector("#edit form"));
    form_edit.append('cls_cd', node.parentNode.parentNode.parentNode.childNodes[1].innerText);
    xml_request_manipulate_data(form_edit, 'class/edit.php', 'Class Editted', edit_data);
}
// Edit Class ===============================

// Delete Class ===============================
var deleted_data = function (element) {
    return document.querySelector('.table__row table tbody').removeChild(node.parentNode.parentNode.parentNode);
};

var getElement = function (element) {
    node = nodeReturn(element)
};

document.querySelector('.btn-danger').onclick = function () {
    console.log(node);
    var delete_form_data = new FormData();
    delete_form_data.append('cls_cd', node.parentNode.parentNode.parentNode.childNodes[1].innerText);
    xml_request_manipulate_data(delete_form_data, 'class/delete.php', 'Class Deleted', deleted_data);
    document.querySelector('#myModal').classList.remove('active');
}

document.querySelector('.btn-secondary').onclick = function () {
    document.querySelector('#myModal').classList.remove('active');
}


