var _del = document.querySelectorAll('.delete');

function xxor() {
    console.log(_del);
    _del = document.querySelectorAll('.delete');
    _del.forEach((item, index) => item.onclick = function () {
        document.querySelector("#myModal").classList.add('active');
        console.log(item)
        document.querySelector(".btn-danger").onclick = function () {
                document.querySelector("#myModal").classList.remove('active');
                var _delt = new XMLHttpRequest();
                _delt.open('POST', 'add/teacher/deleteteacher.php', true);
                _delete(index, _delt);
            }
    })
}

function _delete(_ind, xxx) {
    
    xxx.onload = function () {
        if (xxx.readyState == XMLHttpRequest.DONE && xxx.status == 200) {
            let _dltdta = xxx.response;
            if (_dltdta == "Teacher Deleted") {
                tchrtbl.childNodes[3].removeChild(_del[_ind].parentNode.parentNode.parentNode);
                if (!(tchrtbl.childNodes[3].childNodes.length > 1)) {
                    if (u__params.get('u') != 1 && u__params.get('u') != null) {
                        location.href = window.location.href.split('=')[0] + "=" + window.location.href.split('=')[1] + "=" + (parseInt(a[u__params.get('u')].innerText) - 1);
                    }
                    else {
                        if (u__params.get('u') == null || u__params.get('u') == 1) {
                            location.reload();
                        }
                    }
                }
            }
            console.log(_dltdta);
            chckadd(_dltdta);
        }
    }
    let _dlt__form = new FormData();
    if (_ind >= 0) {
        _dlt__form.append('e_mail', _del[_ind].parentNode.parentNode.parentNode.childNodes[2].innerText);
    }
    xxx.send(_dlt__form);
}
xxor();