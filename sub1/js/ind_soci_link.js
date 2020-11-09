//인덱스 사회공헌 각각 탭으로 연결 스크립트
window.onload=function(){//파라미터 값 넘어오게
    var tab_content=document.getElementsByClassName('tab_content');
    
    var purl=window.location; // 호출된 현재창의 주소 sub1/sub1_3.html?a=1
    tmp=String(purl).split('?');
    //tmp[0] == sub1/sub1_3.html , tmp[1] == a=1
    
    if(tmp[1]!=undefined){
        tmp2=tmp[1].split('=');
        //tmp2[0] == 'a' , tmp2[0] == '1'   
        
        if(tmp2[1]==1){
        $('.content_area .tab_content').css('height','1px');
        $('.content_area #enviroment').css('height','auto');
        $('.title_area ul li .tab').removeClass('current');
        $('.title_area ul li .tab1').addClass('current');
        
    }else if(tmp2[1]==2){
      $('.content_area .tab_content').css('height','1px');
        $('.content_area #sports').css('height','auto');
        $('.title_area ul li .tab').removeClass('current');
        $('.title_area ul li .tab2').addClass('current');
        
    }else if(tmp2[1]==3){
     $('.content_area .tab_content').css('height','1px');
        $('.content_area #volunteer').css('height','auto');
        $('.title_area ul li .tab').removeClass('current');
        $('.title_area ul li .tab3').addClass('current');
    };
  } 
    
    
    
};