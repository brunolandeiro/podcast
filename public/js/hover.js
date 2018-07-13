$(document).ready(function(){
    $(".hover").mouseenter(function(){
        $(this).find('.card-img-overlay').fadeIn();
    });

    $(".hover").mouseleave(function(){
        $(this).find('.card-img-overlay').fadeOut();
    });
});
