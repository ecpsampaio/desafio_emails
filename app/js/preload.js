    $(window).ready(function() {
        $(".preloader").delay(1000).fadeOut("slow");
        $(".preloader").fadeOut(30000, function(){
            $(this).css({visibility : 'collapse'});
        });
    });
