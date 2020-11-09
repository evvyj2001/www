
$(document).ready(function(){
    $('.dropdownmenu .menu').hover(
    function(){
        $('.depth_menu',this).stop().fadeIn('fast');
        //$('.menu_box').slideDown('fast').clearQueue();        
    },function(){
        $('.depth_menu',this).stop().fadeOut('fast');
        //$('.menu_box').slideUp('fast').clearQueue();  
        
    });
    $('ul.dropdownmenu').hover(function(){
        $('.menu_box').stop().slideDown('fast'); 
    },function(){
        $('.menu_box').stop().slideUp('fast');  
    });
   
    
    //tab
    $('ul.dropdownmenu .menu .depth1').on('focus',function(){
        $(this).parents('.menu').find('ul').fadeIn('fast');
        $(this).parents('.menu').siblings().find('ul').fadeOut('fast');
        $('.menu_box').slideDown('normal').clearQueue();
    });
    
    $('ul.dropdownmenu .m6 li:last').find('a').on('blur',function(){
        $('ul.dropdownmenu .m6 ul').fadeOut('fast');
        $('.menu_box').slideUp('normal').clearQueue();
    });
});

