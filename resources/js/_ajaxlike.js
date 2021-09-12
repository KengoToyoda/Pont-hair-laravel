$(function () {
var like = $('.js-like-toggle');
var likeMenuId;

like.on('click', function () {
    var $this = $(this);
    likeMenuId = $this.data('menuid');
    $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/ajaxlike',  //routeの記述
            type: 'POST', //受け取り方法の記述（GETもある）
            data: {
                'menu_id': likeMenuId //コントローラーに渡すパラメーター
            },
    })
        // Ajaxリクエストが成功した場合
        .done(function (data) {
            //lovedクラスを追加
            $this.toggleClass('loved'); 
            //.likesCountの次の要素のhtmlを「data.menuLikesCount」の値に書き換える
            $this.next('.likesCount').html(data.menuLikesCount);
        })
        // Ajaxリクエストが失敗した場合
        .fail(function (data, xhr, err) {
            console.log('エラー');
            console.log(err);
            console.log(xhr);
        });
    
    return false;
});
});