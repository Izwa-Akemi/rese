## レストラン予約サイト　

## ダウンロード方法

git clone https://github.com/Izwa-Akemi/rest

zipファイルでダウンロードしてください

## インストール方法

- cd rese
- cd store
- composer install
- npm install
- npm run dev

.env.example をコピーして .env ファイルを作成

.envファイルの中の下記をご利用の環境に合わせて変更してください。

- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=stores
- DB_USERNAME=root
- DB_PASSWORD=

・本プログラムはメールを送信できるものであるため、以下の操作を行ってご自身のメールアドレスを登録して下さい
　- database/seeder/OwnerSeeder.phpのemailを送信したいメールアドレスに変更してください
・本プログラムで店舗画像を使用するために下記の操作を行って下さい。
　- storage/publicにshopsフォルダを作成し、storage/public/shopsとなるように配置してください
 - public/img/shopimgにある、4つの写真を、先ほど作成したstorage/public/shopsフォルダにコピーしてください。

・XAMPP/MAMPまたは他の開発環境でDBを起動した後に

php artisan migrate:fresh --seed

と実行してください。(データベーステーブルとダミーデータが追加されればOK)

最後に
php artisan key:generate
と入力してキーを生成後、

php artisan serve
で簡易サーバーを立ち上げ、表示確認してください。


## インストール後の実施事項

画像のデータは
https://docs.google.com/spreadsheets/d/1AD37VJF0kZwqAqAbfE4N89Is_dAVt0jZaT58WNsAhHw/edit#gid=1252551999
「店舗データ一覧」の画像を使用しております。
画像登録の際はこちらのURLから画像をダウンロードして下さい。

## メールの補足

メールはさくらサーサーバのものを使用しております
メール送信の際はご自身のメールサーバーをご使用ください。
編集は、.envファイルの下記となります。
下記はGmailを使用した際の例となります。
- MAIL_MAILER=smtp
- MAIL_HOST=smtp.gmail.com
- MAIL_PORT=587
- MAIL_USERNAME=　ご自身のメールアドレスをご入力下さい。
- MAIL_PASSWORD=　ご自身のグーグルアカウントにログインする際のパスワードをご入力下さい
- MAIL_ENCRYPTION=//入力はしないでください。
- MAIL_FROM_ADDRESS=// MAIL_USERNAMEと同じくご自身のメールアドレスをご入力下さい。
- MAIL_FROM_NAME= // メール送信元名　こちらは入力しなくても問題ないです。


