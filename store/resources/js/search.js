$(function () {

    //送信確認
    $("#area,#genre,#search").on('input', function () {

        //フォームから入力値を取得
        var area = $('#area').val();
        var genre = $('#genre').val();
        var search = $('#search').val();

 
        //phpに送信
        $.ajax({
            type: 'GET',
            url: '/sarch',
            data: {
                area: area,
                genre: genre,
                search: search,
            },
            dataType: 'html', 
            success: function (data) {
                // if (data.match(/success/)) {
                //     alert("送信が完了しました。");
                //     console.log('テスト送信');
                // }
                $('#main-section').html(data);
            },
            error: function () {
                alert("通信失敗。");
            }
        })
    });
});