$(document).ready(function () {
    $(window).ready(function (){
        if (localStorage.getItem("calc") == 'visible') {
            $('#masag').css({'visibility':'visible'}); 
        }
        else if(localStorage.getItem("calc") == 'hidden'){
            $('#masag').css({'visibility':'hidden'});
        }
    });
   

    $('#use_calc').click(function () {
        $('#masag').css({'visibility':'visible'}); 
        localStorage.setItem("calc","visible");

    });

    $(".inner-masag-cot-back").click(function(){
        $('#masag').css({'visibility':'hidden'});
        localStorage.setItem("calc","hidden");            
    });

    
});