function alertFunction(e){
   if(!window.confirm('本当に削除しますか？')){
      window.alert('キャンセルされました'); 
      return false;
   }
   document.deleteform.submit();
};

    function initMap() {

            var target = document.getElementById('gmap'); 
            var address = document.getElementById('address').textContent; 
            var geocoder = new google.maps.Geocoder();
        
            //geocoder.geocode() にアドレスを渡して、コールバック関数を記述して処理
              geocoder.geocode({ address: address }, function(results, status){
              //ステータスが OK で results[0] が存在すれば、地図を生成
                if (status === 'OK' && results[0]){  
                //マップのインスタンスを変数に代入
                 var map = new google.maps.Map(target, {  
                   center: results[0].geometry.location,
                   zoom: 14
                 });
                
                //マーカーの生成
                 var marker = new google.maps.Marker({
                   position: results[0].geometry.location,
                   map: map,
                   animation: google.maps.Animation.DROP
                 });
                
                //情報ウィンドウの生成
                 var infoWindow = new google.maps.InfoWindow({
                   content: 'This is the place',
                   pixelOffset: new google.maps.Size(0, 5)
                 });
          
                //マーカーにリスナーを設定
                marker.addListener('click', function(){
                   infoWindow.open(map, marker);
                 });
                
              }else{ 
                 //ステータスが OK 以外の場合や results[0] が存在しなければ、アラートを表示して処理を中断
                   alert('失敗しました。理由: ' + status);
                   return;
                 }
              });
    }