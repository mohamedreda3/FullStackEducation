document.querySelector('.logn').onsubmit = (e) => {
    e.preventDefault();
}
document.querySelector('.logn button').onclick = function () {
    this.innerHTML = '<span class="ldbtn"></span>';
}