
var close = document.getElementsByClassName('close')[0];
var openModal = document.getElementById('createModalOpen');
var modal = document.getElementById('createModal');

close.addEventListener('click',function(){
    modal.style.display = 'none';
});


openModal.addEventListener('click',function(){
    modal.style.display = 'block';

});
