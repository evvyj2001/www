$(document).ready(function(){
    $('.view_more').hide();
    $('.subs_more').toggle(function(){
        $('.view_more').slideDown();
        $('span',this).eq(0).text('닫기');
        $('i',this).removeClass('fa-chevron-down').addClass('fa-chevron-up');        
    }, function(){
        $('.view_more').slideUp();
        $('span',this).eq(0).text('더보기');
        $('i',this).removeClass('fa-chevron-up').addClass('fa-chevron-down');
    });
});