 $(document).ready(function(){
    var eachBox=$('.business_Box');
    
    
    //선택 초기화하고 첫번째꺼만 열림
    eachBox.removeClass('select');
    eachBox.first().addClass('select');
    eachBox.first().find('.icon').attr('src','images/business_icon1_2.png');
    
    eachBox.mouseenter(function(){//마우스 올리면
        var $target=$(event.target);
        
        if($target.parent().is('.link1')){//산업자재 아이콘이미지 바뀌고
           $target.children('.icon').attr('src','images/business_icon1_2.png');
           
           $target.parent('li').siblings('.link2').find('.icon').attr('src','images/business_icon2.png');            $target.parent('li').siblings('.link3').find('.icon').attr('src','images/business_icon3.png');           $target.parent('li').siblings('.link4').find('.icon').attr('src','images/business_icon4.png');
            
        }else if($target.parent().is('.link2')){//필름 아이콘이미지 바뀌고
           $target.children('.icon').attr('src','images/business_icon2_2.png');
        
           $target.parent('li').siblings('.link1').find('.icon').attr('src','images/business_icon1.png');            $target.parent('li').siblings('.link3').find('.icon').attr('src','images/business_icon3.png');           $target.parent('li').siblings('.link4').find('.icon').attr('src','images/business_icon4.png');
            
        }else if($target.parent().is('.link3')){//화학 아이콘이미지 바뀌고
           $target.children('.icon').attr('src','images/business_icon3_2.png');
           
           $target.parent('li').siblings('.link1').find('.icon').attr('src','images/business_icon1.png');            $target.parent('li').siblings('.link2').find('.icon').attr('src','images/business_icon2.png');           $target.parent('li').siblings('.link4').find('.icon').attr('src','images/business_icon4.png');
            
        }else if($target.parent().is('.link4')){//패션 아이콘이미지 바뀌고
           $target.children('.icon').attr('src','images/business_icon4_2.png');
           
           $target.parent('li').siblings('.link1').find('.icon').attr('src','images/business_icon1.png');            $target.parent('li').siblings('.link3').find('.icon').attr('src','images/business_icon3.png');           $target.parent('li').siblings('.link2').find('.icon').attr('src','images/business_icon2.png');   
        }       
       $target.parent('li').animate({width:550},400,'easeOutQuad').clearQueue().addClass('select');//선택박스 width값 바뀌며 슬라이드
       $target.parent('li').siblings().animate({width:183},400,'easeOutQuad').clearQueue().removeClass('select'); //나머지박스 원상복구
 }) ;  
});