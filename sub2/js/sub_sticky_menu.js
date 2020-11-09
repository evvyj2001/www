$(document).ready(function(){
    $('.sub_menu_box ul li:eq(0)').find('a').addClass('spy'); 
    
    var smb=$('.content_area').offset().top;
    
    //스크롤 탭 활성화 범위 변수
    var h1=$('.content_area section:eq(1)').offset().top-300;
    var h2=$('.content_area section:eq(2)').offset().top-300;
    
    
    
        
    
    $(window).on('scroll',function(){
        var scroll=$(window).scrollTop(); 
            
        $('.text').text(scroll);
        
        //sticky menu 처리
        if(scroll>smb-200){
            $('#headerArea').hide();
            $('.sub_menu_box').addClass('menu_sticky');
        }else{
            $('#headerArea').show();
            $('.sub_menu_box').removeClass('menu_sticky');
        }
        
        $('.sub_menu_box ul li').find('a').removeClass('spy');
        
        //스크롤 탭 활성화 범위 설정
        if(scroll>=0 && scroll<h1){
            $('.sub_menu_box ul li:eq(0)').find('a').addClass('spy');
        }else if(scroll>=h1 && scroll<h2){
            $('.sub_menu_box ul li:eq(1)').find('a').addClass('spy');
        }else if(scroll>=h2){
            $('.sub_menu_box ul li:eq(2)').find('a').addClass('spy');
        };
        
    });
        //스크롤 탭 클릭 시 이동
        $('.sub_menu_box ul li a').click(function(){
           var value=0;
            
            if($(this).hasClass('link1')){
                value=$('.content_area section:eq(0)').offset().top-100;
            }else if($(this).hasClass('link2')){
                value=$('.content_area section:eq(1)').offset().top-50;
            }else if($(this).hasClass('link3')){
                value=$('.content_area section:eq(2)').offset().top;
            }
            $("html,body").stop().animate({"scrollTop":value},1000);//value값 +상단 헤더 덮일 거 생각해서 +값 주기
        });
});