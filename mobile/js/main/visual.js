//비주얼 fadein-out
$(document).ready(function(){
    var timeoff;
    var imageCount=3;
    var cnt=1;
    var onoff=true;
    
    //첫 화면
    $('.main_quick .btnv1').addClass('active');
    $('.gallery li:eq(0)').css('display','block');
    //로딩 바 
    $('#wrap .process').animate({width:'100%'},6000).clearQueue();
    
    function moveg(){
        cnt++;//카운트 1씩 증가
        $('#wrap .process').css('width',0);//로딩바 0으로
        $('.gallery ul li').hide();
        $('.gallery ul .v_img'+cnt).stop().fadeIn('slow'); //현재 카운트된 이미지만 보인다.
        
        //로딩 바 
        $('#wrap .process').animate({width:'100%'},6000).clearQueue();
        
        $('.main_quick .mbutton').removeClass('active');
        $('.main_quick .btnv'+cnt).addClass('active');
        
        if(cnt==imageCount)cnt=0; 
    }
    
    timeonoff=setInterval(moveg,6000);
    
    $('.main_quick .mbutton').click(function(event){
        var $target=$(event.target);
        clearInterval(timeonoff);
        $('.gallery ul li').hide();
        $('#wrap .process').css('width',0);//로딩바 0으로
        
        if($target.is('.main_quick .btnv1')){
           cnt=1;
        }else if($target.is('.main_quick .btnv2')){
           cnt=2; 
        }else if($target.is('.main_quick .btnv3')){
           cnt=3; 
        }
        $('.gallery ul .v_img'+cnt).stop().fadeIn('slow');
        
        $('.main_quick .mbutton').removeClass('active');
        $('.main_quick .btnv'+cnt).addClass('active');
        $('#wrap .process').animate({width:'100%'},6000).clearQueue();
        if(cnt==imageCount)cnt=0;//카운트초기화
        
        timeonoff=setInterval(moveg, 6000);//타이머 다시 시작
    })
});