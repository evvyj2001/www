// JavaScript Document

 function initialize() {
  var myLatlng = new google.maps.LatLng(37.144456,127.076205);
  var myOptions = {
   zoom: 15,
   center: myLatlng

  }
  var map = new google.maps.Map(document.getElementById("map_home"), myOptions);
 
  var marker = new google.maps.Marker({
   position: myLatlng, 
   map: map, 
   title:"회사이름"
  });   
  
 
  var infowindow = new google.maps.InfoWindow({
   content: "주소나전화번호등 연락처"
  });
 
  infowindow.open(map,marker);
 }
 
 
 window.onload=function(){
  initialize();
 }

