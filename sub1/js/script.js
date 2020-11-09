//1-4 해외지사 클릭이벤트
$(function(){
    var ctryBtn=$('#global .global_wrap a');
    var cnt=1;
    
    $('.tab_content ul li').show();
    ctryBtn.css('filter','grayscale(.6)');
    
    $('#global .global_wrap a').click(function(){
        var $target=$(event.target);
        var sibUl=$target.parents('div').siblings('ul')
        
        sibUl.find('li').hide();
        ctryBtn.css('filter','grayscale(.6)')
      
        if ($target.parent().is('.germany')){
            cnt=1;
        }else if($target.parent().is('.china')){
            cnt=2;
        }else if($target.parent().is('.japan')){
            cnt=3;
        }else if($target.parent().is('.indo')){
            cnt=4;
        }else if($target.parent().is('.vietnam')){
            cnt=5;
        }else if($target.parent().is('.mexico')){
            cnt=6;
        }
        
        sibUl.find('.bra'+cnt).slideDown();
        ctryBtn.eq(cnt-1).css('filter','grayscale(0)');
    });
    
    $('#global .global_wrap .all_view').click(function(){
        $('.tab_content ul li').slideDown();
        ctryBtn.css('filter','grayscale(0)');
    });
});




