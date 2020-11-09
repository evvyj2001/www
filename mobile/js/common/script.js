//전 페이지 공통 top 버튼
$(function(){
    $('.fixed').hide();
    
     $(window).on('scroll',function(){//스크롤의 거리가 발생하면
                  var scroll = $(window).scrollTop();
                  //스크롤이 움직이면 해당 scrolltop의 값이 저장된다
                 
                 
//                  $('.text').text(scroll);
                  if(scroll>250){//스크롤값이 250보다 커지면
                      $('.fixed').fadeIn(500);//탑메뉴보여라
                  }else{//아니면
                      $('.fixed').fadeOut(500);//말아라
                  }
             });
    
     $('.top_btn').click(function(){
                  //상단으로 스르륵 이동합니다.
                 $("html,body").stop().animate({"scrollTop":0},1000); 
              });
    
});

//전 페이지 공통 footer 패밀리 사이트
$(document).ready(function(){
    $('.family_wrap .arrow').toggle(function(){
        $('.family_list').show();
        $('.arrow i').removeClass('fa-chevron-up');
        $('.arrow i').addClass('fa-chevron-down');
    },function(){
        $('.family_list').hide();
        $('.arrow i').removeClass('fa-chevron-down');
        $('.arrow i').addClass('fa-chevron-up');
    });
});
