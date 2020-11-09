$(function(){
    $('.sitemap_wrap').hide(); //일단 sitemap 안보이게
    
    $('#headerArea .top_left .site_map a').click(function(){
        $('.sitemap_wrap').fadeIn();
    });
    
    $('.sitemap_close_btn').click(function(){
        $('.sitemap_wrap').fadeOut();
    });
    
    $('.sitemap_wrap ul li dd').hover(function(){
        var $target=$(event.target);
        $target.css('background','#2580f2')
        $target.parents('dl').children('dt').addClass('text_blue');
    },function(){
        var $target=$(event.target);
        $target.css('background','none')
        $target.parents('dl').children('dt').removeClass('text_blue');
    });
});