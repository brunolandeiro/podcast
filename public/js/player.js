$(document).ready(function(){
    $('.play').on('click',function(){
        $('.player').empty();
        var data = $(this)[0].dataset;
        var audio = "<li class='list-group-item'><p>"+data.title+"</p><audio controls autoplay><source src="+data.audio+" type="+data.type+"></audio></li>";
        $('.player').append(audio);
        $('body,html').animate({scrollTop: 0}, 800);
    });

});
