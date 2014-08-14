$(document).ready(function(){

    $('.info').click(function(e){
        e.preventDefault();
        $(this).next().toggle();
    });

});
