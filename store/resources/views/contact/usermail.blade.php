{{$users->name}}様、予約が完了しました
以下の内容を確認して下さい
<br>
<p>-----------詳細-----------</p>
<br>
■予約者氏名<br>
{{$users->name}}<br>
■予約者メールアドレス<br>
{{$users->email}}<br>
■予約店舗名<br>
{{$stores->name}}<br>
■予約時間<br>
{{$data['reserve_date']}}<br>
■予約人数<br>
{{ $data['people'] }}<br>
