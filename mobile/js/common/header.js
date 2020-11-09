//공통 네비 depth2 열리는 이벤트
$(document).ready(function(){
    
    $('.main_menu .depth2').hide();//depth2모두 안보이게
    
    $('.main_menu li h3 a').click(function(){//클릭하면
        var selectMenu=$(this).parents('li');
        
        if(selectMenu.hasClass('hide')){//클릭한 d2가 닫혀있다면
            $('.main_menu .depth2').slideUp(500);
            $('.main_menu .depth2').parents('li').removeClass('show').addClass('hide');
            selectMenu.removeClass('hide').addClass('show');
            selectMenu.find('.depth2').slideDown(500);
        }else{//클릭한 d2가 열려있다면
            
            selectMenu.removeClass('show').addClass('hide');
            selectMenu.find('.depth2').slideUp(500);
        }
        
    });
    
});


//전 페이지 공통 header 스크롤 이벤트


$(document).ready(function(){
    var smh=$('.visual').height();
    var on_off=true; //true(위) / false(아래)
    
    $(window).bind('scroll',function(){
        var scroll=$(window).scrollTop();//해당 scroll값 저장
        
        if(scroll>smh+100){//스크롤이 main을 넘어서면
             $('#headerArea').css('background','rgba(255,255,255,1)');
             $('#headerArea .menu_ham').addClass('scroll_move');
            on_off=false;
        }else{
             $('#headerArea').css('background','rgba(255,255,255,0)');
             $('#headerArea .menu_ham').removeClass('scroll_move');
             on_off=true;
            
        }
    });
    
    //헤더 햄버거 클릭시 열리고 닫힘
     $('#headerArea').removeClass('mn_open');
    
    $('.menu_ham').toggle(function(){
        $(this).parents('#headerArea').css('height','100%').addClass('mn_open');
        $('#gnb').show().animate({right:0},500).clearQueue();   
    },function(){
       $('#gnb').animate({right:'-100%'},500).clearQueue(); 
        
       if(on_off==true){        $(this).parents('#headerArea').css('background','rgba(0,0,0,0)').css('height',56).removeClass('mn_open');
       }else{
           $(this).parents('#headerArea').css('background','rgba(255,255,255,1)').css('height',56).removeClass('mn_open');  
       }
    });
    
    
    
    
});

