$(function(){
    var domesticSpan=$('#domestic .graph_wrap .gw');
    var overseasSpan=$('#overseas .graph_wrap .gw');
    
    domesticSpan.css('width','0');
    overseasSpan.css('width','0');
    
    $(window).bind('scroll',function(){
        //스크롤이 움직이면 해당 scrolltop의 값이 저장
        var scroll = $(window).scrollTop();
        
//        $('.text').text(scroll); //top값 확인 
        
        if(scroll>=800){//스크롤이 900이상이면
            domesticSpan.animate({width:'100%'},1500).clearQueue();    
        }        
        if(scroll>2200){
            overseasSpan.animate({width:'100%'},1500).clearQueue();
            $(window).unbind("scroll");            
        }        
    });
});