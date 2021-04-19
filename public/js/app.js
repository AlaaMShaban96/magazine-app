
var close = document.getElementsByClassName('close')[0];
var openModal = document.getElementById('createModalOpen');
var modal = document.getElementById('createModal');

if(close){
    close.addEventListener('click',function(){
        modal.style.display = 'none';
    });
}

if(openModal){
    openModal.addEventListener('click',function(){
        modal.style.display = 'block';
    });
}
