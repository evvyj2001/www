$(document).ready(function () {
    
    var smh=$('.visual').height();
    var on_off=false;  //false(안오버)  true(오버)  
    
    
        $('#headerArea').mouseover(function(){
            var scroll = $(window).scrollTop();
            
               $(this).css('background','rgba(255,255,255,1)');
               $('.dropdownmenu li a').css('color','rgba(0,0,0,1)'); 
           
            on_off=true;
        });
    
       $('#headerArea').mouseleave(function(){
            var scroll = $(window).scrollTop();
            if(scroll>=0 && scroll<smh-500 ){
                $(this).css('background','rgba(255,255,255,0)'); $('.dropdownmenu li a').css('color','rgba(255,255,255,1)');
            }else if(scroll>smh-500){
                $(this).css('background','rgba(255,255,255,1)'); $('.dropdownmenu li a').css('color','rgba(0,0,0,1)');
            }
            on_off=false;    
       });
    
       $(window).bind('scroll',function(){//스크롤의 거리가 발생하면
            var scroll = $(window).scrollTop();
            //스크롤이 움직이면 해당 scrolltop의 값이 저장된다

            //$('.text').text(scroll);

            if(scroll>smh-500){//스크롤300까지 내리면
                $('#headerArea').css('background','rgba(255,255,255,1)');
                $('.dropdownmenu li a').css('color','rgba(0,0,0,1)');
            }else{//스크롤 내리기 전 디폴트(마우스올리지않음)
                if(on_off==false){
                    $('#headerArea').css('background','rgba(255,255,255,0)');
                    $('.dropdownmenu li a').css('color','rgba(255,255,255,1)');
                }
            }; 
            
            //인덱스페이지 content 슬라이드 애니메이션
            if(scroll<300){
                $('#content .business_inner').animate({right:0},1000);
            }else if(scroll>=900&&scroll<1300){
                $('#content .vision_inner').animate({left:0},1000);
            }else if(scroll>=1600&&scroll<2000){
                $('#content .con_news_inner').animate({right:0},1000);
                $('#content .con_contribute_inner').animate({right:0},1000);
            }else if(scroll>=2300&&scroll<2700){
                $('#content .con_bottom_inner').animate({left:0},1000);   
            }
         });
 });