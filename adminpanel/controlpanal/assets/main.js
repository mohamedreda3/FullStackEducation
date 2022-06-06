/*==================================================================*/
let cntrl = document.querySelectorAll('.admnpg');
// console.log(window.location.href.substring(0,window.location.href.indexOf('?')));
let win_locate = window.location.href.substring(0,window.location.href.indexOf('?'));
for (i = 0; i < cntrl.length; i++) {
    cntrl[i].onclick = function () {
        location.href = `${win_locate}?q=${this.id}&u=1`;
    };
};
/*==================================================================*/
/*==================================================================*/
let pluse = document.querySelector('#Add_Teacher');
let close = document.querySelectorAll('.addtech_col span');
let addtech_col = document.querySelector('.addtech_col');
let edit_tech = document.querySelector('#edit');
let edit_tech_form = document.querySelector('#edit form');
if(pluse != null){
pluse.addEventListener("click", function () {
    addtech_col.classList.add('active');
    edit_tech.classList.remove('active');
});

}
if(close != null){
for (i = 0; i < close.length; i++) {
    close[i].addEventListener("click", function () {
        if(this.parentNode.parentNode != null){
            this.parentNode.parentNode.classList.remove('active');
        }
        if(this.parentNode != null){
            this.parentNode.classList.remove('active');
        }

    });
}
}
let edit = document.querySelectorAll('.edit')
    , cc = 0;
if(edit != null){
function xor() {
    for (let i = 0; i < edit.length; i++) {
        edit[i].addEventListener("click", function () {
            cc = i;
            console.log(this);
            edit_tech.classList.add('active');
            addtech_col.classList.remove('active');
            edit_tech_form.querySelector('#n_m').value = this.parentNode.parentNode.parentNode.childNodes[1].innerText;
            edit_tech_form.querySelector('#p_hn').value = this.parentNode.parentNode.parentNode.childNodes[3].innerText;
            edit_tech_form.querySelector('#e_ml').value = this.parentNode.parentNode.parentNode.childNodes[2].innerText;
            console.log(this.parentNode.parentNode.parentNode.childNodes);
        });
    }
}
xor();
}
/*==================================================================*/
var a = document.querySelectorAll('.pages a');
var u__params = new URLSearchParams(window.location.search);
if(a.length > 0) {
if (u__params.get('u') == null) {
    a[1].classList.add('active');
}
for (i = 1; i < a.length - 1; i++) {
    if (i == u__params.get('u')) {
        a[i].classList.add('active');
    }
}
}

var y, x;
function chckadd(dat, but = "", butstr = "") {
    clearTimeout(x);
    clearTimeout(y);
    setTimeout(() => {
        document.querySelector('.errtxt').classList.remove('active');
        document.querySelector('.errtxt').classList.add('active');
        x = setTimeout(() => {
            document.querySelector('.errtxt').classList.remove('active');
        }, 3000);
        document.querySelector('.errtxt').innerHTML = dat;
        but.innerHTML = butstr;
    }, 700);
}

if(document.querySelector('.classtech.assign') != null){
document.querySelector('.classtech.assign').onclick = function(){
    document.querySelector('#assign_teacher').classList.toggle('active');
}
}