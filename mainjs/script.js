//NEWS 슬라이드
$(document).ready(function(){
    var timeonoff; //자동기능 구현 변수
    var cnt=true; 
    
    $('.news_quick li').last().click(function(){
         clearInterval(timeonoff );//자동타이머 멈춤
         $('.news_slide_wrap li').first().appendTo('.news_slide_wrap');   
    });
    $('.news_quick li').first().click(function(){
         clearInterval(timeonoff );//자동타이머 멈춤
         $('.news_slide_wrap li').last().prependTo('.news_slide_wrap');   
    });
    
    //자동슬라이드
    timeonoff=setInterval(function(){
       if(cnt=true){
           $('.news_slide_wrap li').first().appendTo('.news_slide_wrap');
       }else{
           $('.news_slide_wrap li').last().prependTo('.news_slide_wrap');   
       }
    },3000);
});