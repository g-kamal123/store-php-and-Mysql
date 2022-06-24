// var modalopenbutton = document.getElementById('open-modal');
var modalclosebutton = document.getElementById('close-modal');
var mymodal = document.getElementById('my-modal');
var overlay = document.getElementById('overlay');
document.addEventListener('click',(e) =>{
    if(!e.target.classList.contains('open-modal'))
    return;
    mymodal.classList.add('activate');
    overlay.classList.add('activate');
    var cell_value_email = e.target.closest('tr').childNodes[1].innerText;
    var cell_value_username = e.target.closest('tr').childNodes[0].innerText;
    var cell_value_status = e.target.closest('tr').childNodes[3].innerText;
    document.getElementById('useremail').value = cell_value_email;
    document.getElementById('namechange').value = cell_value_username;
    document.getElementById('statuschange').value = cell_value_status;
    document.getElementById('useremail').style.pointerEvents = 'none';
    
});
modalclosebutton.addEventListener('click',() =>{
    // if(!e.target.classList.contains('close-modal'))
    // return;
    mymodal.classList.remove('activate');
    overlay.classList.remove('activate');
});
var myModalAddProduct = document.getElementById('my-modal-add-product');
var productModalCloseButton = document.getElementById('close-modal-add-product');

document.addEventListener('click',(e) =>{
    if(!e.target.classList.contains('open-modal-add-product'))
    return;
    myModalAddProduct.classList.add('activate');
    overlay.classList.add('activate');
    
});

productModalCloseButton.addEventListener('click',() =>{
    // if(!e.target.classList.contains('close-modal'))
    // return;
    myModalAddProduct.classList.remove('activate');
    overlay.classList.remove('activate');
});
var myModalEditProduct = document.getElementById('my-modal-edit-product');
var productEditCloseButton = document.getElementById('close-modal-edit-product');
document.addEventListener('click',(e)=>{
    if(!e.target.classList.contains('open-modal-edit-product'))
    return;
    myModalEditProduct.classList.add('activate');
    overlay.classList.add('activate'); 

    var cell_value_prod_id = e.target.closest('tr').childNodes[0].innerText;
        var cell_value_prod_name = e.target.closest('tr').childNodes[1].innerText;
        var cell_value_prod_price = e.target.closest('tr').childNodes[2].innerText;
        var cell_value_prod_origin = e.target.closest('tr').childNodes[3].innerText;
        var cell_value_prod_image = e.target.closest('tr').childNodes[4].childNodes[0].getAttribute('src');
        document.getElementById('editprod_id').value = cell_value_prod_id;
        document.getElementById('editprod_name').value = cell_value_prod_name;
        document.getElementById('editprod_price').value = cell_value_prod_price;
        document.getElementById('editprod_origin').value = cell_value_prod_origin;
        document.getElementById('editprod_image').value = cell_value_prod_image;
        document.getElementById('editprod_id').style.pointerEvents = 'none';
});
productEditCloseButton.addEventListener('click',() =>{
    myModalEditProduct.classList.remove('activate');
    overlay.classList.remove('activate');
});

var modalclosebutton1 = document.getElementById('close-edit-order-modal');
var mymodal1 = document.getElementById('my-edit-order-modal');

document.addEventListener('click',(e)=>{
    if(!e.target.classList.contains('edit-order-detail'))
    return;
    mymodal1.classList.add('activate');
    overlay.classList.add('activate');

    document.getElementById('order-detail-id').value = e.target.closest('tr').childNodes[0].innerText;
    document.getElementById('order-detail-id').style.pointerEvents = 'none';
});
modalclosebutton1.addEventListener('click',()=>{
    mymodal1.classList.remove('activate');
    overlay.classList.remove('activate');
});




