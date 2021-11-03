@php
if($type === 'shops'){
$path = 'storage/shops/';
}
@endphp
@if(empty($filename))
<img src="{{ asset($path. $filename)}}">
@endif