$(document).ready(function(){

    $("#menu-top-menu").on("click","a", function (event) {

        var id  = $(this).attr('href');
        if($(id).size()>0){
        	var top = $(id).offset().top - 115;
        	$('body,html').animate({scrollTop: top}, 500);
        	return false;
        } else {return true;}

    });


    $(".img-box-item img").wrap("<div></div>");



    $('.distributor-tabs-link li a').click(function(){
        $('.distributor-tabs .distributor-tab').hide();
        $('.distributor-tabs '+$(this).attr('href')).show();
        return false;
    });


    $('input,textarea').focus(function(){
        $(this).data('placeholder', $(this).attr('placeholder'))
        $(this).attr('placeholder', '');
    });

    $('input,textarea').blur(function(){
        $(this).attr('placeholder', $(this).data('placeholder'));
    });

    $(document).scroll(function(){
        if ($(document).scrollTop()) {
            $(".header").addClass("header-fix");
        }
        else {
            $(".header").removeClass("header-fix");
        }
    });




    $(document).on('click', ".nav-mob", function(e){
        e.preventDefault();
        if ($('.nav-mob').hasClass('nav-mob-open')) {
            $('.nav-mob').removeClass('nav-mob-open');
            $('.navigation').removeClass('navigation-open');
        }
        else {
            $('.nav-mob').addClass('nav-mob-open');
            $('.navigation').addClass('navigation-open');
        }
        return false;
    });




    $(document).on('click', ".btn-lang", function(e){
        e.preventDefault();
        if ($('.lang').hasClass('lang-open')) {
            $('.lang').removeClass('lang-open');
        }
        else {
            $('.lang').addClass('lang-open');
        }
        return false;
    });



});


