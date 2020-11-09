$(document).ready(function() {

    var timeonoff;   //타이머 처리  홍길동 정보
    var imageCount=3;   //이미지개수***
    var cnt=1;   //이미지 순서 1 2 3 4 5 1 2 3 4 5....
    var onoff=true; // true=>타이머 동작중 , false=>동작하지 않을때
    //플레이스탑기능을 위해
    
    $('.visual_quick .btn1').addClass('active');
    $('.gallery li:eq(0)').css('display','block');
    
    
    function moveg(){
        cnt++;//카운트 1씩 증가
        $('.gallery ul li').hide();
        $('.gallery ul .link'+cnt).stop().fadeIn('slow'); //현재 카운트된 이미지만 보인다.
        
        $('.visual_quick .mbutton').removeClass('active');
        $('.visual_quick .btn'+cnt).addClass('active');
        
        if(cnt==imageCount)cnt=0; 
    }
    
    timeonoff=setInterval(moveg,5500);
    
    $('.visual_quick li').click(function(event){
       var $target=$(event.target);      
         clearInterval(timeonoff);
        $('.gallery ul li').hide();//갤러리 내용 모두 hide    
       
        
        
        if($target.is('.visual_quick .btn1')){
           cnt=1;
        }else if($target.is('.visual_quick .btn2')){
           cnt=2; 
        }else if($target.is('.visual_quick .btn3')){
           cnt=3; 
        }
        $('.gallery ul .link'+cnt).stop().fadeIn('slow'); 
        
        
        $('.visual_quick li').removeClass('active');
        $('.visual_quick .btn'+cnt).addClass('active');
            if(cnt==imageCount)cnt=0;//카운트초기화
           
         timeonoff=setInterval(moveg, 5500);//타이머 다시 시작
            
            if(onoff==false){
                onoff=true; $('.btn_play').css('background','url(images/visual_pause_icon.png)');
            }
        
    });
    
    /*   
    //이미지 위에 올리면 자동재생 멈춤
    $('.gallery ul li').hover(function(){
        $('.btn_play').css('background','url(images/visual_play_icon.png)');
        clearInterval(timeonoff);
        onoff=false;
    },function(){
        $('.btn_play').css('background','url(images/visual_pause_icon.png)');
        timeonoff=setInterval(moveg,3000);
        onoff=true;
    });
    */ 
    
    //stop/play버튼 클릭시 타이머 동작/중지
    $('.btn_play').click(function(){
       if(onoff==true){
           $(this).css('background','url(images/visual_play_icon.png)');
           clearInterval(timeonoff);
           onoff=false;
       }else{
           $(this).css('background','url(images/visual_pause_icon.png)');
           timeonoff=setInterval(moveg,5500);
           onoff=true;
       }
    });


});