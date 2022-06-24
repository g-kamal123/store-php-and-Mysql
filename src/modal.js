// var modalopenbutton = document.getElementById('open-modal');
var modalclosebutton = document.getElementById('close-modal');
var mymodal = document.getElementById('my-modal');
var overlay = document.getElementById('overlay');
document.addEventListener('click',(e) =>{
    if(!e.target.classList.contains('open-modal'))
    return;
    mymodal.classList.add('activate');
    overlay.classList.add('activate');
});
modalclosebutton.addEventListener('click',() =>{
    // if(!e.target.classList.contains('close-modal'))
    // return;
    mymodal.classList.remove('activate');
    overlay.classList.remove('activate');
})