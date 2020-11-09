$(document).ready(function () {
            
             $('.top_btn').hide();
           
             $(window).on('scroll',function(){//스크롤의 거리가 발생하면
                  var scroll = $(window).scrollTop();
                  //스크롤이 움직이면 해당 scrolltop의 값이 저장된다
                 
                 
                  $('.text').text(scroll);
                  if(scroll>250){//스크롤값이 250보다 커지면
                      $('.top_btn').fadeIn(500);//탑메뉴보여라
                  }else{//아니면
                      $('.top_btn').fadeOut(500);//말아라
                  }
             });
           
              $('.top_btn').click(function(){
                  //상단으로 스르륵 이동합니다.
                 $("html,body").stop().animate({"scrollTop":0},1000); 
              });
       });