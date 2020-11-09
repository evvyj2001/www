$(document).ready(function(){
        var cnt=$('.history_tabs .tab').length;  //탭메뉴개수  ***
        $('.content_area .history_content').hide();
        $('.content_area .history_content:eq(0)').show(); //첫번째 내용만 보여라
        $('.history_tabs .tab1').addClass('current');
        //첫번째 tab에 .on을 추가

        $('.history_tabs .tab').each(function (index) {  // index=> 0 1 2
            $(this).click(function(){   //각각의 탭메뉴를 클릭하면 
                $('.content_area .history_content').hide(); // 모든 탭내용을 안보이게 한다
                $('.content_area .history_content:eq('+index+')').show();
                for(var i=1;i<=cnt;i++){
                   $('.history_tabs .tab'+i).removeClass('current');
                }//모든 tab에서 .on을 제거하라 -> 비활성화 시켜라
                $(this).addClass('current'); 
            });
        });
    });
