$(document).ready(function(){
    var article=$('#commonQuestion .article');//모든 리스트들
    article.find('.answer').slideUp(200); //모든 답변들 안보이기   
    
    $('.question a').click(function(){//각각의 질문 클릭하면
        var myArticle=$(this).parents('.article');
        
        if(myArticle.hasClass('hide')){//클릭한 리스트의 답변이 닫혀있다면
            article.find('.answer').slideUp(200);//모든 답변 다 닫아라
            article.removeClass('show').addClass('hide');//전부 다 hide
            myArticle.removeClass('hide').addClass('show');  
            myArticle.find('.answer').slideDown(200);  
        }else{//클릭한 리스트의 답변이 열려있다면(==show)
            myArticle.removeClass('show').addClass('hide');  
	        myArticle.find('.answer').slideUp(200); 
        }
    });
    
    //자주하는 질문 TOP3
    $('.link1').click(function(){
        article.find('.answer').slideUp(200);//모든 답변 다 닫아라
        article.eq(0).find('.answer').slideDown(200);
        $("html,body").stop().animate({"scrollTop":1000},1000);
    });
    $('.link2').click(function(){
        article.find('.answer').slideUp(200);//모든 답변 다 닫아라
        article.eq(2).find('.answer').slideDown(200);
        $("html,body").stop().animate({"scrollTop":1200},1000);
    });
    $('.link3').click(function(){
        article.find('.answer').slideUp(200);//모든 답변 다 닫아라
        article.eq(4).find('.answer').slideDown(200);
        $("html,body").stop().animate({"scrollTop":1400},1000);
    });
});