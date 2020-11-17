$(document.readyState(function(){

//modal-form add matricula

$('.addMatricula').click(function(e){
    e.preventDefault();
    var matricula = $(this).attr('matricula');
    alert(matricula);
  //  $('.modal').fadeIn();
});


}));

function closeModal(){
    $('.modal').fadeOut();

}


