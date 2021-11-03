require('./bootstrap');
require('alpinejs');

$('#datepicker').datepicker({
    buttonImage: "../img/carender.jpeg",        // カレンダーアイコン画像
    buttonText: "カレンダーから選択", // ツールチップ表示文言
    buttonImageOnly: true,           // 画像として表示
    showOn: "both"                   // カレンダー呼び出し元の定義
}).datepicker('setDate','today');

