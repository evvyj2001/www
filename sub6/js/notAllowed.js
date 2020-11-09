// 체크박스 해제 시 form 비활성화
    $(document).ready(function(){
        $('#contactForm,.row input,.row textarea,#content .send button').addClass('cs_not_allowed');
        $('.row input,.row textarea,#content .send button').attr('disabled','disabled');
        
        
        $("#check01").change(function(){
            if($("#check01").is(":checked")){//체크박스 체크되면
                $('#contactForm,.row input,.row textarea,#content .send button').removeClass('cs_not_allowed');
                $('.row input,.row textarea,#content .send button').removeAttr('disabled');
            }else{//체크박스 해제되면
                $('#contactForm,.row input,.row textarea,#content .send button').addClass('cs_not_allowed');
                $('.row input,.row textarea,#content .send button').attr('disabled','disabled');
            }
        });
    });
