$(document).ready(function(){
   //시리즈 - 탭스
    var info=$('.movie_box');
    
    $('.title_series a').click(function(e){//각각질문클릭
        e.preventDefault();
        var selectBox=$(this).parents('.movie_box');
        var findImg=$(this).parents('.series_wrap').children('.poster_wrap').find('img');
        
        if(selectBox.hasClass('hide')){
            info.find('.movie_info').slideUp(200);
            info.removeClass('show').addClass('hide').removeClass('active');
            selectBox.removeClass('hide').addClass('show').addClass('active');
            selectBox.find('.movie_info').slideDown(200);
        };
        if(selectBox.hasClass('link1')){
            findImg.attr('src','images/poster_img1.jpg');
        }else if(selectBox.hasClass('link2')){
            findImg.attr('src','images/poster_img2.jpg');
        }else if(selectBox.hasClass('link3')){
            findImg.attr('src','images/poster_img3.jpg');
        }else if(selectBox.hasClass('link4')){
            findImg.attr('src','images/poster_img4.jpg');
        }else if(selectBox.hasClass('link5')){
            findImg.attr('src','images/poster_img5.jpg');
        };
    });
    
    //높이맞추기
    var boxHeight =  $('.series_wrap div:eq(0)').height(); 
    
    $(".series_wrap .poster_wrap img").height(boxHeight).width('auto');
    
    $(window).resize(function(){
        var boxHeight =  $('.series_wrap div:eq(0)').height(); 
        
        $(".series_wrap .poster_wrap img").height(boxHeight).width('auto');
        
    });
    
    
    
    
   
});
