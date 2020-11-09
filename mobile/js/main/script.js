//사업분야 탭 
$(document).ready(function(){
    var cnt=1;
    
    $('.movie_menu .btn1').addClass('select');
    
    $('.movie_menu li').click(function(event){
        var $target=$(event.target);    
        
        
        if($target.is('.movie_menu .btn1 a')){
           cnt=1;
        }else if($target.is('.movie_menu .btn2 a')){
           cnt=2; 
        }else if($target.is('.movie_menu .btn3 a')){
           cnt=3; 
        }
        
    $('.movie_menu li').removeClass('select');
    $('.movie_menu .btn'+cnt).addClass('select');
        
        
    })
});