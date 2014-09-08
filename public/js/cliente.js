$(document).ready(function(){

    $('.info').click(function(e){
        e.preventDefault();
        $(this).next().next().toggle();
    });

    $('.star').jRating({
        isDisabled : true,
        decimalLength : 0,
        length : 5
    });
});
