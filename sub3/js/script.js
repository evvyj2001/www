//data.html에서 load해서 tab 기능
$(function(){
   var fragment = $('#content .title_area ul li a.current').attr('href');  
    //href="data.html#eletro"
    
    fragment=fragment.replace('#',' #'); //data.html #eletro
    $('.content_area').load(fragment);
    //로드할 경로
    
    $('#content .title_area ul li a').on('click', function(e){
        e.preventDefault(); //a 링크 연결X
        
        fragment=this.href;
        
        fragment=fragment.replace('#',' #');
        $('.content_area').load(fragment);
        
        $('#content .title_area ul li a').removeClass('current');
        $(this).addClass('current');
        
    });
});
