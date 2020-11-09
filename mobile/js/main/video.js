var video; //전역변수 선언

function changeVideo(linkBtn){//클릭한 a태그
    video=document.getElementById('textVideo');
    
    video.src=linkBtn.href;
    video.load(); //해당 linkBtn의 href를 가지고 와라
    video.type='video/mp4';
    video.play(); //자동재생
    return false; //링크로 넘어가는 것을 막는다.
}