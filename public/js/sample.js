function alertFunction(e){
   if(!window.confirm('本当に削除しますか？')){
      window.alert('キャンセルされました'); 
      return false;
   }
   document.deleteform.submit();
};


 var map;
 function initMap() {
   map = new google.maps.Map(document.getElementById('map'), {
     center: {lat: -34.397, lng: 150.644},
     zoom: 8
   });
 }