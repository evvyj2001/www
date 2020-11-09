$(document).ready(function(){
    //헤더 열리기(태블릿 이하 해상도)
    var screenHeight = $(window).height();
    
    $('.menu_ham').toggle(function(){
        $('#headerArea').addClass('top0');
       $('#headerArea ul').slideDown();
        $('.menu_ham').addClass('open');
        
    },function(){
        $('#headerArea ul').slideUp();
        $('.menu_ham').removeClass('open');
        $('#headerArea').removeClass('top0');
    });
    
        
    var current=0;
    
    $(window).resize(function(){
       var screenSize= $(window).width(); 
        
        if( screenSize > 1024){
            $('#headerArea').addClass('top0');
            $('#headerArea ul').show();
            $('.menu_ham').removeClass('open');
             current=1;
        }
        if(current==1 && screenSize <= 1024){
            $('#headerArea').removeClass('top0');
            $('#headerArea ul').hide();
            current=0;
        }
    });
});