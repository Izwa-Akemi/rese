{{$reserve->user->name}}様、前日の予約確認メールを送信させていただきます。
以下の内容をご確認下さい。

<br>
当店では新型コロナウイルス対策のため、お客様にマスクの着用をお願いしております。<br>
お手数をおかけますが何卒ご協力いただけますと幸いです。
<br>
<p>-----------詳細-----------</p>
<br>
■予約者氏名<br>
{{$reserve->user->name}}<br>
■予約者メールアドレス<br>
{{$reserve->user->email}}<br>
■予約店舗名<br>
{{$reserve->store->name}}<br>
■予約時間<br>
{{$reserve->reserve_date}}<br>
■予約人数<br>
{{ $reserve->people }}<br>